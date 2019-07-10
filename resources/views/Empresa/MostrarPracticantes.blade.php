{{-- Restriccion de acceso --}}

@if(Auth::check())
  @if(Auth::user()->tipo_usuario != 'empresa')
    @php
      header("Location: /home");
      die();
    @endphp
  @endif
@else
  @php
    header("Location: /home");
    die();
  @endphp
@endif

@extends('layout.master')

@section('title')
  <title>Creacion Practicas Profesionales</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
@if(session('errores'))
  <div class="card-panel teal accent-1">
    Practica Profesional creada correctamente
  </div>
@endif
@if(session('Eliminado'))
  <div class="card-panel red accent-1">
    Practica Profesional eliminada correctamente
  </div>
@endif
@if(session('update'))
  <div class="card-panel blue accent-1">
    Practica Profesional actualizada correctamente
  </div>
@endif
<br>
<div class="container">
    <div class="card-panel center">
      <h5>Informacion Practicantes</h5>
      <br>
  @foreach ($Practicantes as $Practicante)
    <div class="card-panel center">
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Nombre Completo</th>
            <th>Rut</th>
            <th>E-Mail</th>
            <th>Enfoque</th>
            <th>Puesto</th>
          </tr>
        </thead>
        <tbody>
          <thead>
            <tr>
              <form action="{{url('/empresa/practicas/mostrar')}}" method="post">
                  <input name="id" value={{$Practicante->alumno->id}} type="hidden">
                  <td>{{$Practicante->alumno->nombres}}<br>{{$Practicante->alumno->apellidos}}</td>
                  <td>{{$Practicante->alumno->rut}}</td>
                  <td>{{$Practicante->alumno->email}}</td>
                  {{-- @php
                      $tiempo = \Carbon\Carbon::parse($practica->updated_at)->diffForHumans();
                  @endphp --}}
                  <td>{{$Practicante->practica->Enfoque}}</td>
                  <td>{{$Practicante->practica->PuestoOfrecido}}</td>
          </thead>
        </tbody>
      </table>
    </div>
  @endforeach
</div>
</div>

@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script src={{ asset('js/table_scripts.js') }}></script>
@endsection
