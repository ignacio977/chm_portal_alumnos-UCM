{{-- Restriccion de acceso --}}
@if(Auth::check())
  @if(Auth::user()->tipo_usuario!='estudiante')
    @php
      header("Location: /home")
    @endphp
  @endif
@else
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
