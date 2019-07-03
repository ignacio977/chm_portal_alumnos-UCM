{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Coordinador de practicas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div>
  <div class="row">
    <div class="col s12 m8">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Bienvenido {{Auth::user()->nombres}} aqui se muestran las practicas que fueron ya terminadas y evaluadas.
        </span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card-content  center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Almuno</th>
              <th>Practica</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($practicas as $practica)
                  <tr>
                    <td> {{$practica->alumnoid}}</td>
                    <td> {{$practica->practicaid}}</td>
                    <td>
                      <a href="{{route('PracticasConcluidasDetalle',['alumnoid' => $practica->alumnoid ,'practicaid' => $practica->practicaid])}}" class="btn waves-effect waves-light" style="background-color: #253e85;">Detalles</a>
                    </td>
                @endforeach
            </thead>
          </tbody>
        </table>
        <div class="container">
          <div class="centered">
          @include('layout.pagination')
          </div>
        </div>
    </div>
  </div>
</div>

{{--Alerta de pagina de practicas sin datos--}}
@include('layout.alert')

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
