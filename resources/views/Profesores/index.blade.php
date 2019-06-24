<!--{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master') -->

@section('title')
  <title>Perfil Profesor</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($professors as $professor) {{-- Obtención de los datos del profesor --}}
    @if ($professor->id == Auth::user()->id)
        <div class="row"> <!--Seccion izquierda con datos escenciales Nombre y RUT -->
          <div class="col s4">
            <div class="card-panel z-depth-5">
            <div align="center">
              @if (empty(Auth::user()->foto))
                <img src="/images/default.png") style="width:40%">
              @else
                <img src="{{$professor->foto}}") style="width:40%">
              @endif
            </div> <!--Recoger nombre y RUT de la BD-->
              <h4><i class="material-icons">person</i>&nbsp{{$professor->nombres}}&nbsp{{$professor->apellidos}}
              </h4>
              <div class="divider"></div>
              <div class="section">
                <h5><b>RUT</b></h5>
                <p><b><i>&nbsp&nbsp{{$professor->rut}}</i></b></p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5><b>Cargo</b></h5>
                <p><b><i>&nbsp&nbsp{{$professor->cargo}}</i></b></p>
              </div>
            </div>
          </div>

          <div class="col s8">  <!--Seccion mensaje de bienvenida al tipo de usuario-->
            <div class="card-panel z-depth-4">
              <h4>Bienvenido, Profesor&nbsp</h4>
            </div>

            <!--Inicio del conjunto de collapsibles de información -->

            <ul class="collapsible"> <!--Collapsible de información principal -->
              <li>
                <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                  &nbsp<b>Información Personal</b></h6> </div>
                <div class="collapsible-body">
                  <span>
                  	<div class="section">
                      <h7><b>Departamento</b></h7>
                      <p><i>&nbsp&nbsp{{$professor->departamento}} </i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Email</b></h7>
                      <p><i>&nbsp&nbsp{{$professor->email}}</i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Dirección</b></h7>
                      <p><i>&nbsp&nbsp{{$professor->direccion_actual}}</i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Teléfono</b></h7>
                      <p><i>&nbsp&nbsp{{$professor->telefono}}</i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Celular</b></h7>
                      <p><i>&nbsp&nbsp{{$professor->celular}} </i></p>
                    </div>
                  </span>
                </div>
              </li>
            </ul>
            <ul class="collapsible"> <!--Collapsible de información extra1-->
              <li>
                <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                  &nbsp<b>Información 2</b></h6> </div>
                <div class="collapsible-body">
                  <span>
                    <div class="section">
                      <h7><b>Ejemplo título</b></h7>
                      <p><i>&nbsp&nbspInformación respectiva al ejemplo.</i></p>
                    </div>
                  </span>
                </div>
              </li>
            </ul>

            <ul class="collapsible"> <!--Collapsible de información extra2-->
              <li>
                <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                  &nbsp<b>Notificaciones</b></h6> </div>
                <div class="collapsible-body">
                  <div class="header">
                      <h5 class="title">Reservas Canceladas</h5>
                  </div>
                  <form>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover table-striped">
                              <thread>
                              <th>ID sala</th>
                              <th>Bloque</th>
                              <th>Comentario</th>
                              <th></th>
                              </thread>
                          <tbody>
                          @foreach($reserva as $reser) <!--recorre todos los registros encontrados y los muestra en la vista-->
                          <tr>
                          @if( $reser->estado == 3 )
                            <td>{{$reser->id_sala}}</td>
                            <td>{{$reser->bloque}}</td>
                            <td>{{$reser->comentario}}</td>
                            <td> <a  href="{{route('profesor_comentario.destroy', $reser->id)}}" class="waves-effect waves-light btn-small"><i class="pe-7s-trash">X</i></a></td>

                            @endif
                          </tr>
                          @endforeach
                          </tbody>
                          </table>

                      </div>
                      <div class="clearfix"></div>
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
