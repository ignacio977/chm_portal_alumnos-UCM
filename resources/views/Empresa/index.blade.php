{{-- Restriccion de acceso --}}
@php
  $user = Auth::User();
  if(!isset($user))
    header("Location: /home");
  if($user->tipo_usuario!='empresa')
    header("Location: /home");
@endphp

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
