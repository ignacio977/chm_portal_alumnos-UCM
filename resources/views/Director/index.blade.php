{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil DIRECTOR DE CARRERA</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($directors as $director) {{-- Obtención de los datos del estudiante --}}
    @if ($director->id == Auth::user()->id) {{-- TODO: Arreglar estética --}} 
      Nombre: {{$director->nombres}}
      {{$director->apellidos}}
      <br>
      Email: {{$director->email}}
      <br>
      Dirección: {{$director->direccion_actual}}
      <br>
      Telefono: {{$director->telefono}}
      <br>
      Celular: {{$director->celular}} 
    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
