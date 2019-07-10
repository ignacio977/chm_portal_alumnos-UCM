{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Coordinador de practicas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div>
  <div class="row">
    <div class="col s12 m8">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Bienvenido {{Auth::user()->nombres}} aqui se muestran las practicas que actualmente cuentan con postulaciones abiertas.
        </span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card-content  center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Empresa</th>
              <th>Actividad Principal</th>
              <th>Enfoque y conocimientos</th>
              <th>Fecha Publicacion</th>
              <th>Cantidad de Solicitudes</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($Coleccion as $practica)
                  <tr>
                    <td> {{$practica->empresa->nombres}}</td>
                    <td> {{$practica->Actividad1}}</td>
                    <td> {{$practica->Enfoque}}</td>
                    <td> {{\Carbon\Carbon::parse($practica->updated_at)->diffForHumans()}} </td>
                    <td> {{$practica->PostulacionPractica->count()}}</td>
                    <td>
                      <a href="{{route('DetalleCoordinacionPractica',['id' => $practica->id])}}" class="btn waves-effect waves-light" style="background-color: #253e85;">Detalles</a>
                    </td>
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
    <script type="text/javascript" Cabecera="¡¡Error!!" TextoBajada="No hay practicas por el momento, intenta más tarde" Redirec="/estudiante" src={{ asset('js/alert.js') }}></script>
  @endif
@endsection