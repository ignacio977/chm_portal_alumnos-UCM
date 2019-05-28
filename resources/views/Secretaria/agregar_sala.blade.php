
@extends('layout.master')

@section('title')
  <title>Ingresar Salas</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
  <form method="POST" action="/agregar_sala">
    @csrf
    @if(session('status_sala'))
        <div class="card-panel green accent-3">
        {{session('status_sala')}}
        </div>
    @endif
    @if(session('error_sala'))
        <div class="card-panel deep-orange darken-1">
        {{session('error_sala')}}
        </div>
    @endif
    <div class="card-panel center">
      <h5 class="center-align black-text text-darken-2">Creación De Salas</h5>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Nombre de la sala</label>
          <input type="text" name="nombre_sala" class="form-control" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Capacidad</label>
          <input type="text" name="capacidad" class="form-control" required>
        </div>
      </div>

      <a class="waves-effect red darken-1 btn" href="/secretaria" >Cancel</a>
      <button class="btn waves-effect waves-light" type="submit" >Crear Sala
      <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
