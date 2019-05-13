{{-- Navbar --}}
<nav>
  <div class="nav-wrapper" style="background-color: #17AEF6;">
    @if (Route::has('login'))
      @auth
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      @endauth
    @endif
    <a href="#!" class="brand-logo" align="middle">UCM</a>
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

{{-- Sidenav (menú desplegable que al que se cambia cuando se está en un dispositivo móvil) --}}
<ul id="slide-out" class="sidenav">
  <li>
    <div class="user-view">
      <div class="background">
        <img src="images/forest.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/smile.png"></a>
      <a href="#name"><span class="white-text name">Mike John</span></a>
      <a href="#email"><span class="white-text email">correolindo@gmail.com</span></a>
    </div>
  </li>
  <li>
    <a class="waves-effect" href="#!">Test</a> {{-- Agregar acá los botones igual, para poder visualizar en dispositivos móviles --}}
  </li>
  <li>
    <div class="divider"></div>
  </li>
</ul>

@include ('layout.login_modal')


