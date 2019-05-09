@extends('layout.master')

@section('title')
  <title>Perfil CAP</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  INFORMACIÓN DEL CAP
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
