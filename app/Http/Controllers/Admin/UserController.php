<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $users = $this->user->paginate(10);
        
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {   
        $users = $this->user->all('id','name');
        $perfis = $this->perfil->all('id','nome');
        

        return view('admin.users.create', compact('users','perfis'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = $this->user->create($data);

        flash('Usuário Criado com sucesso!')->success();
        return redirect()->route('admin.users.index');
    }
    
    public function edit($user)
    {
        $user = $this->user->findOrFail($user);

        return view('admin.users.edit', compact('user'));
        
    }
    
    public function update(Request $request, $user)
    {
        $data = $request->all();

        $user = $this->user->find($user);
        $user->update($data);

        flash('Dados Atualizados com sucesso!')->success();
        return redirect()->route('admin.users.index');
    }

    public function destroy($user){
        $user = $this->user->find($user);
        $user->delete();

        flash('Usuário removido com sucesso!')->success();
        return redirect()->route('admin.users.index');
    }
}