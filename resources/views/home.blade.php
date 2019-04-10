@extends('layout.master') {{-- Mantenemos estandar base --}}
@section('title') {{-- Cambiamos titulo de pagina --}}
  <title>Página de Inicio</title>
@endsection
@section('styles') {{-- Incluimos los archivos a utilizar para front --}}
  @include('layout.materialize') {{-- De usar materialize, incluimos desde el layout --}}
@endsection
@section('body') {{-- Aqui trabajamos todo el contenido de la vista --}}
  {{-- Contenido --}}
@endsection
