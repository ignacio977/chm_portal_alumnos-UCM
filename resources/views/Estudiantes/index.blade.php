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

        <div class="row">
          <div class="col s4">
            <div class="card-panel z-depth-5"> 
            <div align="center">           
              <img src="/images/smile.png") style="width:40%">
            </div>

              <h4><i class="material-icons">person</i>&nbsp{{$student->nombres}}&nbsp{{$student->apellidos}}
              </h4> 
              
              <div class="divider"></div>
              <div class="section">
                <h5><b>RUT</b></h5>
                <p>{{$student->rut}}</p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5><b>Fecha de Ingreso</b></h5>
                <p>{{date("d-m-Y", strtotime($student->fecha_ingreso))}}</p>
              </div>

             
            </div>
          </div>
          
          <div class="col s8">
            <div class="card-panel z-depth-4">
              <h4>Bienvenido, Estudiante&nbsp<i class="material-icons">insert_emoticon</i></h4> 
            </div>

            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                  &nbsp<b>Información Personal</b></h6> </div>
                <div class="collapsible-body">
                  <span>
                    <div class="section">
                      <h4>Email</h4>
                      <p>{{$student->email}}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h4>Dirección</h4>
                      <p>{{$student->direccion_actual}}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h4>Teléfono</h4>
                      <p>{{$student->telefono}}</p>
                    </div>
                    <div class="divider"></div>
                    <div class="section">
                      <h4>Celular</h4>
                      <p>{{$student->celular}}</p>
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
