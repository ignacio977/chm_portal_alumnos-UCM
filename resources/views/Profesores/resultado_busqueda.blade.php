
@extends('layout.master')

@section('title')
  <title>Listado Reservas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
    <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Resultado de la Busquedas</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>Nombre Sala</th>
                                          <th>Capacidad</th>
                                          <th>Accion</th>
                                          </thread>
                                      <tbody>
                                        <!--  -->
                                        @foreach($salas as $sala) <!-- recorremos las salas -->
                                          <?php $variable = 0 ?> <!-- variable si encuentra coicidencia en los bloques requeridos -->
                                          @foreach($reservas as $reserva) <!-- recorremos las reservas -->

                                          @if($sala->id == $reserva->id_sala) <!-- revisa las salas que tienen reservas -->
                                            @foreach($bloques as $bloque)   <!--  recorre los bloques solicitados-->
                                              @if($reserva->bloque == $bloque) <!-- revisa si choca algun bloque -->
                                              <?php $variable++ ?>      <!--  suma 1 a la variable si choca-->
                                              @endif

                                            @endforeach

                                          @endif

                                          @endforeach
                                          @if($variable == 0)    <!--  si no existe ni un choque en los bloques imprime la sala-->
                                          <tr>
                                          <td>{{$sala->nombre}}</td>
                                          <td>{{$sala->capacidad}}</td>
                                          <td><a href="{{ route('Profesores.show2',[$sala->id, $fi, $ff, $sala->nombre, $sala->capacidad,$dia_semana]) }}" class="btn btn-primary">Reservar <i class="material-icons right">send</i></a>
                                          </tr>
                                          @endif
                                        @endforeach

                                      </tbody>
                                      </table>
                                  </div>
                                  <div class="clearfix"></div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
