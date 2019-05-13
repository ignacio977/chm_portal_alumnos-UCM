{{-- Restriccion de acceso --}}
@if(Auth::check())
  @if(Auth::user()->tipo_usuario!='empresa')
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
  <title>Perfil INFORMACION EMPRESA</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
INFORMACIÓN DE LA EMPRESA
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
