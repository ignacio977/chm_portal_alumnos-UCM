{{-- Restriccion de acceso --}}
@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<br>
<div class="container">
  <div class="card-panel center">
    <h5 class="center-align black-text text-darken-2">Evaluacion de Empresas</h5>
    <form name="Formulario" class="col s12" action={{route('EvaluarPracticaEnvio')}} method="post" >
      {{csrf_field()}}
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Preguntas</th>
            <th>Muy en desacuerdo</th>
            <th>En desacuerdo</th>
            <th>Indiferente</th>
            <th>De acuerdo</th>
            <th>Muy de acuerdo</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Entrevista as $Pregunta)
            <tr>
              <td>{{$Pregunta->ContenidoPregunta}}</td>
              <td>
                <label>
                  <input name="Encuesta[{{$Pregunta->id}}][1]" id="Encuesta[{{$Pregunta->id}}][1]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input name="Encuesta[{{$Pregunta->id}}][2]" id="Encuesta[{{$Pregunta->id}}][2]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input name="Encuesta[{{$Pregunta->id}}][3]" id="Encuesta[{{$Pregunta->id}}][3]" class="filled-in" type="checkbox" checked="unChecked" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input name="Encuesta[{{$Pregunta->id}}][4]" id="Encuesta[{{$Pregunta->id}}][4]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input name="Encuesta[{{$Pregunta->id}}][5]" id="Encuesta[{{$Pregunta->id}}][5]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="Comentario" id="Comentario" class="materialize-textarea"></textarea>
          <label for="Comentario">Comentarios finales (No es obligatorio)</label>
        </div>
      </div>
      <div>
        <br>
        <button class="btn waves-effect waves-light" type="submit">Enviar</button>
        <br>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script src={{ asset('js/options.js') }}></script>
@endsection