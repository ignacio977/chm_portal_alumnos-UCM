
@extends('layout.master')

@section('title')
  <title>Perfil Secretaria</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
  <form method="POST" action="/agregar_reserva_secretaria">
    @csrf
    @if(session('status_reserva'))
        <div class="card-panel deep-orange darken-1">
        {{session('status_reserva')}}
        </div>
    @endif
    @if(session('error_reserva'))
        <div class="card-panel deep-orange darken-1">
        {{session('error_reserva')}}
        </div>
    @endif
    <div class="card-panel center">
      <h5 class="center-align black-text text-darken-2">Modificacion de Reserva</h5>
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
          <input type="date" name="fecha_ingreso" min="<?php echo date('Y-m-d');?>" class="form-control" required>
          <label class="black-text text-darken-2">Desde: </label>
        </div>
        <div class="input-field col s6">
          <input type="date" name="fecha_salida"  min="<?php echo date('Y-m-d');?>" class="form-control" required>
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
      <a class="waves-effect red darken-1 btn" href="/secretaria" >Cancel</a>
      <button class="btn waves-effect waves-light" type="submit" name="action">Crear Reserva
      <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
