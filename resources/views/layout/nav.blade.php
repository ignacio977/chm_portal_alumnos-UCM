{{-- Navbar --}}
<nav>
  <div class="nav-wrapper" style="background-color: #253e85;">
    @if (Route::has('login'))
      @auth
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      @endauth
    @endif
    <a href="/home" class="brand-logo" align="middle">UCM</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="">Botón 1</a></li>
      <li><a href="">Botón 2</a></li>
      <li><a href="">Botón 3</a></li>
      @if (Route::has('login'))
        @auth <!--Si hay una sesión iniciada-->
          <li><a>{{ Auth::user()->nombres }}</a></li>
          <li><a href="{{ route('logout') }}"
                  class="red darken-1"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <b>{{ __('Cerrar sesión') }}</b>
          </a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        @else
          <li><b><a class="modal-trigger blue darken-2" href="#modal1">Iniciar sesión</a></b></li>
        @endauth
      @endif
    </ul>
  </div>
</nav>

{{-- Sidenav --}}
<ul id="slide-out" class="sidenav">
  <li>
    <div class="user-view">
      <div class="background">
        <img src="/images/forest.jpg">
      </div>
      <a href="#user"><img class="circle" src="/images/smile.png"></a>
      <a href="#name"><span class="white-text name">Mike John</span></a>
      <a href="#email"><span class="white-text email">correolindo@gmail.com</span></a>
    </div>
  </li>
  <li>
    @if(Auth::check()) {{-- Verificamos que esté iniciada la sesión --}}
      @if (Auth::user()->tipo_usuario == 'estudiante'){{-- Botones a los que tendrá acceso solo el estudiante --}}
        <a class="waves-effect" href="/estudiante">Perfil Estudiante</a> {{-- Copiar el botón para agregar redireccionamientos --}}
      @endif
      @if (Auth::user()->tipo_usuario == 'profesor')
        <a class="waves-effect" href="/profesor">Perfil Profesor</a>
      @endif
      @if (Auth::user()->tipo_usuario == 'director')
        <a class="waves-effect" href="/director">Perfil Director</a>
      @endif
      @if (Auth::user()->tipo_usuario == 'secretaria')
        <a class="waves-effect" href="/secretaria">Perfil Secretaria</a>
        <a class="waves-effect" href="/secretaria_reserva">Reserva De Salas</a>
        <a class="waves-effect" href="/secretaria_agregar_sala">Agregar Sala</a>
        <a class="waves-effect" href="/secretaria_listado_reservas">Listado De Reservas</a> 
      @endif
      @if (Auth::user()->tipo_usuario == 'empresa')
        <a class="waves-effect" href="/empresa">Perfil Empresa</a>
      @endif
    @endif
  </li>
  <li>
    <div class="divider"></div>
  </li>
</ul>

{{-- Login Form --}}
@include ('layout.login_modal')
