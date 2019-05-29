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
    <div class="col s12 m5">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Bienvenido {{Auth::user()->nombres}} tenemos una cartilla de ofertas
          para tu practica, es momento de selección.
        </span>
      </div>
    </div>
  </div>

<div class="container">
  <div class="card-panel center">
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
                <td> {{$practica->EmpresaId}} </td>
                <td> {{$practica->Actividad1}} </td>
                <td> {{$practica->Enfoque}} </td>
                <td> {{\Carbon\Carbon::parse($practica->updated_at)->diffForHumans()}} </td>
                <td>
                  <a class="waves-effect" href="{{route('DetallePractica',['id' => $practica->id])}}">Click Aquí
                </td>
              </tr>
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
