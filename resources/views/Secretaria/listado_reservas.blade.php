
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
                                <h4 class="title">Listado De Reservas</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>ID user</th>
                                          <th>ID sala</th>
                                          <th>Bloque</th>
                                          <th>Fecha Inicio</th>
                                          <th>Fecha Salida</th>
                                          <th>Accion</th>
                                          </thread>
                                      <tbody>
                                      @foreach($reserva as $reser) <!--recorre todos los registros encontrados y los muestra en la vista-->
                                      <tr>
                                      @if( $reser->estado == 1 )
                                        <td>{{$reser->id_user}}</td>
                                        <td>{{$reser->id_sala}}</td>
                                        <td>{{$reser->bloque}}</td>
                                        <td>{{$reser->fecha_ingreso}}</td>
                                        <td>{{$reser->fecha_salida}}</td>
                                        <td> <a  href="{{route('secretaria_listado_reservas.destroy', $reser->id)}}" class="waves-effect waves-light btn-small"><i class="pe-7s-trash">Cancelar</i></a> <a  href="{{route('secretaria_listado_reserva.edit', $reser->id)}}" class="waves-effect waves-light btn-small"><i class="pe-7s-pen">Editar</i> 
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
            </div>
    </div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
