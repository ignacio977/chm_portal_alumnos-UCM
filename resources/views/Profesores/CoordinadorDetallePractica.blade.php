{{-- Restriccion de acceso --}}

@extends('layout.master')

@section('title')
  <title>Detalles</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')

<div class="row">
  <div class="col s24 m13">
    <div class="card-panel" style="background-color: #253e85;">
      <span class="white-text">En esta sección se encuentra el detalle de practica en revision y los postulantes actuales que posee.
      </span>
    </div>
  </div>
</div>

<div class="container">
  <div class="card-content center">
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Empresa</th>
            <th>Actividad Principal</th>
            <th>Actividad Secundaria</th>
            <th>Actividad Terciaria</th>
            <th>Actividad Cuarta</th>
            <th>Desde:</th>
            <th>Hasta:</th>
            <th>Puesto Ofrecido</th>
            <th>Enfoque</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <thead>
              @foreach ($Practicas as $practica)
                  <form name="FormEliminarPractica" action={{route('EliminarPractica')}} method="post">
                    {{csrf_field()}}
                  <td> {{$practica->empresa->nombres}}</td>
                  <td> {{$practica->Actividad1}}</td>
                  <td> {{$practica->Actividad2}}</td>
                  <td> {{$practica->Actividad3}}</td>
                  <td> {{$practica->Actividad4}}</td>
                  <td> {{$practica->HorasDesde}}</td>
                  <td> {{$practica->HorasHasta}}</td>
                  <td> {{$practica->PuestoOfrecido}}</td>
                  <td> {{$practica->Enfoque}}</td>
                  <input type="hidden" name="idpractica" value={{$practica->id}}>
                  <td><a class="btn waves-effect waves-light red darken-2 btn modal-trigger" href="#modal2" >Eliminar</a>
                  </form>
              @endforeach
          </thead>
        </tbody>
      </table>
      <h5 class="left">Postulantes</h5>
      <table class="table-border table-striped responsive-table">
        <thead>
          <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Celular</th>
            <th>Ingreso</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <thead>
              @foreach ($Postulantes as $Postulante)
                  <tr>
                  <td> {{$Postulante->nombres}}</td>
                  <td> {{$Postulante->apellidos}}</td>
                  <td> {{$Postulante->email}}</td>
                  <td> {{$Postulante->direccion_actual}}</td>
                  <td> {{$Postulante->celular}}</td>
                  <td> {{$Postulante->fecha_ingreso}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <input type="hidden" name="idpostulante" value={{$Postulante->id}}>
                  </tr>
              @endforeach
          </thead>
        </tbody>
      </table>
  </div>
</div>


<!-- Modal Structure -->
<div id="modal2" class="modal">
  <div class="modal-content">
    <h4>Cuidado! <i class="medium material-icons" style="vertical-align: bottom; color: #ff8f00;">report_problem</i></h4>
    <p>Esto eliminara de forma permante esta practica y todas sus postulaciones asociadas.</p>
    <p>¿Está seguro que desea continuar?</p>
  </div>
  <div class="modal-footer">
      <a class="modal-close btn waves-effect waves-light red darken-2" onclick="confirmacion()">Eliminar</a>
      <a class="modal-close btn waves-effect waves-light blue darken-4">Cancelar</a>
  </div>
</div>

@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script language="JavaScript"> 
    function confirmacion(){ 
          document.FormEliminarPractica.submit();
    } 
  </script>
@endsection
