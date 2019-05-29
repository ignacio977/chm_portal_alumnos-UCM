{{-- Restriccion de acceso - Leer comentario en layout.redirect--}}
@include('layout.redirect')

@extends('layout.master')

@section('title')
  <title>Perfil DIRECTOR DE CARRERA</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
  @foreach ($directors as $director) {{-- Obtención de los datos del Director de Carrera --}}
    @if ($director->id == Auth::user()->id) 
      <div class="row">
        <div class="col s4">     
            <div class="card-panel z-depth-5"> <!--Rectangulito donde estará el título y el botón desplegable -->
              <?php $direccion_imagen = Auth::user()->foto ?>
              <div align="center">    
                @if (empty(Auth::user()->foto))  
                  <img src="/images/smile.png") style="width:40%">
                @else
                  <img src="{{$director->foto}}") style="width:40%">
                @endif
              </div>
              <h4><i class="material-icons">person</i>&nbsp{{$director->nombres}}&nbsp{{$director->apellidos}}</h4> 
              
              <div class="divider"></div>
              <div class="section">
                <h5>RUT</h5> 
                <p>{{$director->rut}}</p>
              </div>
            </div>
        </div>      
        <div class="col s8">            
            <div class="card-panel z-depth-5"> <!--Rectangulito donde estará el título y el botón desplegable -->
              <h4>Bienvenido Director de Carrera</h4>  
            </div>
            <ul class="collapsible"> <!--Collapsible de información-->
            <li>
              <div class="collapsible-header"><i class="material-icons">chrome_reader_mode</i>
                &nbsp<b>Información Personal</b></h6> </div>
              <div class="collapsible-body">
                <span>
                  <div class="section">
                    <h7><b>Email</b></h7>
                    <p><i>&nbsp&nbsp{{$director->email}}</i></p>
                  </div> 
                </span>
              </div>
              <div class="collapsible-body">
                <span>
                    <div class="section">
                      <h7><b>Dirección</b></h7>
                      <p><i>&nbsp&nbsp{{$director->direccion_actual}}</i></p>
                    </div> 
                  </span>
              </div>
              <div class="collapsible-body">
                <span>
                  <div class="section">
                    <h7><b>Teléfono</b></h7>
                    <p><i>&nbsp&nbsp{{$director->telefono}}</i></p>
                  </div> 
                </span>
              </div>
              <div class="collapsible-body">
                <span>
                  <div class="section">
                    <h7><b>Celular</b></h7>
                    <p><i>&nbsp&nbsp{{$director->celular}}</i></p>
                  </div> 
                </span>
              </div>
            </li>
          </ul>

          <ul class="collapsible"> <!--Collapsible de información-->
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
        </div>      
      </div>

    @endif
  @endforeach
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
