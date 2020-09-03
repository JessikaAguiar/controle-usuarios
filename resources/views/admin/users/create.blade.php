@extends('layouts.app')

@section('content')

<h1>Criar Usuário</h1>
<form action="{{route('admin.users.store')}}" method="post">
    @csrf
    
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name='name' class="form-control">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name='email' class="form-control">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="form-group">
        <label for="perfil">Perfil de Usuario</label>
        <input type="text" nome="perfil" class="form-control">
    </div>

    <div class="form-group">
        <label for="usuarios">Usuários</label>
        <select name="user" class="form-control">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Cadastrar Usuário</button>
    </div>
</form>

@endsection