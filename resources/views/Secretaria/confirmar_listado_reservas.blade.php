
@extends('layout.master')

@section('title')
  <title>Listado Reservas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
    <div class="content">
                    <div class="col-md-16">
                        <div class="card-panel center">
                            <div class="header">
                                <h4 class="title">Confirmar Reservas de Salas</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>ID user</th>
                                          <th>ID sala</th>
                                          <th>Bloque</th>
                                          <th>Dia</th>
                                          <th>Fecha Inicio</th>
                                          <th>Fecha Salida</th>
                                          <th>Accion</th>
                                          </thread>
                                      <tbody>
                                      @foreach($reserva as $reser) <!--recorre todos los registros encontrados y los muestra en la vista-->
                                      <tr>
                                      @if( $reser->estado == 0 )
                                          <td>{{$reser->id_user}}</td>
                                          <td>{{$reser->id_sala}}</td>
                                          <td>{{$reser->bloque}}</td>
                                          @if( $reser->dia_semana == 1)
                                          <td>Lunes</td>
                                          @endif
                                          @if( $reser->dia_semana == 2)
                                          <td>Martes</td>
                                          @endif
                                          @if( $reser->dia_semana == 3)
                                          <td>Miercoles</td>
                                          @endif
                                          @if( $reser->dia_semana == 4)
                                          <td>Jueves</td>
                                          @endif
                                          @if( $reser->dia_semana == 5)
                                          <td>Viernes</td>
                                          @endif
                                          <td>{{$reser->fecha_ingreso}}</td>
                                          <td>{{$reser->fecha_salida}}</td>
                                          <td> <a  href="{{route('secretaria_listado_reservas.edit', $reser->id)}}" class="waves-effect waves-light btn-small"><i class="pe-7s-pen">Aceptar</i> </a><a  href="{{route('secretaria_listado_reserva.destroy', $reser->id)}}" class="waves-effect red darken-1 btn-small"><i class="pe-7s-trash">Cancelar</i> <i class="material-icons">close</i>
                                      @endif
                                      </tr>
                                      @endforeach
                                      </tbody>
                                      </table>
                                      {!! $reserva->render()!!}
                                  </div>
                                  <div class="clearfix"></div>
                              </form>
                            </div>
                        </div>
                    </div>

    </div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
