{{-- Restriccion de acceso --}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection


@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
INFORMACIÓN DEL ESTUDIANTE
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
