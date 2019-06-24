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
        <h5 class="center-align black-text text-darken-2">Notificaciones</h5>
        <table class="striped responsive-table">
            <thead class="blue darken-4 white-text">
                <tr>
                    <th>Tiempo transcurrido</th>
                    <th>Practica</th>
                    <th>Ver Anuncio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Notificaciones as $notificacion)
                    <tr>
                        <td> {{\Carbon\Carbon::parse($notificacion->updated_at)->diffForHumans()}} </td>
                        <td> {{$notificacion->practica->empresa->nombres}} </td>
                        <td>
                            <a id="" class="waves-effect waves-light blue btn" href="#" role="button">
                                <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                        </td>
                        
                    {{-- <input type="hidden" name="idalumno" value={{Auth::user()->id}}> 
                    <input type="hidden" name="idpractica" value={{$practica->id}}> --}}
                    </tr>
                @endforeach
                {{-- <tr>
                    <td>01/02/03</td>
                    <td>aprobacion practica</td>
                    <td><a name="" id="" class="btn btn-primary" href="#" role="button">Ver</a></td>
                </tr>
                <tr>
                    <td>01/02/03</td>
                    <td>aprobacion practica</td>
                    <td><a name="" id="" class="btn btn-primary" href="#" role="button">Ver</a></td>
                </tr>
                <tr>
                    <td>01/02/03</td>
                    <td>aprobacion practica</td>
                    <td><a name="" id="" class="btn btn-primary" href="#" role="button">Ver</a></td>
                </tr> --}}
            </tbody>
        </table>
    </div>    
</div>

{{-- <div id="encuestaModalFiltro" class="modal modal-fixed-footer open" tabindex="0" style="z-index: 1003; display: block; opacity: 1; top: 2%; transform: scaleX(1) scaleY(1);">
    <div class="modal-content">
        <h4>Evaluación del curso: <span class="curso_encuesta">ICI513-1</span></h4>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Datos</span>
                <div class="row">
                    <div class="col s12 m12 x6 xl6">
                        <label class="datoLabel">Curso</label>
                        <span class="dato curso_encuesta">ICI513-1</span>
                    </div>
                    <div class="col s12 m12 x6 xl6">
                        <label class="datoLabel">Tipo</label>
                        <span class="dato tipo_encuesta">CÁTEDRA</span>
                    </div>
                    <input type="hidden" id="curso" value="98778">
                    <input type="hidden" id="tipo" value="1">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card" style="border-top: 2px solid #dcdcdc;">
                    <div class="card-content" style="margin-top:5px;">
                        <span class="card-title">Indicaciones para la Evaluación</span>
                        <div class="collection">
                            <a class="collection-item black-text">La evaluación es SECRETA.</a>
                            <a class="collection-item black-text">Seleccione el curso cuya evaluación aún esté en estado PENDIENTE.</a>
                            <a class="collection-item black-text">Conteste TODAS las preguntas a conciencia.</a>
                            <a class="collection-item black-text">Utilice la escala de respuestas con el valor más cercano a su percepción.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div id="contenido_encuesta_filtro"> <div class="row" style="margin-top:5px;">
<div class="col s12">
<div class="card"><div class="card-content"><span class="card-title" style="margin-top:25px"></span><table style="width:100%;"><tbody><tr class="cabecera_enc"><td style="width:45%;color:white;font-size:12pt;font-weight:bold;">Curso</td><td style="width:45%;color:white;font-size:12pt;font-weight:bold;">Nombre Profesor</td><td style="width:10%;color:white;font-size:12pt;font-weight:bold;">Estado Encuesta</td></tr><tr class="sobreColor " style="cursor: pointer;" id="a_1" onclick="abrirModal(13950425,1,98778,1);"><td style="width:45%;">AUDITORÍA Y SEGURIDAD DE SISTEMAS</td><td style="width:45%;" id="b_1">MATAMALA GÓMEZ  CRISTIAN ANDRÉS</td><td style="width:10%;text-align:center; background-color:#00A700;color:white;" id="c_1">CONTESTADA</td></tr></tbody></table></div></div></div>
</div>
<script>
    $('select').formSelect();
    $('textarea#porque').characterCounter();
</script></div>
    </div>
    <div class="modal-footer">
        <a class="modal-action modal-close waves-effect waves-red btn-flat left"><i class="material-icons left">arrow_back</i> Volver</a>
        <a id="enviarButton2" onclick="modalVolverEnviar()" class="waves-effect btn-flat waves-blue"><i class="material-icons left">send</i> Enviar encuestas</a>
    </div>
</div> --}}

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection