{{-- Modal (cuadro emergente de inicio de sesión) --}}
<div id="modal1" class="modal"> 
  <div class="modal-content">
    <form action="{{ route('login') }}" id="form_id" method="POST">
      @csrf
      {{-- Entrada de rut --}}
      <div class="form-group row">
        <div class="col-md-6">
          <label for="rut">Rut</label> 
            <input id="rut" type="text" class="form-control{{ $errors->has('rut') ? ' is-invalid' : '' }}" name="rut"  required autofocus>
          </div>
        </div>
        {{-- Entrada de contraseña --}}
        <div class="form-group row">
          <div class="col-md-6">
            <label for="password">Contraseña</label> 
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"  required>
          </div>
        </div>
        {{-- Botón submit --}}
        <button type="submit" class='btn waves-effect waves-light'>Iniciar sesión
          <i class="material-icons right">send</i>
        </button>  
    </form>
  </div>
</div> 