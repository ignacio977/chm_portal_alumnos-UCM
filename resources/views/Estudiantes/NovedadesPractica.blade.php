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
        <h5 class="center-align black-text text-darken-2">Postulaciones de practicas</h5>
        <br>
        <table class="striped responsive-table">
            <thead class="blue darken-4 white-text">
                <tr>
                    <th>Estado</th>
                    <th>Tiempo transcurrido</th>
                    <th>Practica</th>
                    <th>Anuncio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Notificaciones as $notificacion)
                    <tr class="blue lighten-5">
                        <td> No visto </td>
                        <td> {{\Carbon\Carbon::parse($notificacion->updated_at)->diffForHumans()}} </td>
                        <td> {{$notificacion->practica->empresa->nombres}} </td>
                        <td>
                        <a id="BotonVisto{{$notificacion->id}}" name="BotonVisto" value="{{$notificacion->id}}" class="waves-effect waves-light blue btn modal-trigger" data-target="NotificacionId">
                                <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                        </td>
                    </tr>
                    @if($notificacion->where('estado','Aceptada')->first())
                    <!--<td> {{ $estado = $notificacion->where('estado','Aceptada')->first()->encurso->first() }} </td>-->
                    @endif
                    @if($notificacion->where('estado','Confirmada')->first())
                    <!--<td> {{ $estado = $notificacion->where('estado','Confirmada')->first()->encurso->first() }} </td>-->
                    @endif
                @endforeach
                @foreach ($Registros as $registro)
                    <tr class="white">
                        <td> Visto </td>
                        <td> {{\Carbon\Carbon::parse($registro->updated_at)->diffForHumans()}} </td>
                        <td> {{$registro->practica->empresa->nombres}} </td>
                        <td>
                            <a id="BotonVisto{{$registro->id}}" name="BotonVisto" value="{{$registro->id}}" class="waves-effect waves-light blue btn modal-trigger" data-target="NotificacionId">
                                <i class="material-icons left">remove_red_eye</i>Ver
                            </a>
                        </td>
                        @if($registro->where('estado','Aceptada')->first())
                        <!--<td> {{ $estado = $registro->where('estado','Aceptada')->first()->encurso->first() }} </td>-->
                        @endif
                        @if($registro->where('estado','Confirmada')->first())
                        <!--<td> {{ $estado = $registro->where('estado','Confirmada')->first()->encurso->first() }} </td>-->
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>    
</div>
<div id="NotificacionId" class="modal">
    <div class="modal-content">
        <h4 id="CTipoRegistro" style="display:inline;">Notificacion: </h4>
        <h4 style="display:inline;"><span class="blue-text" id="CNomPractica">Practica de </span></h4>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Detalles Empresa</span>
                <div class="row">
                    <div class="col s12 m12 x6 xl6">
                        <label class="datoLabel">E-mail: </label>
                        <span class="dato email" id="CMail" >XXX</span>
                    </div>
                    <div class="col s12 m12 x6 xl6">
                        <label class="datoLabel">Direccion: </label>
                        <span class="dato direccion" id="CDireccion">XXX</span>
                    </div>
                    <br>
                    <div class="col s12 m12 x6 xl6">
                        <label class="datoLabel">Telefono: </label>
                        <span class="dato telefono" id="CTelefono">XXX</span>
                    </div>
                    <div class="col s12 m12 x6 xl6">
                        <label class="datoLabel">Celular: </label>
                        <span class="dato celular" id="CCelular">XXX</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Detalles de práctica</span>
                        <div class="collection">
                            <a class="collection-item black-text"><div class="col s5">Días:</div><span id="CDias" >de XXX hasta XXX</span></a>
                            <a class="collection-item black-text"><div class="col s5">Horario:  </div><span id="CHorario" >de XXX hasta XXX</span></a>
                            <a class="collection-item black-text"><div class="col s5">Puesto ofrecido: </div>Puesto ofrecido: <span id="CPuesto" >XXX</span></a>
                            <a class="collection-item black-text"><div class="col s5">Enfoque y conocimientos: </div><span id="CEnfoque" >XXX</span></a>
                            <a class="collection-item black-text"><div class="col s5">Creado: </div><span id="CCreado" >XXX</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div>
            <div class="row">
                <div class="col s12">
                    <div class="card">
                        <div class="card-content"><span class="card-title"></span>
                            <table class="responsive-table">
                                <tbody>
                                    <tr class="blue">
                                        <td>Estado</td>
                                        <td>Ultima actualización</td>
                                        <td>Posultado hace</td>
                                    </tr>
                                    <tr>
                                        <td id="CEstado">XXX</td>
                                        <td id="CActualizado">XXX</td>
                                        <td id="CPostulacion">XXX</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="right btn waves-effect waves-light blue" href="/estudiante/novedadespractica">Volver</a>
        <br><br>
    </div>
