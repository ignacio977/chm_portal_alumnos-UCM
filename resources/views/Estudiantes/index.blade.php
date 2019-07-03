{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection


@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($students as $student) {{-- Obtención de los datos del estudiante --}}
      @if ($student->id == Auth::user()->id)

      <div class="row">
        <div class="col s12"> 
            <h5 class="left-align"><i class="material-icons">person</i><b>&nbspDatos Personales</b></h5>    
            <div class="card horizontal z-depth-1"> {{--Creacion de card superior con datos de usuario--}}
                <div class="col s3 indigo" style="position: relative; top: 0px">
                    <h6 style = "color:white;"><b>Nombre:</b></h6>
                    <h6 style = "color:white;"><b>RUT:</b></h6>
                    <h6 style = "color:white;"><b>Email:</b></h6>
                    <h6 style = "color:white;"><b>Año de Ingreso:</b></h6>
                    <h6 style = "color:white;"><b>Teléfono:</b></h6>
                    <h6 style = "color:white;"><b>Celular:</b></h6>
                </div>
                <div class="col s9" style="position: relative; top: 0px"> 
                    <h6>&nbsp{{$student->nombres}}&nbsp{{$student->apellidos}}</h6> 
                    <h6>&nbsp{{$student->rut}}</h6>
                    <h6>&nbsp{{$student->email}}</h6>
                    <h6>&nbsp{{date("d-m-Y", strtotime($student->fecha_ingreso))}}</h6>
                    <h6>&nbsp{{$student->telefono}}</h6>
                    <h6>&nbsp{{$student->celular}}</h6>
                </div>
                <div class="col s2">  
                    <div>    
                        @if (empty(Auth::user()->foto))  
                          <img src="/images/default.png" class="center-align" style="width:85%; position: relative; left: 29px; top: 10px">
                        @else
                          <img src="{{$student->foto}}" class="center-align" style="width:85%; position: relative; left: 29px; top: 10px">
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>      

        <div class="row">
          <div class="col s6">     
            <div class="card-panel z-depth-1"> <!--Rectangulito donde estará el título y el botón desplegable -->
              <h5 class="left-align"><b>Mis Notas - Semestre I - 2019</b></h5> 
              <table class="highlight">
                <thead>
                  <tr>
                      <th>Ramo</th>
                      <th>Nota 1</th>
                      <th>Nota 2</th>
                      <th>Nota 3</th>
                      <th>Nota 4</th>
                  </tr>
                </thead>
        
                <tbody>
                  <tr>
                    <td>Ingeniería de Software</td>
                    <td>57</td>
                    <td>42</td>
                    <td>50</td>
                    <td>48</td>
                  </tr>
                  <tr>
                    <td>Modelamiento de Datos</td>
                    <td>25</td>
                    <td>55</td>
                    <td>48</td>
                    <td>45</td>
                  </tr>
                  <tr>
                    <td>Introducción a la Fe</td>
                    <td>65</td>
                    <td>68</td>
                    <td>50</td>
                    <td>55</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>      
          
          <div class="col s6">            
              <div class="card-panel z-depth-1"> <!--Rectangulito donde estará el título y el botón desplegable -->
                <h5 class="left-align"><b>&nbspInformación nº2</b></h5>
                <ul class="collapsible"> <!--Collapsible de información-->
                  <li>
                    <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                      &nbsp<b>Información X</b></h6> </div>
                    <div class="collapsible-body">
                      <span>
                        <div class="section">
                          1
                        </div> 
                      </span>
                    </div>
                    <div class="collapsible-body">
                      <span>
                          <div class="section">
                            2
                          </div> 
                        </span>
                    </div>
                    <div class="collapsible-body">
                      <span>
                        3
                      </span>
                    </div>
                    <div class="collapsible-body">
                      <span>
                        <div class="section">
                          4
                        </div> 
                      </span>
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
      </div>      
      @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
