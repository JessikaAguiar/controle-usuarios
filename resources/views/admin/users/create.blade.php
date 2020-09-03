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
        <select name="perfils_id" class="form-control">
            @foreach($perfis as $perfil)
                <option value="{{$perfil->id}}">{{$perfil->nome}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Cadastrar Usuário</button>
    </div>
</form>

@endsection