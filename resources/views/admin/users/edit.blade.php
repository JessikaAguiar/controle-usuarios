@extends('layouts.app')

@section('content')

<h1>Editar Usuário</h1>
<form action="{{route('admin.users.update',['user' => $user->id])}}" method="post">
    @csrf
    @method("PUT")
    
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name='name' class="form-control" value="{{$user->name}}">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name='email' class="form-control" value="{{$user->email}}">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control" value="{{$user->password}}">
    </div>

    <div class="form-group">
        <label for="perfil">Perfil de Usuario</label>
        <input type="text" nome="perfil" class="form-control">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Atualizar Usuário</button>
    </div>
</form>

@endsection