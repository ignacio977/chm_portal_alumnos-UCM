{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div>
  <div class="row">
    <div class="col s12 m8">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Bienvenido {{Auth::user()->nombres}} tenemos una cartilla de ofertas
          para tu Coleccion, puedes dar click a una oferta para revisar en detalle y además realizar tu postulación.
        </span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card center">
        <table class="highlight responsive-table">
          <thead>
            <tr>
                <th>Fecha de postulación</th>
                <th>Nombre empresa</th>
                <th>Nombre practicante</th>
                <th>Ver practica</th>
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($Coleccion as $practica)
                    <tr>
                        <td>{{\Carbon\Carbon::parse($practica->updated_at)->diffForHumans()}}</td>
                        <td>{{$practica->practica->empresa->nombres}}</td>
                        <td>{{$practica->alumno->nombres}}</td>
                        <td>
                            <a id="BotonVisto" name="BotonVisto" class="waves-effect waves-light blue btn modal-trigger" data-target="NotificacionId">
                            <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                        </td>
                    </tr>
                @endforeach
            </thead>
          </tbody>
        </table>
        <div class="container">
          <div class="centered">
          @include('layout.pagination')
          </div>
        </div>
    </div>
  </div>
</div>

{{--Alerta de pagina de practicas sin datos--}}
@include('layout.alert')

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  @if(empty($Coleccion->total()))
    <script type="text/javascript" Cabecera=" Error " TextoBajada="No existen practicas que se estén realizando por el momento." 
    Redirec="/profesor/coordinador" src={{ asset('js/alert.js') }}></script>
  @endif
@endsection