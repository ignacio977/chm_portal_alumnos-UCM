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
<br>
<div class="container">
  <div class="card-content  center">
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Actividad Principal</th>
            <th>Enfoque y conocimientos</th>
            <th>Fecha Publicacion</th>
            {{-- <th>Detalles</th> --}}
            
          </tr>
        </thead>
        <tbody>
          <thead>
              @foreach ($Practicas as $practica)
                <tr>
                  <td> {{$practica->Actividad1}}</td>
                  <td> {{$practica->Enfoque}}</td>
                  <td> {{\Carbon\Carbon::parse($practica->updated_at)->diffForHumans()}} </td>
                  {{-- <td>
                    <a href="{{route('DetallePractica',['id' => $practica->id])}}" class="btn waves-effect waves-light" style="background-color: #253e85;">Click Aquí</a>
                  </td> --}}
                  
                  
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
