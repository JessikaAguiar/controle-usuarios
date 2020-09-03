@extends('layouts.app')

@section('content')

<a href="{{route('admin.perfils.create')}}" class="btn btn-sm btn-success">Criar Perfil</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($perfils as $perfil)
            <tr>
                <td>{{$perfil->nome}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin.perfils.edit', ['perfil' => $perfil->id])}}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{route('admin.perfils.destroy', ['perfil' => $perfil->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$perfils->links()}}

@endsection