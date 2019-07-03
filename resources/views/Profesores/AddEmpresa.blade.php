@extends('layout.master')

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="row">
    <div class="col s8 offset-s2">
        <div style="font-size:3vw;text-align:center;">Formulario para ingreso de nuevas empresas</div>
    </div>
</div>
<div class="row">
    <form class="col s12 " action="/profesor/coordinador/addE" method="post">
    {{ csrf_field() }}
      <div class="row">
        <div class="input-field col s4 offset-s2">
            <i class="material-icons prefix">account_circle</i>
            <input id="name" type="text" name="name" class="validate">
            <label for="name">Nombre</label>
        </div>
        <div class="input-field col s4">
          <i class="material-icons prefix">chrome_reader_mode</i>
          <input id="identificador" type="text" name="rut" class="validate">
          <label for="identificador">Rut</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s2">
            <i class="material-icons prefix">mail</i>
            <input id="email" type="email" name="email" class="validate">
            <label for="email">Email</label>
        </div>
        <div class="input-field col s4">
            <i class="material-icons prefix">lock</i>
            <input id="contra" type="password" name="pass" class="validate">
            <label for="contra">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s2">
            <i class="material-icons prefix">phone</i>
            <input id="phone" type="text" name="phone" class="validate">
            <label for="phone">Telefono</label>
        </div>
        <div class="input-field col s4">
            <i class="material-icons prefix">location_on</i>
            <input id="direccion" type="text" name="direccion" class="validate">
            <label for="direccion">Dirección</label>
        </div>
      </div>
      <div class="row">
          <div class="col s2 offset-s8 right-align">
                <button class="btn waves-effect waves-light blue darken-4" type="submit" name="action">Enviar
                    <i class="material-icons right">send</i>
                </button>
          </div>
      </div>
    </form>
  </div>
        
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection