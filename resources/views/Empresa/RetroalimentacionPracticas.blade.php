@extends('layout.master')

@section('title')
  <title>Perfil Empresa</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<br>
<div class="container">
  <div class="card-panel center">
    <h5>Retroalimentacion Practica Profesional</h5>
    <br>
    <a class="btn waves-effect waves-light" href="http://localhost:8000/empresa/practicas/mostrar" >Volver</a>
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
