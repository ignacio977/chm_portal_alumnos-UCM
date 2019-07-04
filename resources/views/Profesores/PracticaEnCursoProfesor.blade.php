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
        <span class="white-text">Bienvenido {{Auth::user()->nombres}} aqui se muestran las practicas que actualmente se encuentran en curso.
        </span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card-content  center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Alumno</th>
              <th>Empresa</th>
              <th>Actividad</th>
              <th>Fecha Inicio</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($Coleccion as $practica)
                  <tr>
                    <td> {{$practica->alumno->nombres}}</td>
                    <td> {{$practica->practica->empresa->nombres}}</td>
                    <td> {{$practica->practica->PuestoOfrecido}}</td>
                    <td> {{\Carbon\Carbon::parse($practica->created_at)->diffForHumans()}} </td>
                    <td>
                      <a href="#modalpractica{{$practica->id}}" class="btn waves-effect waves-light modal-trigger" style="background-color: #253e85;">Detalles</a>
                    </td>
                  <div id="modalpractica{{$practica->id}}" class="modal">
                      <div class="modal-content">
                        <div class="container"></div>
                          <form action="">
                            <input type="text">
                            <input type="text">
                            <input type="text">
                          </form>
                      </div>
                      <div class="modal-footer">
                          <a class="modal-close btn waves-effect waves-light red darken-2">Eliminar</a>
                          <a class="modal-close btn waves-effect waves-light blue darken-4">Cancelar</a>
                      </div>
                  </div>
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