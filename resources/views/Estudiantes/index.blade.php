{{-- Restriccion de acceso --}}
@if(Auth::user()->type!='estudiante')
  @php
    header("Location: /home")
  @endphp
@endif
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
