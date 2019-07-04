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
    <form name="Formulario" class="col s12" action="#" method="post" >
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
          @foreach ($Coleccion as $Pregunta)
            <tr>
              <td>{{$Pregunta->ContenidoPregunta}}</td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},11" name="Encuesta[{{$Pregunta->id}}][11]" id="Encuesta[{{$Pregunta->id}}][11]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},12" name="Encuesta[{{$Pregunta->id}}][12]" id="Encuesta[{{$Pregunta->id}}][12]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},13" name="Encuesta[{{$Pregunta->id}}][13]" id="Encuesta[{{$Pregunta->id}}][13]" class="filled-in" type="checkbox" checked="unChecked" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},14" name="Encuesta[{{$Pregunta->id}}][14]" id="Encuesta[{{$Pregunta->id}}][14]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},15" name="Encuesta[{{$Pregunta->id}}][15]" id="Encuesta[{{$Pregunta->id}}][15]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},16" name="Encuesta[{{$Pregunta->id}}][16]" id="Encuesta[{{$Pregunta->id}}][16]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},17" name="Encuesta[{{$Pregunta->id}}][17]" id="Encuesta[{{$Pregunta->id}}][17]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},18" name="Encuesta[{{$Pregunta->id}}][18]" id="Encuesta[{{$Pregunta->id}}][18]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},19" name="Encuesta[{{$Pregunta->id}}][19]" id="Encuesta[{{$Pregunta->id}}][19]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
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
            <th>Indique grado de cumplimiento de las competencias de egreso de ICI siendo 1: Nunca 2: Muy Pocas Veces 3: Algunas Veces 4: Casi Siempre 5: Siempre</th>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
            <th>5</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($Coleccion as $Pregunta)
            <tr>
              <td>{{$Pregunta->ContenidoPregunta}}</td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},20" name="Encuesta[{{$Pregunta->id}}][20]" id="Encuesta[{{$Pregunta->id}}][20]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},21" name="Encuesta[{{$Pregunta->id}}][21]" id="Encuesta[{{$Pregunta->id}}][21]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},22" name="Encuesta[{{$Pregunta->id}}][22]" id="Encuesta[{{$Pregunta->id}}][22]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},23" name="Encuesta[{{$Pregunta->id}}][23]" id="Encuesta[{{$Pregunta->id}}][23]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
              <td>
                <label>
                  <input value="{{$Pregunta->id}},24" name="Encuesta[{{$Pregunta->id}}][24]" id="Encuesta[{{$Pregunta->id}}][24]" class="filled-in" type="checkbox" onclick="OnChangeCheckbox(this.id)"/>
                  <span></span>
                </label>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="row">
        <div class="input-field col s12">
          <textarea name="Comentario" id="Comentario" class="materialize-textarea" maxlength="255"></textarea>
          <label for="Comentario">Comentarios finales (No es obligatorio, Máximo 255 caracteres)</label>
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