@extends('layouts.app')

@section('content')

<h1>Criar Usuário</h1>
<form action="{{$action}}" method="post">
    @csrf
        @method($method)
    
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name='name' class="form-control @error('name') is-invalid @enderror"
        value="{{isset($user) ? $user->name : ''}}">
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name='email' class="form-control @error('email') is-invalid @enderror"
        value="{{isset($user) ? $user->email : ''}}"
        >
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="perfil">Perfil de Usuario</label>
        <select name="perfils_id" class="form-control @error('perfils_id') is-invalid @enderror">
        <option value=""></option>
            @foreach($perfis as $perfil)
                <option value="{{$perfil->id}}" {{ isset($user) && ($user->perfils_id == $perfil->id) ? 'selected' : '' }}>{{$perfil->nome}}</option>
            @endforeach
        </select>
        @error('perfils_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-lg btn-success">Cadastrar Usuário</button>
    </div>
</form>

@endsection