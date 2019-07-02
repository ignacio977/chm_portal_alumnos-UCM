
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
                                <h4 class="title">Listado De Salas</h4>
                            </div>
                            <div class="content">
                              <form>
                                  <div class="content table-responsive table-full-width">
                                      <table class="table table-hover table-striped">
                                          <thread>
                                          <th>ID</th>
                                          <th>Nombre Sala</th>
                                          <th>Capacidad</th>
                                          <th>Accion</th>
                                          </thread>
                                      <tbody>
                                      @foreach($salas as $sala) <!--recorre todos los registros encontrados y los muestra en la vista-->
                                      <tr>
                                      <td>{{$sala->id}}</td>
                                      <td>{{$sala->nombre}}</td>
                                      <td>{{$sala->capacidad}}</td>

                                      <td><a href="{{route('secretaria_listado_salas.destroy', $sala->id)}}" class="waves-effect red darken-1 btn"><i>Cancelar</i> <i class="material-icons">close</i></a><a href="{{route('secretaria_historial_sala.historial_sala', $sala->id)}}" class="waves-effect waves-light btn"><i class="pe-7s-trash"><i>Historial</i> </i><i class="material-icons">assignment</i></a></td>


                                      </tr>
                                      @endforeach
                                      </tbody>
                                      </table>
                                      {!! $salas->render()!!}
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
