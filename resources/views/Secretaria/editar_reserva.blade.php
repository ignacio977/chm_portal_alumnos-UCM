

@extends('layout.master')

@section('title')
  <title>Reserva De Salas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
  <form method="POST" action="/secretaria_listado_reservas/{{$reserva->id}}/update">
    @csrf
    @if(session('status_reserva'))
        <div class="card-panel green accent-3">
        {{session('status_reserva')}}
        </div>
    @endif
    @if(session('error_reserva'))
        <div class="card-panel deep-orange darken-1">
        {{session('error_reserva')}}
        </div>
    @endif
    <div class="card-panel center">
      <h5 class="center-align black-text text-darken-2">Modificar Reservas</h5>
      <div class="row">
        <div class="input-field col s12">
          <label class="black-text text-darken-2">Id usuario</label>
          <input type="text" name="id_user" class="form-control" value="{{ $reserva->id_user}}" readonly="readonly" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">ID sala</label>
          <input type="text" name="id_sala" value="{{$reserva->id_sala}}" class="form-control" readonly="readonly" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Bloque</label>
          <input type="text" name="bloque" value="{{$reserva->bloque}}" class="form-control" readonly="readonly" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Estado</label>
          <input type="text" name="estado" value="1" class="form-control" readonly="readonly" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input value="basura" id="disabled" type="hidden" class="validate" style="display:none">
          <label for="disabled" class="black-text text-darken-2">Dias De la Reserva </label>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input type="text" id="fecha_inicio" name="fecha_ingreso" value="{{$reserva->fecha_ingreso}}"  class="datepicker"  required>
          <label class="black-text text-darken-2">Desde: </label>
        </div>
        <div class="input-field col s6">
          <input type="text" id="fecha_final" name="fecha_salida"  value="{{$reserva->fecha_salida}}"  class="datepicker"  required>
          <label class="black-text text-darken-2">Hasta: </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          {{-- <input value="" id="disabled" type="hidden" class="validate" style="display:none"> --}}
          <h6 class="center-align black-text text-darken-2"></h6>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input type="hidden" name="estado" class="form-control" value="1" readonly="readonly" required>
        </div>
      </div>
      <a class="waves-effect red darken-1 btn" href="/secretaria_confirmar_listado_reservas" >Cancel</a>
      <button class="btn waves-effect waves-light" type="submit" name="action">Modificar reserva
      <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
@endsection


@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script>
      $(document).ready(function() {
          // obtenemos la fecha actual
          var date = new Date();
          var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
          // inicializamos datapicker para cada input en este caso con la fecha activa a partir del dia de hoy y con el formato de fecha dd/mm/yy
          $("#fecha_inicio").datepicker({
            minDate: new Date(y, m, d),
            disableWeekends: true,
            format: 'yyyy-mm-dd',
            firstDay: 1,
            i18n: {
              months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
              monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
              weekdays: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
              weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
              weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
            }
          });
          $("#fecha_final").datepicker({
            minDate: new Date(y, m, d),
            disableWeekends: true,
            format: 'yyyy-mm-dd',
            firstDay: 1,
            i18n: {
              months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
              monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
              weekdays: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
              weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
              weekdaysAbbrev: ['D', 'L', 'M', 'M', 'J', 'V', 'S']
            }
          });
       });
  </script>
@endsection
