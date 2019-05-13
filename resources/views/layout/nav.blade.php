
{{-- Navbar --}}
<nav>
  <div class="nav-wrapper" style="background-color: #17AEF6;">
    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
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
            document.getElementById('logout-form').submit();"><b>
            {{ __('Cerrar sesión') }}</b>
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
  <li><div class="user-view">
    <div class="background">
      <img src="images/forest.jpg">
    </div>
    <a href="#user"><img class="circle" src="images/smile.png"></a>
    <a href="#name"><span class="white-text name">Mike John</span></a>
    <a href="#email"><span class="white-text email">correolindo@gmail.com</span></a>
  </div></li>
  <li><a class="waves-effect" href="#!">Test</a></li> {{-- Agregar acá los botones igual, para poder visualizar en dispositivos móviles --}}
  <li><div class="divider"></div></li>
</ul>

{{-- Modal (cuadro emergente de inicio de sesión) --}}
<div id="modal1" class="modal"> 
  <div class="modal-content">
    <form action="{{ route('login') }}" id="form_id" method="POST">
      @csrf
      {{-- Entrada de rut --}}
      <div class="form-group row">
        <div class="col-md-6">
            <label for="rut">Rut</label> 
          <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut"  required autofocus>
        </div>
      </div>
      {{-- Entrada de contraseña --}}
      <div class="form-group row">
        <div class="col-md-6">
            <label for="password">Contraseña</label> 
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>
        </div>
      </div>
      {{-- Botón submit --}}
      <button type="submit" class='btn waves-effect waves-light'>Iniciar sesión
        <i class="material-icons right">send</i>
      </button>  
    </form>
  </div>
</div> 
