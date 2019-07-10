{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Coordinador de practicas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div>
  <div class="row">
    <div class="col s12 m8">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Bienvenido {{Auth::user()->nombres}} aqui se muestran las practicas que actualmente se encuentran en curso.
        </span>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="card-content  center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Alumno</th>
              <th>Empresa</th>
              <th>Actividad</th>
              <th>Fecha Inicio</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($Coleccion as $practica)
                  <tr>
                    <td> {{$practica->alumno->nombres}}</td>
                    <td> {{$practica->practica->empresa->nombres}}</td>
                    <td> {{$practica->practica->PuestoOfrecido}}</td>
                    <td> {{\Carbon\Carbon::parse($practica->created_at)->diffForHumans()}} </td>
                    <td>
                      <a href="#modalpractica{{$practica->id}}" class="btn waves-effect waves-light modal-trigger" style="background-color: #253e85;">Detalles</a>
                    </td>
                  <div id="modalpractica{{$practica->id}}" class="modal">
                      <div class="modal-content">
                        <div class="">
                          <div class="row blue darken-2 z-depth-1" style="text-align: left">
                              <div class="col s3">
                                  <b>Nombre</b>
                              </div>
                              <div class="col s3">
                                  <b>Apellidos</b>
                              </div>
                              <div class="col s3">
                                  <b>Email</b>
                              </div>
                              <div class="col s3">
                                  <b>Celular</b>
                              </div>
                          </div>
                          <div class="row grey lighten-2 z-depth-1" style="text-align: left">
                              <div class="col s3">
                                  <h6>{{$practica->alumno->nombres}}</h6>
                              </div>
                              <div class="col s3">
                                  <h6>{{$practica->alumno->apellidos}}</h6>
                              </div>
                              <div class="col s3">
                                  <h6>{{$practica->alumno->email}}</h6>
                              </div>
                              <div class="col s3">
                                  <h6>{{$practica->alumno->celular}}</h6>
                              </div>
                          </div>
                          <div class="row  blue darken-2 z-depth-1" style="text-align: left">
                              <div class="col s3">
                                  <b>Empresa</b>
                              </div>
                              <div class="col s3">
                                  <b>Telefono</b>
                              </div>
                              <div class="col s3">
                                  <b>Email</b>
                              </div>
                              <div class="col s3">
                                  <b>Dirección</b>
                              </div>
                          </div>
                          <div class="row grey lighten-2 z-depth-1" style="text-align: left" >
                              <div class="col s3">
                                  <h6>{{$practica->practica->empresa->nombres}}</h6>
                              </div>
                              <div class="col s3">
                                  <h6>{{$practica->practica->empresa->telefono}}</h6>
                              </div>
                              <div class="col s3">
                                  <h6>{{$practica->practica->empresa->email}}</h6>
                              </div>
                              <div class="col s3">
                                  <h6>{{$practica->practica->empresa->direccion_actual}}</h6>
                              </div>
                          </div>
                            <form id="form-{{$practica->id}}" action="/profesor/coordinador/notas" method="POST">
                                {{ csrf_field() }}
                              <div class="container">
                                <div class="row">
                                    <div class="col input-field s4">
                                        <input name="nota1" id="nota1-{{$practica->id}}" type="number" value="{{$practica->nota1}}" max = "7" min="1" step="0.1">
                                        <label for="nota1-{{$practica->id}}">Nota 1</label>
                                    </div>
                                    <div class="col input-field s4">
                                        <input name="nota2" id="nota2-{{$practica->id}}" type="text" value="{{$practica->nota2}}" max = "7" min="1" step="0.1">
                                        <label for="nota2-{{$practica->id}}">Nota 2</label>
                                    </div>
                                    <div class="col input-field s4">
                                        <input name="nota3" id="nota3-{{$practica->id}}" type="text" value="{{$practica->nota3}}" max = "7" min="1" step="0.1">
                                        <label for="nota3-{{$practica->id}}">Nota 3</label>
                                    </div>
                                </div>
                              </div>
                                  <p>
                                    <label>
                                      <input name="finalizar" type="checkbox" class="filled-in"/>
                                      <span>Finalizar practica</span>
                                    </label>
                                  </p>
                              <input type="hidden" name="id" value="{{$practica->id}}">
                            </form>
                        </div>
                          
                      </div>
                      <div class="modal-footer">
                          <a class="modal-close btn waves-effect waves-light blue darken-2" onclick="enviar('form-{{$practica->id}}')">Guardar</a>
                          <a class="modal-close btn waves-effect waves-light red darken-4">Cancelar</a>
                      </div>
                  </div>
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
</div>

{{--Alerta de pagina de practicas sin datos--}}
@include('layout.alert')

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  @if(empty($Coleccion->total()))
    <script type="text/javascript" Cabecera="¡¡Error!!" TextoBajada="No hay practicas por el momento, intenta más tarde" Redirec="/estudiante" src={{ asset('js/alert.js') }}></script>
  @endif
  <script language="JavaScript"> 
      function enviar(name){ 
          document.getElementById(name).submit(); 
      } 
    </script>
@endsection