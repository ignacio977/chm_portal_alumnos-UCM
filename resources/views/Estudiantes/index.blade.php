{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($students as $student) {{-- Obtención de los datos del estudiante --}}
      @if ($student->id == Auth::user()->id) {{-- TODO: Arreglar estética --}} 
        Nombre: {{$student->nombres}}
        {{$student->apellidos}}
        <br>
        Email: {{$student->email}}
        <br>
        Dirección: {{$student->direccion_actual}}
        <br>
        Telefono: {{$student->telefono}}
        <br>
        Celular: {{$student->celular}}
        <br>
        Fecha de Ingreso: {{date("d-m-Y", strtotime($student->fecha_ingreso))}} {{-- cambiamos el formato para mostrar la fecha --}}    
      @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
