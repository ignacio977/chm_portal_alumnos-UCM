{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Perfil Estudiante</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')

<div class="row">
    <div class="col s24 m13">
      <div class="card-panel" style="background-color: #253e85;">
        <span class="white-text">Revisa en detalle la oferta de practica, luego de la selección se bloqueará la selección de practicas.
        </span>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="card-panel center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Empresa</th>
              <th>Almuno</th>
              <th>Actividad Principal</th>
              <th>Desde:</th>
              <th>Hasta:</th>
              <th>Puesto Ofrecido</th>
              
            </tr>
          </thead>
          <tbody>
            <thead>
                @foreach ($Practicas as $practica)
                  <tr>
                    <td> {{$practica->EmpresaId}}</td>
                    <td> {{Auth::user()->id}}</td>
                    <td> {{$practica->Actividad1}}</td>
                    <td> {{$practica->HorasDesde}}</td>
                    <td> {{$practica->HorasHasta}}</td>
                    <td> {{$practica->PuestoOfrecido}}</td>
                    <td> <a href="{{route('solicitudpractica',['id' => $practica->id],['idestudiante' => '(Auth::user()->id)' ])}}" class="btn waves-effect waves-light" style="background-color: #253e85;" type="submit" >Postular</a></td>
                   
                @endforeach
            </thead>
          </tbody>
        </table>
        
    </div>
  </div>
</div>
<div class="container">
  <div class="card-panel center">
      
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
