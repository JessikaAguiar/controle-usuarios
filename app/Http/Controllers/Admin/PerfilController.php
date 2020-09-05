<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PerfilRequest;
use Illuminate\Http\Request;
use App\Perfil;

class PerfilController extends Controller
{

    private $perfil;

    public function __construct(Perfil $perfil)
    {
        $this->perfil = $perfil;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perfils = $this->perfil->paginate(10);
        
        return view('admin.perfils.index', compact('perfils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfils = $this->perfil->all('id','nome');
        $action = route('admin.perfils.store');
        $method = 'POST';

        return view('admin.perfils.form', compact('perfils','action','method'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerfilRequest $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();

            $perfil = $this->perfil->create($data);

            flash('Perfil Criado com sucesso!')->success();

            DB::commit();

            return redirect()->route('admin.perfils.index');
        } catch (Exception $exeption) {
            DB::rollBack();

            return response()->json(['mensagem' => 'A solicitação não pode ser concluída, tente novamente mais tarde'],500);
        };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($perfil)
    {
        try {
            DB::beginTransaction();
            
            $perfil = $this->perfil->findOrFail($perfil);
            $action = route('admin.perfils.update',['perfil' => $perfil->id]);
            $method = 'PUT';
        
            return view('admin.perfils.form', compact('perfil','action','method'));
        }catch (Exception $exeption) {
    
            DB::rollBack();
    
            return response()->view('erros/404.blade.php');
        };
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(PerfilRequest $request, $perfil)
    {
        $data = $request->all();

        $perfil = $this->perfil->findOrFail($perfil);
        $perfil->update($data);

        flash('Perfil Atualizado com sucesso!')->success();
        return redirect()->route('admin.perfils.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $perfil
     * @return \Illuminate\Http\Response
     */
    public function destroy($perfil)
    {

        $perfil = $this->perfil->findOrFail($perfil);
        $perfil->delete();

        flash('Perfil Removido com sucesso!')->success();
        return redirect()->route('admin.perfils.index');
        
    }
}