{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Perfil Coordinador de Practica</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="row">
    <div class="col s12 m8">
        <div class="card-panel" style="background-color: #253e85;">
            <span class="white-text">Bienvenido {{Auth::user()->nombres}}
            </span>
        </div>
    </div>
</div>
<div class="container">
    <div class="card-panel center">
        <table class="striped responsive-table">
            <thead>
                <tr>
                    <th>Fecha de postulación</th>
                    <th>Nombre empresa</th>
                    <th>Nombre practicante</th>
                    <th>Ver practica</th>
                </tr>
            </thead>
            <tbody>
                <thead>
                    @foreach ($Coleccion as $practica)
                        <tr>
                            <td>{{\Carbon\Carbon::parse($practica->updated_at)->diffForHumans()}}</td>
                            <td>{{$practica->practica->empresa->nombres}}</td>
                            <td>{{$practica->alumno->nombres}}</td>
                            <td>
                            <a id="BotonVisto{{$practica->id}}" name="BotonVisto" value="{{$practica->id}}" class="waves-effect waves-light blue btn modal-trigger" data-target="NotificacionId">
                                <i class="material-icons left">remove_red_eye</i>Ver
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($Coleccionjava as $item)
                        <!--<tr>-->
                            <!--<td>{{\Carbon\Carbon::parse($item->updated_at)->diffForHumans()}}</td>-->
                            <!--<td>{{$item->practica->empresa->nombres}}</td>-->
                            <!--<td>{{$item->alumno->nombres}}</td>-->
                        <!--</tr>-->
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


<div id="NotificacionId" class="modal">
    <div class="modal-content">
        <h4 id="CTipoRegistro" style="display:inline;">Detalles: </h4>
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
                        <span class="card-title">Detalles de alumno</span>
                        <div class="collection">
                            <a class="collection-item black-text">Rut:     <span id="CRutAlum" >X.XXX.XXX-X</span></a>
                            <a class="collection-item black-text">Nombre:     <span id="CNomAlum" >XXX</span></a>
                            <a class="collection-item black-text">Apellido:  <span id="CApeAlum" >XXX</span></a>
                            <a class="collection-item black-text">Mail: <span id="CMailAlum" >XXX</span></a>
                            <a class="collection-item black-text">Dirección: <span id="CDirAlum" >XXX</span></a>
                            <a class="collection-item black-text">Telefono: <span id="CTelAlum" >XXX</span></a>
                            <a class="collection-item black-text">Celular: <span id="CCelAlum" >XXX</span></a>
                            <a class="collection-item black-text">Fecha de ingreso: <span id="CFechIngAlum" >XXX</span></a>
                        </div>
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
                            <a class="collection-item black-text">Días:     <span id="CDias" >de XXX hasta XXX</span></a>
                            <a class="collection-item black-text">Horario:  <span id="CHorario" >de XXX hasta XXX</span></a>
                            <a class="collection-item black-text">Puesto ofrecido: <span id="CPuesto" >XXX</span></a>
                            <a class="collection-item black-text">Enfoque y conocimientos: <span id="CEnfoque" >XXX</span></a>
                            <a class="collection-item black-text">Creado: <span id="CCreado" >XXX</span></a>
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
        <a class="modal-close right btn waves-effect waves-light blue" href="#!">Volver</a>
        <br><br>
    </div>
</div>


{{--Alerta de pagina de practicas sin datos--}}
@include('layout.alert')

@endsection

@section('scripts')
    <script src={{ asset('js/nav_scripts.js') }}></script>

    <script type="text/javascript">
        $("a[name='BotonVisto']").click(function() {
            var id = $(this).attr("value");
            var  ArrayValores = {!! $Coleccionjava !!} ;
            console.log(ArrayValores);
            ArrayValores.forEach(registro => {
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
                    var PostulacionEstado = registro.estado;
                    var PostulacionActualizado = registro.updated_at;
                    var PostulacionRealizada = registro.created_at;
                    var PostulacionVista = registro.inspeccionado;
                    var AlumnoRut = registro.alumno.rut;
                    var AlumnoNombre = registro.alumno.nombres;
                    var AlumnoApellido = registro.alumno.apellidos;
                    var AlumnoMail = registro.alumno.email;
                    var AlumnoDireccion = registro.alumno.direccion_actual;
                    var AlumnoTelefono = registro.alumno.telefono;
                    var AlumnoCelular = registro.alumno.celular;
                    var AlumnoFechaIngreso = registro.alumno.fecha_ingreso;
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
                    document.getElementById('CRutAlum').innerHTML = AlumnoRut;
                    document.getElementById('CNomAlum').innerHTML = AlumnoNombre;
                    document.getElementById('CApeAlum').innerHTML = AlumnoApellido;
                    document.getElementById('CMailAlum').innerHTML = AlumnoMail;
                    document.getElementById('CDirAlum').innerHTML = AlumnoDireccion;
                    document.getElementById('CTelAlum').innerHTML = AlumnoTelefono;
                    document.getElementById('CCelAlum').innerHTML = AlumnoCelular;
                    document.getElementById('CFechIngAlum').innerHTML = AlumnoFechaIngreso;
                }
            });
        });
    </script>

    @if(empty($Coleccion->total()))
        <script type="text/javascript" Cabecera=" Error " TextoBajada="No existen practicas que se estén realizando por el momento."
        Redirec="/profesor/coordinador" src={{ asset('js/alert.js') }}></script>
    @endif
@endsection
