
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
                                <h4 class="title">Mis Reservas</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>ID sala</th>
                                          <th>Bloque</th>
                                          <th>Fecha Inicio</th>
                                          <th>Fecha Salida</th>
                                          </thread>
                                      <tbody>
                                      @foreach($reserva as $reser) <!--recorre todos los registros encontrados y los muestra en la vista-->
                                        @if($reser->id_user == ( Auth::user()->id))
                                          @if( $reser->estado == 1 )
                                            <tr>
                                            <td>{{$reser->id_sala}}</td>
                                            <td>{{$reser->bloque}}</td>
                                            <td>{{$reser->fecha_ingreso}}</td>
                                            <td>{{$reser->fecha_salida}}</td>
                                            </tr>
                                          @endif
                                        @endif
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
            </div>
    </div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
