<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="{{route('home')}}">Controle de Usuários</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  @auth
    <ul class="navbar-nav mr-auto">
      <li class="nav-item @if(request()->is('admin/users')) active @endif">
        <a class="nav-link" href="{{route('admin.users.index')}}">Usuarios</a>
      </li>
      <li class="nav-item @if(request()->is('admin/perfils')) active @endif">
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
