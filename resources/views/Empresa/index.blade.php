{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil INFORMACION EMPRESA</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($companys as $company) {{-- Obtención de los datos de la Empresa --}}
    @if ($company->id == Auth::user()->id) {{-- TODO: Arreglar estética --}} 
      Nombre: {{$company->nombres}}
      {{$company->apellidos}}
      <br>
      Rut: {{$company->rut}}
      <br>
      Email: {{$company->email}}
      <br>
      Dirección: {{$company->direccion_actual}}
      <br>
      Telefono: {{$company->telefono}}
      <br>
      Celular: {{$company->celular}} 
    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
