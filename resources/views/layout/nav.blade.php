{{-- Navbar --}}
<style>
  .dropdown-content {
    top: 100% !important;
    width: 300px !important;
  }
  .notification-badge {
    position: relative;
    right: 0px;
    top: -18px;
    color: #ffffff;
    background-color: #FF4081;
    margin: 0 -.8em;
    border-radius: 50%;
    padding: 1px 5px;
    font-family: "Roboto";
  }
  .notification-icon--fixed {
    max-height: 60px;
    width: 60px;
  }
</style>
<nav>
  <div class="nav-wrapper" style="background-color: #253e85;">
    @if (Route::has('login'))
      @auth
        <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
      @endauth
    @endif
    @auth <!--Si hay una sesión iniciada-->
      <a href="/home">
        <img class="brand-logo" align="middle" src="/images/logo_ucm.png" width="150" style="position: relative; bottom: 6px">
      </a>
    @else
      <a href="/home">
        <img class="brand-logo" align="middle" src="/images/logo_ucm.png" width="150" style="position: relative; bottom: 6px; left: 62px">
      </a>
    @endauth
    <ul class="right hide-on-med-and-down">
      {{-- En este sector se ponen las notificaciones --}}
      @if(Auth::user())
        @if(Auth::user()->tipo_usuario=="estudiante")
          <!-- {{$ArregloVisto=Auth::user()->PostulacionPractica->pluck('inspeccionado')}} -->
          <!-- {{$ArregloUpdate=Auth::user()->PostulacionPractica->pluck('updated_at')}} -->
          <!-- {{$contador=0}} -->
          <!-- {{$NotificacionPractica=0}} -->
          @foreach ($ArregloVisto as $FechaVisto)
            @if($FechaVisto < $ArregloUpdate[$contador])
              <!-- {{$NotificacionPractica=$NotificacionPractica+1}} -->
            @endif
            <!-- {{$contador=$contador+1}} -->
          @endforeach
          <!-- {{$NotificacionTotal=$NotificacionPractica}} -->
          <li><a class="dropdown-trigger tooltipped waves-effect waves-light" data-target='DropdownNotificacion' data-position="left" data-tooltip="Notificaciones"><i class="material-icons" style="margin-right: 10px;">public
            @if($NotificacionTotal>0)
              <small class="notification-badge">{{$NotificacionTotal}}</small>
            @endif
          </i></a></li>
          <ul id='DropdownNotificacion' class='dropdown-content'>
            <li><a class="blue-text text-darken-2" href="/estudiante/novedadespractica"><i class="material-icons">work
            @if($NotificacionPractica>0)
              <small class="notification-badge">{{$NotificacionPractica}}</small>
            @endif
              </i>Novedades de Practica</a>
            </li>
            {{-- <li class="divider" tabindex="-1"></li>
            <li><a class="blue-text text-darken-2" href="#!">two</a></li>
            <li class="divider" tabindex="-1"></li>
            <li><a class="blue-text text-darken-2" href="#!">three</a></li> --}}
          </ul>
        @endif
      @endif
      {{-- Se cierra el sector de notificaciones --}}
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
        <img src="/images/backucm.png" class="responsive-img">
      </div>
      @if (empty(Auth::user()->foto)) {{-- Si el usuario no tiene foto --}}
        <a class="modal-trigger" href="#modal_photo"><img class="circle" src="/images/default.png"></a>
      @else {{-- Si el usuario sí tiene foto --}}
        <?php $direccion_imagen = Auth::user()->foto ?>
        <a class="modal-trigger" href="#modal_photo"><img class="circle" src="{{ URL::asset("{$direccion_imagen}") }}"></a>
      @endif
      @auth
        <a href="#name"><span class="white-text name">{{Auth::user()->nombres}}</span></a>
        <a href="#email"><span class="white-text email">{{Auth::user()->email}}</span></a>
      @endauth
    </div>
  </li>
  <li>
    @if(Auth::check()) {{-- Verificamos que esté iniciada la sesión --}}
      @if (Auth::user()->tipo_usuario == 'estudiante'){{-- Botones a los que tendrá acceso solo el estudiante --}}
        <a class="waves-effect" href="/estudiante">Perfil Estudiante</a> {{-- Copiar el botón para agregar redireccionamientos --}}

        @if(empty(Auth::user()->PostulacionPractica->where('estado','Aceptada')->first()))
          <a class="waves-effect" href="/estudiante/practicasofertadas">Selección de prácticas</a>
        @endif
        @if(Auth::user()->PostulacionPractica->where('estado','Confirmada')->first())
          @if(Auth::user()->PostulacionPractica->where('estado','Confirmada')->first()->encurso->where('estado','Finalizada')->first()||
              Auth::user()->PostulacionPractica->where('estado','Confirmada')->first()->encurso->where('estado','FinalizadaRespondidaE')->first())
            <a class="waves-effect" href="/estudiante/evaluacionpractica">Evaluar Práctica Finalizada</a>
          @endif
        @endif
      @endif
      @if (Auth::user()->tipo_usuario == 'profesor')
        <a class="waves-effect" href="/profesor">Perfil Profesor</a>
        <a class="waves-effect" href="/profesor/practicas">Catalogo de practicas</a>
        <a class="waves-effect" href="/profesor/coordinador">Postulaciones</a>
        <a class="waves-effect" href="/profesor/coordinador/PracticaActual">Practicas en curso</a>
        <a class="waves-effect" href="/profesor/coordinador/addE">Agregar Empresa</a>
        <a class="waves-effect" href="/profesores_reserva">Reserva De Salas</a>
        <a class="waves-effect" href="/profesores_listado_reservas">Mis Reservas</a>
      @endif
      @if (Auth::user()->tipo_usuario == 'director')
        <a class="waves-effect" href="/director">Perfil Director</a>
      @endif
      @if (Auth::user()->tipo_usuario == 'secretaria')
        <a class="waves-effect" href="/secretaria">Perfil Secretaria</a>
        <a class="waves-effect" href="/secretaria_reserva">Reserva De Salas</a>
        <a class="waves-effect" href="/secretaria_agregar_sala">Agregar Sala</a>
        <a class="waves-effect" href="/secretaria_listado_salas">Listado De Salas</a>
        <a class="waves-effect" href="/secretaria_listado_reservas">Listado De Reservas</a>
        <a class="waves-effect" href="/secretaria_confirmar_listado_reservas">Confirmar Reservas</a>

      @endif
      @if (Auth::user()->tipo_usuario == 'empresa')
        <a class="waves-effect" href="/empresa">Perfil Empresa</a> 
        <a class="waves-effect" href="/empresa/practicas">Crear Practicas</a> 
        <a class="waves-effect" href="/empresa/practicas/mostrar">Mostrar Practicas</a> 
        <a class="waves-effect" href="/empresa/practicas/Aceptar">Aceptar Practicas</a> 
        <a class="waves-effect" href="/empresa/practicas/mostrarP">Mostrar Practicantes</a>
        <a class="waves-effect" href="/empresa/practicas/mostrarR">Retroalimentacion Practicas</a>
        <a class="waves-effect" href="/empresa/practicas/mostrar_finalizadas">Practicas Finalizadas</a>
      @endif
    @endif
  </li>
  <li>
    <div class="divider"></div>
  </li>
</ul>

{{-- Login Form --}}
@include ('layout.login_modal')

{{-- Photo Form --}}
@include ('layout.photo_modal')

<script>
  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
</script>
<script>
  $('.dropdown-trigger').dropdown();
</script>
