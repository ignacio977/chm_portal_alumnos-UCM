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

    <div class="row">
      <div class="col s12"> 
          <h5 class="left-align"><i class="material-icons">person</i><b>&nbspDatos Personales</b></h5>    
          <div class="card horizontal z-depth-1"> {{--Creacion de card superior con datos de usuario--}}
              <div class="col s3 indigo" style="position: relative; top: 0px">
                  <h6 style = "color:white;"><b>Nombre:</b></h6>
                  <h6 style = "color:white;"><b>RUT:</b></h6>
                  <h6 style = "color:white;"><b>Email:</b></h6>
                  <h6 style = "color:white;"><b>Cargo:</b></h6>
                  <h6 style = "color:white;"><b>Teléfono:</b></h6>
                  <h6 style = "color:white;"><b>Celular:</b></h6>
              </div>
              <div class="col s9" style="position: relative; top: 0px"> 
                  <h6>&nbsp{{$professor->nombres}}&nbsp{{$professor->apellidos}}</h6> 
                  <h6>&nbsp{{$professor->rut}}</h6>
                  <h6>&nbsp{{$professor->email}}</h6>
                  <h6>&nbsp{{$professor->cargo}}</h6>
                  <h6>&nbsp{{$professor->telefono}}</h6>
                  <h6>&nbsp{{$professor->celular}}</h6>
              </div>
              <div class="col s2">  
                  <div>    
                      @if (empty(Auth::user()->foto))  
                        <img src="/images/default.png" class="center-align" style="width:85%; position: relative; left: 29px; top: 10px">
                      @else
                        <img src="{{$professor->foto}}" class="center-align" style="width:85%; position: relative; left: 29px; top: 10px">
                      @endif
                  </div>
              </div>
          </div>
          </div>
      </div> 

      <div class="row">
        <div class="col s6">     
          <div class="card-panel z-depth-1"> <!--Rectangulito donde estará el título y el botón desplegable -->
            <h5 class="left-align"><b>Título de Ejemplo</b></h5> 
          </div>
        </div>      
        <div class="col s6">            
            <div class="card-panel z-depth-1"> <!--Rectangulito donde estará el título y el botón desplegable -->
              <h5 class="left-align"><b>&nbspInformación nº2</b></h5>
              <ul class="collapsible"> <!--Collapsible de información-->
                <li>
                  <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                    &nbsp<b><h5 class="title">Reservas Canceladas</h5></b></h6> </div>
                  <div class="collapsible-body">
                    <form>
                      <div class="content table-responsive table-full-width">
                          <table class="table table-hover table-striped">
                              <thread>
                              <th>ID sala</th>
                              <th>Nombre sala</th>
                              <th>Bloque</th>
                              <th>Dia</th>
                              <th>Comentario</th>
                              <th></th>
                              </thread>
                          <tbody>
                          @if( $i != 0)
                          @foreach($reserva as $reser) <!--recorre todos los registros encontrados y los muestra en la vista-->
                          <tr>
                            @if( $reser->id_user == Auth::user()->id)
                              <td>{{$reser->id}}</td>
                              <td>{{$reser->nombre}}</td>
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
                              <td>{{$reser->comentario}}</td>
                            @endif

                            <td> <a  href="{{route('profesor_comentario.destroy', $reser->id)}}" class="waves-effect red darken-1 btn-small"><i class="pe-7s-trash">X</i></a></td>
                          </tr>
                          @endforeach
                          @endif
                          </tbody>
                          </table>
                      </div>
                      <div class="clearfix"></div>
                  </form>
                  </div>
                </li>
              </ul>
  
              <ul class="collapsible"> <!--Collapsible de información-->
                <li>
                  <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                    &nbsp<b>Información Y</b></h6> </div>
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
            </div>
        </div>
    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
