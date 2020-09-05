@extends('layouts.app')

@section('content')

<h1>Criar Perfil</h1>
<form action="{{$action}}" method="post">
    @csrf
        @method($method)
    
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name='nome' class="form-control" 
        value="{{isset($perfil) ? $perfil->nome : ''}}">
        @error('nome')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Cadastrar Perfil</button>
    </div>
</form>

@endsection