</div>

@endsection

@section('scripts')
    <script src={{ asset('js/nav_scripts.js') }}></script>

    <script>
        $(document).ready(function(){
            $('.modal').modal({
                dismissible: false,
                opacity: 0.8
            });
        });
    </script>

    <script type="text/javascript">
        $("a[name='BotonVisto']").click(function() {
            var id = $(this).attr("value");
            var ArrayNotificaciones = {!! $Notificaciones !!};
            var ArrayRegistros = {!! $Registros !!};
            var ArrayCompleto = [];
            ArrayCompleto.push(ArrayNotificaciones,ArrayRegistros);
            ArrayCompleto.forEach(ArregloRegistro => {
                ArregloRegistro.forEach(registro => {
                    if (registro.id == id) {
                        var EmpresaNom = registro.practica.empresa.nombres;
                        var EmpresaMail = registro.practica.empresa.email;
                        var EmpresaDir = registro.practica.empresa.direccion_actual;
                        var EmpresaTel = registro.practica.empresa.telefono;
                        var EmpresaCel = registro.practica.empresa.celular;
                        var PracticaDiaI = registro.practica.DiasDesde;
                        var PracticaDiaF = registro.practica.DiasHasta;
                        var PracticaTextoDias = " ".concat(PracticaDiaI," hasta ", PracticaDiaF);
                        var PracticaHorarioI = registro.practica.HorasDesde;
                        var PracticaHorarioF = registro.practica.HorasHasta;
                        var PracticaTextoHorario = " ".concat(PracticaHorarioI," hasta ", PracticaHorarioF);
                        var PracticaPuesto = registro.practica.PuestoOfrecido;
                        var PracticaEnfoque = registro.practica.Enfoque;
                        var PracticaCreadaDia = registro.practica.created_at;
                        var PostulacionVista = registro.inspeccionado;
                        if(registro.estado=="EnCurso"){
                            var PostulacionEstado = "{!!$estado->estado!!}";
                            var PostulacionActualizado = "{!!$estado->created_at!!}";
                            var PostulacionRealizada = "{!!$estado->updated_at!!}";
                        }
                        else{
                            var PostulacionEstado = registro.estado;
                            var PostulacionActualizado = registro.updated_at;
                            var PostulacionRealizada = registro.created_at;
                        }
                        if(PostulacionEstado=="FinalizadaRespondidaA"){
                            PostulacionEstado = "Finalizada y Respondida por Alumno"
                        }
                        if(PostulacionEstado=="FinalizadaRespondidaE"){
                            PostulacionEstado = "Finalizada y Respondida por Empresa"
                        }
                        document.getElementById('CNomPractica').innerHTML = "Practica de " + EmpresaNom;
                        document.getElementById('CMail').innerHTML = EmpresaMail;
                        document.getElementById('CDireccion').innerHTML = EmpresaDir;
                        document.getElementById('CTelefono').innerHTML = EmpresaTel;
                        document.getElementById('CCelular').innerHTML = EmpresaCel;
                        document.getElementById('CDias').innerHTML = PracticaTextoDias;
                        document.getElementById('CHorario').innerHTML = PracticaTextoHorario;
                        document.getElementById('CPuesto').innerHTML = PracticaPuesto;
                        document.getElementById('CEnfoque').innerHTML = PracticaEnfoque;
                        document.getElementById('CCreado').innerHTML = PracticaCreadaDia;
                        document.getElementById('CEstado').innerHTML = PostulacionEstado;
                        document.getElementById('CActualizado').innerHTML = PostulacionActualizado;
                        document.getElementById('CPostulacion').innerHTML = PostulacionRealizada;
                        


                        if(PostulacionVista <  PostulacionActualizado){
                            var TipoRegistro = "Notificación: ";
                            document.getElementById('CTipoRegistro').innerHTML = TipoRegistro;
                        }
                        else{
                            var TipoRegistro = "Registro: ";
                            document.getElementById('CTipoRegistro').innerHTML = TipoRegistro;
                        }
                    }
                });
            });
            var datos = $(this).serializeArray();
            datos.push({name: 'tag', value: id});
            $.ajax({
                type: "GET",
                url: "/estudiante/vistopractica",
                data: datos
            });
        });
    </script>
@endsection