@extends('layout.master')

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
@foreach ($practicas as $practica)
  <div class="container">
    <div class="card-content center ">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Empresa</th>
              <th>Alumno</th>
            </tr>
          </thead>
          <tbody>
            <thead>
              <td> {{$practica->practicaid}}</td>
              <td> {{$practica->alumnoid}}</td>
            </thead>
          </tbody>
        </table>
    </div>
  </div>
@endforeach

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
