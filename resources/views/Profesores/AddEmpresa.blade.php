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
            <input id="nombre" type="text" name="nombre" class="validate" onChange="cambio('ErrorName')">
            <label for="nombre">Nombre</label>
            @if($errores[0] != "")
              <span id="ErrorName" class="helper-text red-text text-darken-2" data-error="wrong" data-success="right">{{"$errores[0]"}}</span>
            @endif
        </div>    
        <div class="input-field col s4">
          <i class="material-icons prefix">chrome_reader_mode</i>
          <input id="identificador" type="text" name="rut" class="validate" onChange="cambio('ErrorRut')">
          <label for="identificador">Rut</label>
          @if($errores[1] != "")
              <span id="ErrorRut" class="helper-text red-text text-darken-2" data-error="wrong" data-success="right">{{"$errores[1]"}}</span>
          @endif
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s2">
            <i class="material-icons prefix">mail</i>
            <input id="email" type="email" name="email" class="validate" onChange="cambio('ErrorEmail')">
            <label for="email">Email</label>
            @if($errores[2] != "")
              <span id="ErrorEmail" class="helper-text red-text text-darken-2" data-error="wrong" data-success="right">{{"$errores[2]"}}</span>
            @endif
        </div>
        <div class="input-field col s4">
            <i class="material-icons prefix">lock</i>
            <input id="contra" type="password" name="pass" class="validate" onChange="cambio('ErrorPass')">
            <label for="contra">Password</label>
            @if($errores[3] != "")
              <span id="ErrorPass" class="helper-text red-text text-darken-2" data-error="wrong" data-success="right">{{"$errores[3]"}}</span>
            @endif
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4 offset-s2">
            <i class="material-icons prefix">phone</i>
            <input id="phone" type="text" name="phone" class="validate" onChange="cambio('ErrorPhone')">
            <label for="phone">Telefono</label>
            @if($errores[4] != "")
              <span id="ErrorPhone" class="helper-text red-text text-darken-2" data-error="wrong" data-success="right">{{"$errores[4]"}}</span>
            @endif
        </div>
        <div class="input-field col s4">
            <i class="material-icons prefix">location_on</i>
            <input id="direccion" type="text" name="direccion" class="validate" onChange="cambio('ErrorDir')">
            <label for="direccion">Dirección</label>
            @if($errores[5] != "")
              <span id="ErrorDir" class="helper-text red-text text-darken-2" data-error="wrong" data-success="right">{{"$errores[5]"}}</span>
            @endif
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
  <script language="JavaScript"> 
    function cambio(name){ 
        document.getElementById(name).style.display = "none"; 
    } 
  </script>
@endsection