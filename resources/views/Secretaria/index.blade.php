{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil Secretaria</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($secretaries as $secretary) {{-- Obtención de los datos de la secretaria --}}
    @if ($secretary->id == Auth::user()->id) {{-- TODO: Arreglar estética --}} 
      Nombre: {{$secretary->nombres}} {{$secretary->apellidos}}
      <br>
      Rut: {{$secretary->rut}}
      <br>
      Email: {{$secretary->email}}
      <br>
      Dirección: {{$secretary->direccion_actual}}
      <br>
      Telefono: {{$secretary->telefono}}
      <br>
      Celular: {{$secretary->celular}}    
    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
