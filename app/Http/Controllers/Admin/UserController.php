<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use App\User;
use App\Perfil;

class UserController extends Controller
{
    
    private $user;
    private $perfil;
    
    public function __construct(User $user, Perfil $perfil)
    {
        $this->user = $user;
        $this->perfil = $perfil;

    }

    public function index()
    {
        try {
            
                $users = $this->user->paginate(5);
            
                return view('admin.users.index', compact('users'));
           
        } catch (Exception $exeption){
             return response()->view('erros/500.blade.php');
        };
    }

    public function create()
    {   
        try {
                $users = $this->user->all('id','name');
                $action = route('admin.users.store');
                $method = 'POST';
                $perfis = $this->perfil->all('id','nome');

                return view('admin.users.form', compact('users','perfis', 'action','method'));
        
        }catch (Exception $exeption) {
            return response()->view('erros/403.blade.php');
        };
    }

    public function store(UserRequest $request)
    {   
        try {
            DB::beginTransaction();

            $data = $request->all();
            $user = $this->user->create($data);

            flash('Usuário Criado com sucesso!')->success();
            
            DB::commit();
            return redirect()->route('admin.users.index');
        } catch (Exception $exeption) {
            DB::rollBack();

            return response()->json(['mensagem' => 'A solicitação não pode ser concluída, tente novamente mais tarde'],500);
        };
    }
    
    public function edit($user)
    {
        try {
            DB::beginTransaction();

                $user = $this->user->findOrFail($user);
                
                $action = route('admin.users.update',['user' => $user->id]);
                $method = 'PUT';
                $perfis = $this->perfil->all('id','nome');


                DB::commit();
    
                return view('admin.users.form', compact('user', 'perfis', 'action','method'));
        
        }catch (Exception $exeption) {
    
            DB::rollBack();
    
            return response()->view('erros/404.blade.php');
        };
        
    }
    
    public function update(UserEditRequest $request,  $user)
    {
        try {
            $data = $request->all();

            $user = $this->user->find($user);
            if(!$request->filled('password')){
                unset($data['password']);
            }

            $user->update($data);

            flash('Dados Atualizados com sucesso!')->success();
            return redirect()->route('admin.users.index');
            
        } catch (Exception $exeption) {

            return response()->json(['mensagem' => 'A solicitação não pode ser concluída, tente novamente mais tarde'],404);
        
        };  
    }

    public function destroy($user){
        try {
            
            $user = $this->user->find($user);
            $user->delete();

            flash('Usuário removido com sucesso!')->success();
            return redirect()->route('admin.users.index');
           
        } catch (Exception $exeption) {

            return response()->json(['mensagem' => 'A solicitação não pode ser concluída, tente novamente mais tarde'],500);
        
        }; 
    }

}
