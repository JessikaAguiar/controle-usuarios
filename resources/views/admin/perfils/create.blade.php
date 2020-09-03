@extends('layouts.app')

@section('content')

<h1>Criar Perfil</h1>
<form action="{{route('admin.perfils.store')}}" method="post">
    @csrf
    
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name='nome' class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Cadastrar Perfil</button>
    </div>
</form>

@endsection