{{-- Restriccion de acceso --}}
@if(Auth::user()->type!='secretaria')
  @php
    header("Location: /home")
  @endphp
@endif
@extends('layout.master')

@section('title')
  <title>Perfil Secretaria</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  INFORMACIÓN DE LA SECRETARIA
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
