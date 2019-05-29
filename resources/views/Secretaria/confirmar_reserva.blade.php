

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
      <h5 class="center-align black-text text-darken-2">Confirmar Reservas</h5>
      <div class="row">
        <div class="input-field col s12">
          <label class="black-text text-darken-2">Id usuario</label>
          <input type="text" name="id_user" class="form-control" value="{{ Auth::user()->id}}" readonly="readonly" required>
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
          <input type="text" name="fecha_ingreso" value="{{$reserva->fecha_ingreso}}" readonly="readonly" required>
          <label class="black-text text-darken-2">Desde: </label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="fecha_salida"  value="{{$reserva->fecha_salida}}"  readonly="readonly" required>
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
      <button class="btn waves-effect waves-light" type="submit" name="action">Confirmar reserva
      <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
@endsection


@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection