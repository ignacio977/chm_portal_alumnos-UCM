{{-- Restriccion de acceso --}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil Profesor</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  INFORMACIÓN DEL PROFESOR
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
