

@extends('layout.master')

@section('title')
  <title>Reserva De Salas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
  <form method="POST" action="/agregar_reserva_profesores">
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
      <h5 class="center-align black-text text-darken-2">Formulario De Reservas</h5>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Nombre de la sala</label>
          <input type="text" name="nombre_sala" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label class="black-text text-darken-2">Id usuario</label>
          <input type="text" name="id_user" class="form-control" value="{{ Auth::user()->id}}" readonly="readonly" required>
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
          <input type="text" id="fecha_inicio" name="fecha_ingreso" class="datepicker" required>
          <label class="black-text text-darken-2">Desde: </label>
        </div>
        <div class="input-field col s6">
          <input type="text" id="fecha_final" name="fecha_salida"  class="datepicker" required>
          <label class="black-text text-darken-2">Hasta: </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          {{-- <input value="" id="disabled" type="hidden" class="validate" style="display:none"> --}}
          <h6 class="center-align black-text text-darken-2">Formulario De Reservas</h6>
        </div>
      </div>
      <div class="row">
        <div class="form-group">
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_1" value="1"/>
            <span>Bloque 1</span>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_2" value="2"/>
            <span>Bloque 2</span>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_3" value="3"/>
            <span>Bloque 3</span><br>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_4" value="4"/>
            <span>Bloque 4</span>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_5" value="5"/>
            <span>Bloque 5</span>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_6" value="6"/>
            <span>Bloque 6</span><br>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_7" value="7"/>
            <span>Bloque 7</span>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_8" value="8"/>
            <span>Bloque 8</span>
          </label>
          <label>
            <input type="checkbox"  class="filled-in" name="bloque_9" value="9"/>
            <span>Bloque 9</span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="hidden" name="estado" class="form-control" value="0" readonly="readonly" required>
        </div>
      </div>
      <a class="waves-effect red darken-1 btn" href="/" >Cancel</a>
      <button class="btn waves-effect waves-light" type="submit" name="action">Crear Reserva
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
