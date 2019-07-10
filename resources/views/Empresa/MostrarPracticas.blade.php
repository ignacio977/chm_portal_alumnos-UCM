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
  <div class="card-content center">
    <table class="table-border table-striped responsive-table">
      <thead>
        <tr>
          <th>Actividad Principal</th>
          <th>Enfoque y conocimientos</th>
          <th>Fecha Publicacion</th>
          <th>Estado</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <thead>
          @foreach ($Practicas as $practica)
            <tr>
              <form action="{{url('/empresa/practicas/mostrar')}}" method="post">
                  <input name="id" value={{$practica->id}} type="hidden">
                  <td> {{$practica->Actividad1}}</td>
                  <td> {{$practica->Enfoque}}</td>
                  @php
                      $tiempo = \Carbon\Carbon::parse($practica->updated_at)->diffForHumans();
                  @endphp
                  <td> {{ucfirst($tiempo)}} </td>
                  <td> {{$practica->Estado}}</td>
                  <td><button name="view_button" id="view_button" class="waves-effect orange btn" type="submit">
                    <i class="material-icons">visibility</i></button>                    
                    <button name="update_button" class="waves-effect blue btn" type="submit">
                    <i class="material-icons" >edit</i></button>
                    <button name="delete_button" class="waves-effect red btn" type="submit">
                    <i class="material-icons">cancel</i></button>
              </button></form></td>
          @endforeach
        </thead>
      </tbody>
    </table>
  </div>
</div>

@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script src={{ asset('js/table_scripts.js') }}></script>
@endsection
