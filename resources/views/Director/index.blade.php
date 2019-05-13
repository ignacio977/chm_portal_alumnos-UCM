{{-- Restriccion de acceso --}}
@if(Auth::check())
  @if(Auth::user()->tipo_usuario!='director')
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
  <title>Perfil DIRECTOR DE CARRERA</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
INFORMACIÓN DEL DIRECTOR DE CARRERA
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
