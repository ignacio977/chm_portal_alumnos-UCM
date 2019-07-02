
@extends('layout.master')

@section('title')
  <title>Listado Reservas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
@if($cuenta == 0)
  <div class="content center">
    <h4>La Sala No Cuenta Con Reservas</h4>
    </br>
  <a  href="{{route('listado_salas')}}" class="waves-effect waves-light btn-small"><i class="pe-7s-trash">volver</i></a>
  </div>
@else
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Historial De La Sala</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>ID Sala</th>
                                          <th>Nombre Sala</th>
                                          <th>Capacidad</th>
                                          <th>Dia de la Semana</th>
                                          <th>Bloque</th>
                                          <th>Fecha Ingreso</th>
                                          <th>Fecha Salida</th>
                                          </thread>
                                      <tbody>

                                        @foreach($reservas as $reserva) <!--recorre todos los registros encontrados y los muestra en la vista-->
                                        <tr>
                                        <td>{{$reserva->id_sala}}</td>
                                        <td>{{$reserva->nombre}}</td>
                                        <td>{{$reserva->capacidad}}</td>
                                        @if($reserva->dia_semana == 1)
                                        <td>Lunes</td>
                                        @endif
                                        @if($reserva->dia_semana == 2)
                                        <td>Martes</td>
                                        @endif
                                        @if($reserva->dia_semana == 3)
                                        <td>Miercoles</td>
                                        @endif
                                        @if($reserva->dia_semana == 4)
                                        <td>Jueves</td>
                                        @endif
                                        @if($reserva->dia_semana == 5)
                                        <td>Viernes</td>
                                        @endif
                                        <td>{{$reserva->bloque}}</td>
                                        <td>{{$reserva->fecha_ingreso}}</td>
                                        <td>{{$reserva->fecha_salida}}</td>

                                        </tr>
                                        @endforeach
                                      </tbody>
                                      </table>
                                  </div>
                                  <div class="clearfix"></div>
                              </form>
                            </div>
                        </div>
                    </div>
                  </br>
                    <div class="content center">
                      <h5 class="title">Exportar Reporte</h5>
                      </br>
                    <a  href="{{route('secretaria_exportar_historial.exportar_sala', $reserva->id_sala)}}" class="waves-effect waves-light btn"><i class="pe-7s-trash">Exportar</i> <i class="material-icons">assignment</i></a>
                  </div>
                </div>
            </div>
    </div>
@endif
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
