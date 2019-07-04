@extends('layout.master')

@section('title')
  <title>Perfil Empresa</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<br>
<div class="container">
  <div class="card-panel center">
    <h5>Retroalimentacion Practica Profesional</h5>
    <br>
    @foreach ($Informacion as $Practicante)
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
    <a class="btn waves-effect waves-light" href="http://localhost:8000/empresa/practicas/mostrar" >Volver</a>
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
