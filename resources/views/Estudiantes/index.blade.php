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

              <h4><i class="material-icons">person</i>&nbsp{{$student->nombres}}<br>&nbsp&nbsp&nbsp&nbsp{{$student->apellidos}}
              </h4> 
              
              <div class="divider"></div>
              <div class="section">
                <h5>Fecha de Ingreso</h5>
                <p>{{date("d-m-Y", strtotime($student->fecha_ingreso))}}</p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5>Section 2</h5>
                <p>Stuff</p>
              </div>
             
            </div>
          </div>
          
          <div class="col s8">
            <div class="card-panel z-depth-5">
              <h4><i class="material-icons">chrome_reader_mode</i>&nbspInformación Personal</h4> 

              <div class="divider"></div>
              <div class="section">
                <h5>Email</h5>
                <p>{{$student->email}}</p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5>Dirección</h5>
                <p>{{$student->direccion_actual}}</p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5>Teléfono</h5>
                <p>{{$student->telefono}}</p>
              </div>
              <div class="divider"></div>
              <div class="section">
                <h5>Celular</h5>
                <p>{{$student->celular}}</p>
              </div>

              
            </div>

            <ul class="collapsible">
              <li>
                <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
                <div class="collapsible-body">
                  <span>

                  </span>
                </div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
              </li>
              <li>
                <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
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
