<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

        return view('admin.perfils.create', compact('perfils'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $perfil = $this->perfil->create($data);

        flash('Perfil Criado com sucesso!')->success();
        return redirect()->route('admin.perfils.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $perfil
     * @return \Illuminate\Http\Response
     */
    public function show($perfil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $perfil
     * @return \Illuminate\Http\Response
     */
    public function edit($perfil)
    {
        $perfil = $this->perfil->findOrFail($perfil);

        return view('admin.perfils.edit', compact('perfil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $perfil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $perfil)
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
