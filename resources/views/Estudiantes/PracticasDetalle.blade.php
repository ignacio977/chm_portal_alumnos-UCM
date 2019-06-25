{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')

<div class="row">
  <div class="col s24 m13">
    <div class="card-panel" style="background-color: #253e85;">
      <span class="white-text">Revisa en detalle la oferta de practica, luego de la selección se bloqueará la selección de practicas.
      </span>
    </div>
  </div>
</div>

<div class="container">
  <div class="card-content center ">
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Empresa</th>
            <th>Actividad Principal</th>
            <th>Actividad Secundaria</th>
            <th>Actividad Terciaria</th>
            <th>Actividad Cuarta</th>
            <th>Desde:</th>
            <th>Hasta:</th>
            <th>Puesto Ofrecido</th>
            <th>Enfoque</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <thead>
              @foreach ($Practicas as $practica)
                  <form action={{route('solicitudpractica')}} method="post">
                    {{csrf_field()}}
                  <td> {{$practica->empresa->nombres}}</td>
                  <td> {{$practica->Actividad1}}</td>
                  <td> {{$practica->Actividad2}}</td>
                  <td> {{$practica->Actividad3}}</td>
                  <td> {{$practica->Actividad4}}</td>
                  <td> {{$practica->HorasDesde}}</td>
                  <td> {{$practica->HorasHasta}}</td>
                  <td> {{$practica->PuestoOfrecido}}</td>
                  <td> {{$practica->Enfoque}}</td>
                  <input type="hidden" name="idalumno" value={{Auth::user()->id}}>
                  <input type="hidden" name="idpractica" value={{$practica->id}}>
                  <td><button type="submit" class="btn waves-effect waves-light" >Postular</button>
                    <br><br>
                  <a href="/estudiante/practicasofertadas" class="btn waves-effect waves-light red" >Cancelar</a> </td>
                  </form>
              @endforeach
          </thead>
        </tbody>
      </table>
  </div>
</div>

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
