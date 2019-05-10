{{-- Navbar --}}
<nav>
  <div class="nav-wrapper" style="background-color: #17AEF6;">
    <a href="#!" class="brand-logo" align="middle">UCM</a>
    <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
      <li><a href="#user"><img class="circle" height="50" align="middle" style="transform: translateY(-15%);" src="images/smile.png"></a></li>
      @if (Route::has('login'))
        @auth <!--Si hay una sesión iniciada-->
              <li><a>{{ Auth::user()->nombres }}</a></li>
              <li><a href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesión') }}
             </a></li>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
             </form>
        @else
              <li><a class="modal-trigger" href="#modal1">Iniciar sesión</a></li>

        @endauth
      @endif
      <li><a href="">Botón 1</a></li>
      <li><a href="">Botón 2</a></li>
      <li><a href="">Botón 3</a></li>
      <li><a class='dropdown-trigger' href='#' data-target='dropdown1'><i class="material-icons">arrow_drop_down</i></a></li>
    </ul>
    <ul id='dropdown1' class='dropdown-content'>
      <li><a href="">Test</a></li> {{-- agregar botones extras para redireccionar a sus trabajos. NO MODIFICAR ESTE--}}
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
    <!--
      <form method="POST" action="/home">
        {{ csrf_field() }}  
        <label for="inputRut">Rut</label> 
        <input type="text" class="form-control" id="inputRut" name="rut">

        <label for="inputPassword">Contraseña</label> 
        <input type="password" class="form-control" id="inputPassword" name="password" >  
        <br>  
        <button type="submit" class='btn waves-effect waves-light'>Iniciar sesión
              <i class="material-icons right">send</i>
        </button>       
      </form>
    -->
    <form action="{{ route('login') }}" id="form_id" method="POST">
        @csrf

        <div class="form-group row">

            <div class="col-md-6">
                <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut"  required autofocus>

                @if ($errors->has('rut'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('rut') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>



        <button type="submit" class='btn waves-effect waves-light'>Iniciar sesión
            <i class="material-icons right">send</i>
      </button>    


            </div>
        </div>
    </form>
  </div>
</div> 