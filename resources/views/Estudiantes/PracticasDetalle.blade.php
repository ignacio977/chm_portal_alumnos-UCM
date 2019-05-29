{{-- Restriccion de acceso --}}


@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')

<div class="row">
    <div class="col s24 m13">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Revisa en detalle la oferta de practica, luego de la selección se bloqueará la selección de practicas.
        </span>
      </div>
    </div>
  </div>

<div class="container">
  <div class="card-panel center">
      
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
