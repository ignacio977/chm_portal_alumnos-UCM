{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
  <!--provisional-->
@endsection

@section('body')

<div class="row">
  <div class="col s12 m8">
    <div class="card-panel" style="background-color: #253e85;">
      <span class="white-text">Bienvenido {{Auth::user()->nombres}} tenemos una cartilla de ofertas
        para tu practica, puedes dar click a una oferta para revisar en detalle y además realizar tu postulación.
      </span>
    </div>
  </div>
</div>

<div class="container">
  <div class="card-panel center">
    <div class="container">
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Empresa</th>
            <th>Actividad Principal</th>
            <th>Enfoque y conocimientos</th>
            <th>Fecha Publicacion</th>
            <th>Detalles</th>
          </tr>
        </thead>
        <tbody>
          <thead>
              @foreach ($Practicas as $practica)
                <tr>
                  <td> {{$practica->EmpresaId}}</td>
                  <td> {{$practica->Actividad1}}</td>
                  <td> {{$practica->Enfoque}}</td>
                  <td> {{\Carbon\Carbon::parse($practica->updated_at)->diffForHumans()}} </td>
                  <td>
                    <a href="{{route('DetallePractica',['id' => $practica->id])}}" class="btn waves-effect waves-light" style="background-color: #253e85;">Click Aquí</a>
                  </td>
              @endforeach
          </thead>
        </tbody>
      </table>
      <!--Aqui crearé la paginación-->
      @include('layout.pagination')
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script src={{ asset('js/table_scripts.js') }}></script>
@endsection
