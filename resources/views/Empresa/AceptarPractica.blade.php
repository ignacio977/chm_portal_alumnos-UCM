@extends('layout.master')

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col s12 m8">
            <div class="card-panel" style="background-color: #253e85;">
                <span class="white-text">Bienvenido {{Auth::user()->nombres}} 
                    aquí se muestran las postulaciones de prácticas pendientes, 
                    puedes aceptar o rechazar cada practica usando los botones laterales.
                </span>
            </div>
        </div>
    </div>
    @forelse ($Coleccion as $postulacion)
    <div class="row">
        <div class="col s2"></div>
        <div class="col s8 z-depth-3 section">
            <div class="col s8 section">
                <h6 class="">Numero de postulación  : {{$postulacion->id}}</h6>
                <h6 class="">Alumno                 : {{$postulacion->alumno->nombres}}</h6>
            <h6 class="">Practica               : {{$postulacion->practica->empresa->nombres}} : {{$postulacion->practica->PuestoOfrecido}}</h6>
            </div>
            <div class="col s2 section">
                <form action="/empresa/practicas/accion" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_postulacion" value={{$postulacion->id}}>
                    <input type="hidden" name="estado" value="Aceptada">
                    <br><button type= "submit" class="btn-floating btn-large waves-effect waves-light blue darken-2"><i class="material-icons">check</i></button>
                </form>
            </div>
            <div class="col s2 section">
                <form action="/empresa/practicas/accion" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_postulacion" value={{$postulacion->id}}>
                    <input type="hidden" name="estado" value="Rechazada">
                    <br><button type= "submit" class="btn-floating btn-large waves-effect waves-light red darken-2"><i class="material-icons">clear</i></button>
                </form>
            </div>
        </div>
        <div class="col s2"></div>
    </div>    
    @empty
        
    @endforelse
  
    <div class="container">
        <div class="center">
            @include('layout.pagination')
        </div>
    </div>
</div>

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection