{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div>
  <div class="row">
    <div class="col s12 m8">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Bienvenido {{Auth::user()->nombres}}.
        </span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card-content  center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Almuno de practica</th>
              <th>Puesto Ofrecido</th>
              <th>Enfoque</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($practica as $practicas)
                <tr>
                    <td> {{$practicas->alumnoid}}</td>
                    <td> {{$practicas->PuestoOfrecido}}</td>
                    <td> {{$practicas->Enfoque}}</td>
                    <td>
                      <a href="{{route('practicasevaluacion',['id' => $practicas->postulacionid, 'practicaid' => $practicas->practicaid] )}}"
                       class="btn waves-effect waves-light" style="background-color: #253e85;">Evaluar</a>
                    </td>
                @endforeach
            </thead>
          </tbody>
        </table>
      </div>
    </div>
</div>

{{--Alerta de pagina de practicas sin datos--}}
@include('layout.alert')

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
