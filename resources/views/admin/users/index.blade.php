@extends('layouts.app')

@section('content')

<a href="{{route('admin.users.create')}}" class="btn btn-sm btn-success">Criar Usuário</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Perfil</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->perfil->nome}}</td>
                <td>
                    <a href="{{route('admin.users.edit', ['user' => $user->id])}}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{route('admin.users.destroy', ['user' => $user->id])}}" method="post">
                        @csrf
                        @method("DELETE")

                        <button class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$users->links()}}

@endsection