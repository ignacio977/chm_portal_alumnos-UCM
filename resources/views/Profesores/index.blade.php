{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil Profesor</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($professors as $professor) {{-- Obtención de los datos del profesor --}}
    @if ($professor->id == Auth::user()->id) {{-- TODO: Arreglar estética --}} 
      Nombre: {{$professor->nombres}} {{$professor->apellidos}}
      <br>
      Rut: {{$professor->rut}}
      <br>
      Email: {{$professor->email}}
      <br>
      Dirección: {{$professor->direccion_actual}}
      <br>
      Telefono: {{$professor->telefono}}
      <br>
      Celular: {{$professor->celular}}    
      <br>
      Cargo: {{$professor->cargo}}   
      <br>
      Departamento: {{$professor->departamento}}   
    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
