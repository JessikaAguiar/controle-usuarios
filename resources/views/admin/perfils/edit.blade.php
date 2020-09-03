@extends('layouts.app')

@section('content')

<h1>Atualizar Perfil</h1>
<form action="{{route('admin.perfils.update',['perfil' => $perfil->id])}}" method="post">
    @csrf
    @method("PUT")


    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name='nome' class="form-control" value="{{$perfil->nome}}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Atualizar Perfil</button>
    </div>
</form>

@endsection