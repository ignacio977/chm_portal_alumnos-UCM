
@extends('layout.master')

@section('title')
  <title>Listado Reservas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
    <div class="container">
                    <div class="col-md-16">
                        <div class="card-panel center">
                            <div class="header">
                                <h4 class="title">Mis Reservas</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>Nombre Sala</th>
                                          <th>Bloque</th>
                                          <th>Fecha Inicio</th>
                                          <th>Fecha Salida</th>
                                          </thread>
                                      <tbody>
                                      @foreach($reserva as $reser) <!--recorre todos los registros encontrados y los muestra en la vista-->
                                        @if($reser->id_user == ( Auth::user()->id))
                                          @if( $reser->estado == 1 )
                                            <tr>
                                            <td>{{$reser->nombre}}</td>
                                            <td>{{$reser->bloque}}</td>
                                            <td>{{$reser->fecha_ingreso}}</td>
                                            <td>{{$reser->fecha_salida}}</td>
                                            </tr>
                                          @endif
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
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
