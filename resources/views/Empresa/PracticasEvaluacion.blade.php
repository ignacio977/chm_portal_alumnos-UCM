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
            <th>Almuno</th>
            <th>Practica</th>
            <th>¿Esta a gusto con el desempeño del alumno?</th>
            <th>¿Esta a gusto con el desempeño del alumno?</th>
            <th>¿Esta a gusto con el desempeño del alumno?</th>
            <th>¿Esta a gusto con el desempeño del alumno?</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <thead>
              @foreach ($practica as $practicas)
                  <form name="formulario" action={{route( 'evaluacionempresa' )}} method="post">
                    {{csrf_field()}}
                  <td> {{$practicas->alumnoid}}</td>
                  <td> {{$practicas->practicaid}}</td>
                  <td>
                    <div class="input-field col s6">
                      <select name="pregunta1">
                        <option value="Muy insatisfecho">Muy insatisfecho</option>
                        <option value="Insatisfecho">Insatisfecho</option>
                        <option value="Regular">Regular</option>
                        <option value="Bien">Bien</option>
                        <option value="Distingido">Distingido</option>
                      </select>
                      <label class="black-text text-darken-2"> </label>
                    </div>
                  </td>
                  <td>
                    <div class="input-field col s6">
                      <select name="pregunta2">
                        <option value="Muy insatisfecho">Muy insatisfecho</option>
                        <option value="Insatisfecho">Insatisfecho</option>
                        <option value="Regular">Regular</option>
                        <option value="Bien">Bien</option>
                        <option value="Distingido">Distingido</option>
                      </select>
                      <label class="black-text text-darken-2"> </label>
                    </div>
                  </td>
                  <td>
                    <div class="input-field col s6">
                      <select name="pregunta3">
                        <option value="Muy insatisfecho">Muy insatisfecho</option>
                        <option value="Insatisfecho">Insatisfecho</option>
                        <option value="Regular">Regular</option>
                        <option value="Bien">Bien</option>
                        <option value="Distingido">Distingido</option>
                      </select>
                      <label class="black-text text-darken-2"> </label>
                    </div>
                  </td>
                  <td>
                  <div class="input-field col s6">
                    <select name="pregunta4">
                      <option value="Muy insatisfecho">Muy insatisfecho</option>
                      <option value="Insatisfecho">Insatisfecho</option>
                      <option value="Regular">Regular</option>
                      <option value="Bien">Bien</option>
                      <option value="Distingido">Distingido</option>
                    </select>
                    <label class="black-text text-darken-2"> </label>
                  </div>
                  </td>
                  <input type="hidden" name="id" value={{$practicas->id}}>
                  <input type="hidden" name="idalumno" value={{$practicas->alumnoid}}>
                  <input type="hidden" name="idpractica" value={{$practicas->practicaid}}>
                  <input type="hidden" name="pregunta1" value="hola">
                  <input type="hidden" name="pregunta2" value="hola">
                  <input type="hidden" name="pregunta3" value="hola">
                  <input type="hidden" name="pregunta4" value="hola">
                  <td><button type="submit" class="btn waves-effect waves-light" >Enviar</button>
                    <br><br>

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
