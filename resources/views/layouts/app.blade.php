<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Usuários</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('home')}}">Controle de Usuários</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    @auth
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.users.index')}}">Usuarios</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.perfils.index')}}">Perfis</a>
      </li>
    </ul>
    <div class=" my-2 my-lg-0">
        <a class="navbar-brand" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
       
        <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
    @endauth
  </div>
</nav>
    <div class="container mt-5">
        @include('flash::message')

        @yield('content')
    </div>
</body>
</html>