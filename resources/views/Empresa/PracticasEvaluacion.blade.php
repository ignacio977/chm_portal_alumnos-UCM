{{-- Restriccion de acceso --}}
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
    <h5 class="center-align black-text text-darken-2">Evaluacion de Alumno</h5>
    <form name="Formulario" class="col s12" action={{route('evaluacionempresa')}} method="post" >
      {{csrf_field()}}
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Preguntas</th>
            <th>Muy malo</th>
            <th>Malo</th>
            <th>Regular</th>
            <th>Bueno</th>
            <th>Muy bueno</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Coleccion as $Pregunta )
          <tr>
              <td>{{$Pregunta->ContenidoPregunta}}</td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},1" name="Encuesta[{{$Pregunta->id}}][1]" id="Encuesta[{{$Pregunta->id}}][1]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},2" name="Encuesta[{{$Pregunta->id}}][2]" id="Encuesta[{{$Pregunta->id}}][2]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},3" name="Encuesta[{{$Pregunta->id}}][3]" id="Encuesta[{{$Pregunta->id}}][3]" class="filled-in" type="checkbox" checked="unChecked" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},4" name="Encuesta[{{$Pregunta->id}}][4]" id="Encuesta[{{$Pregunta->id}}][4]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},5" name="Encuesta[{{$Pregunta->id}}][5]" id="Encuesta[{{$Pregunta->id}}][5]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Grado de cumplimiento del alumno de acuerdo con el perfil de ICI siendo:1: Nunca
                2: Muy Pocas Veces
                3: Algunas Veces
                4: Casi Siempre
                5: Siempre
            </th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Coleccion2 as $Pregunta)
          <tr>
              <td>{{$Pregunta->ContenidoPregunta}}</td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},1" name="Encuesta[{{$Pregunta->id}}][1]" id="Encuesta[{{$Pregunta->id}}][1]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},2" name="Encuesta[{{$Pregunta->id}}][2]" id="Encuesta[{{$Pregunta->id}}][2]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},3" name="Encuesta[{{$Pregunta->id}}][3]" id="Encuesta[{{$Pregunta->id}}][3]" class="filled-in" type="checkbox" checked="unChecked" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},4" name="Encuesta[{{$Pregunta->id}}][4]" id="Encuesta[{{$Pregunta->id}}][4]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},5" name="Encuesta[{{$Pregunta->id}}][5]" id="Encuesta[{{$Pregunta->id}}][5]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="input-field col s12">
          <th>Detalle de las principales funciones realizadas por el alumno y apreciación del trabajo realizado</th>
          <textarea name="Comentario" id="Comentario" class="materialize-textarea" maxlength="255" ></textarea>
          <input type="hidden" name="id" value='{{$id}}'  > 
          <input type="hidden" name="practicaid" value='{{$practicaid}}'  >   
        </div>
      </div>
      <div>
        <br>
        <a class="btn waves-effect waves-light" onclick="pregunta()" >Enviar</a>
        <br>
      </div>
    </form>
  </div>
</div>

{{--Alerta de pagina de practicas sin datos--}}
@include('layout.alert')

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script src={{ asset('js/options.js') }}></script>
  <script language="JavaScript"> 
    function pregunta(){ 
        if (confirm('¿Estas seguro de enviar este formulario?')){
          document.Formulario.submit();
        } 
    } 
  </script>
@endsection