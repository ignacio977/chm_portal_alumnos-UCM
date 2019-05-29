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
      @if ($student->id == Auth::user()->id) {{-- TODO: Arreglar estética --}} 

        <div class="row"> <!--Seccion izquierda con datos escenciales Nombre y RUT -->
          <div class="col s4">
            <div class="card-panel z-depth-5"> 
            <div align="center">           
              <img src="/images/smile.png") style="width:40%">
            </div> <!--Recoger nombre y RUT de la BD-->
              <h4><i class="material-icons">person</i>&nbsp{{$student->nombres}}&nbsp{{$student->apellidos}}
              </h4>               
              <div class="divider"></div>
              <div class="section">
                <h5><b>RUT</b></h5>
                <p><b><i>&nbsp&nbsp{{$student->rut}}</i></b></p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5><b>Fecha de Ingreso</b></h5>
                <p><b><i>&nbsp&nbsp{{date("d-m-Y", strtotime($student->fecha_ingreso))}}</i></b></p>
              </div>

             
            </div>
          </div>
          
          <div class="col s8">  <!--Seccion mensaje de bienvenida al tipo de usuario-->
            <div class="card-panel z-depth-4">
              <h4>Bienvenido, Estudiante&nbsp<i class="material-icons">insert_emoticon</i></h4> 
            </div>

            <!--Inicio del conjunto de collapsibles de información -->

            <ul class="collapsible"> <!--Collapsible de información principal -->
              <li>
                <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                  &nbsp<b>Información Personal</b></h6> </div>
                <div class="collapsible-body">
                  <span>
                    <div class="section">
                      <h7><b>Email</b></h7>
                      <p><i>&nbsp&nbsp{{$student->email}}</i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Dirección</b></h7>
                      <p><i>&nbsp&nbsp{{$student->direccion_actual}}</i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Teléfono</b></h7>
                      <p><i>&nbsp&nbsp{{$student->telefono}}</i></p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h7><b>Celular</b></h7>
                      <p><i>&nbsp&nbsp{{$student->celular}}</i></p>
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
                  &nbsp<b>Información 3</b></h6> </div>
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
