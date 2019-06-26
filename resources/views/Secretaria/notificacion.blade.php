
@extends('layout.master')

@section('title')
  <title>Perfil Secretaria</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
  <form method="POST" action="/agregar_comentario">
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
      <h5 class="center-align black-text text-darken-2"> Notificación</h5>

      <div class="row">
        <div class="input-field col s12">
          <label class="black-text text-darken-2">Id reserva</label>
          <input type="text" name="id_reserva" class="form-control" value="{{ $reserva->id}}" readonly="readonly" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label class="black-text text-darken-2">Id usuario</label>
          <input type="text" name="id_user" class="form-control" value="{{ $reserva->id_user}}" readonly="readonly" required>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label class="black-text text-darken-2">Comentario</label>
          <input type="text" name="comentario" class="form-control"   required>
        </div>
      </div>
      <a class="waves-effect red darken-1 btn" href="/secretaria_listado_reservas" >Cancel<i class="material-icons right">close</i></a>
      <button class="btn waves-effect waves-light" type="submit" name="action">Crear Comentario
      <i class="material-icons right">comment</i>
      </button>
    </div>
  </form>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
