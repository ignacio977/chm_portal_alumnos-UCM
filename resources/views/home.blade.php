{{-- Mantenemos estandar base --}}
@extends('layout.master')

{{-- Cambiamos titulo de pagina --}}
@section('title')
  <title>Página de Inicio</title>
@endsection

{{-- Incluimos los archivos a utilizar para front --}}
@section('styles')
  @include('layout.materialize') {{-- De usar materialize, incluimos desde el layout --}}
@endsection

{{-- Aqui trabajamos todo el contenido de la vista --}}
@section('body')
  {{-- Contenido --}}
  Home
@endsection

{{-- Agregamos los scripts para todos los elementos que utilicen JQuery al final para ayudar en tiempos de carga --}}
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
