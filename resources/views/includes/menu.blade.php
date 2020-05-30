<nav  class="mt-2" >
  <ul id="menu" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

@if(auth()->user()->role == 'client')
  <li class="nav-header">CLIENTE</li>
    <li class="nav-item has-treeview" id="submenu">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cubes"></i>
        <p>
          Casos
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="pages/layout/top-nav.html" class="nav-link">
            <i class="fas fa-notes-medical nav-icon"></i>
            <p>Crear</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
            <i class="fas fa-eye nav-icon"></i>
            <p>Ver estado</p>
          </a>
        </li>
      </ul>
    </li>
@elseif(auth()->user()->role == 'admin')
    <li class="nav-header">ADMINISTRACION</li>
    <li class="nav-item has-treeview" id="submenu">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-atlas"></i>
        <p>
        Gestionar
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview" >
        <li class="nav-item">
          <a href="/clients" class="nav-link">
            <i class="fas fa-users-cog nav-icon"></i>
            <p>Clientes</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="/specialist" class="nav-link">
            <i class="fas fa-user-tie nav-icon"></i>
            <p>Especialistas</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="/cases" class="nav-link">
            <i class="fas fa-cubes nav-icon"></i>
            <p>Casos</p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item">
      <a href="/categories" class="nav-link">
        <i class="fas fa-folder-open nav-icon"></i>
        <p>
          Categorias
        </p>
      </a>
    </li>
@elseif(auth()->user()->role == 'aux')
    <li class="nav-header">ESPECIALISTA</li>
    <li class="nav-item">
      <a href="/inbox" class="nav-link">
        <i class="nav-icon fas fa-inbox text-danger"></i>
        <p class="text">Mi Bandeja</p>
      </a>
    </li>
    {{-- <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-warning"></i>
        <p>Warning</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle text-info"></i>
        <p>Informational</p>
      </a>
    </li> --}}
@endif
    <li class="nav-header">MI PERFIL</li>
    <li class="nav-item">
      <a href="/profile" class="nav-link">
        <i class="nav-icon fas fa-user-edit"></i>
        <p>
          Editar
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('formLogout').submit();">
        <form action="{{ route('logout') }}" method="POST" style="display: none;" id="formLogout">
          @csrf
        </form>
        <i class="nav-icon fas fa-door-open"></i>
        <p>
          Cerrar Sesion
        </p>
      </a>
    </li>

  </ul>
</nav>
