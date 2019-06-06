{{-- Restriccion de acceso --}}

@if(Auth::check())
  @if(Auth::user()->tipo_usuario != 'empresa')
    @php
      header("Location: /home");
      die();
    @endphp
  @endif
@else
  @php
    header("Location: /home");
    die();
  @endphp
@endif

@extends('layout.master')

@section('title')
  <title>Creacion Practicas Profesionales</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
@if(session('errores'))
  <div class="card-panel teal accent-1">
    Practica Profesional creada correctamente
  </div>
@endif
<br>
<div class="container">
  <div class="card-panel center">
    <form class="col s12" action="{{url('/empresa/practicas/editar')}}" method="post" >
      @csrf
      <h5 class="center-align black-text text-darken-2">Formulario editar practicas profesionales</h5>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Nombre de la Empresa</label>
          <input disabled value={{Auth::user()->nombres}} type="text" id="disabled">
          <input name="id" value="{{ old('id', $request->id) }}" type="hidden" style="display:none">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input disabled value={{Auth::user()->telefono}} id="disabled" type="text" class="validate">
          <label for="disabled" class="black-text text-darken-2">Telefono de la Empresa</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Dias De Practica </label>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <select name="DesdeD">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miercoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sabado</option>
            <option value="7">Domingo</option>
          </select>
          <label class="black-text text-darken-2">Desde: </label>
        </div>
        <div class="input-field col s6">
          <select name="HastaD">
            <option value="1">Lunes</option>
            <option value="2">Martes</option>
            <option value="3">Miercoles</option>
            <option value="4">Jueves</option>
            <option value="5">Viernes</option>
            <option value="6">Sabado</option>
            <option value="7">Domingo</option>
          </select>
          <label class="black-text text-darken-2">Hasta: </label>
        </div>
        @if($errores[5] != "")
          <label class="red-text text-darken-2">{{"$errores[5]"}}</label>
        @endif
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Horas De Practica </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">  
          <input name="DesdeH" type="text" value="{{ old('DesdeH', $request->DesdeH) }}"">
          <label >Desde: </label>
        </div>
        <div class="input-field col s6">  
          <input name="HastaH" type="text" class="timepicker" value="{{ old('HastaH', $request->HastaH) }}">
          <label >Hasta: </label>
        </div>
        @if($errores[2] != "")
          <label class="red-text text-darken-2">{{"$errores[2]"}}</label>
        @endif
      </div>
      <div class="row">
          <div class="input-field col s12">
            <input name="PuestoOfrecido" id="Puesto_Ofrecido" type="text" value="{{ old('PuestoOfrecido', $request->PuestoOfrecido) }}">
            <label for="Puesto_Ofrecido">Puesto Ofrecido</label>
            <span class="helper-text" data-error="wrong" data-success="right">Ej: Practicante en Java</span>
          </div>
          @if($errores[4] != "")
            <label class="red-text text-darken-2">{{"$errores[4]"}}</label>
          @endif
      </div>
      <div class="row">
          <div class="input-field col s12">
            <input name="Enfoque" id="Enfoque" type="text" class="validate" value="{{ old('Enfoque', $request->Enfoque) }}">
            <label for="Enfoque">Enfoque Practica</label>
            <span class="helper-text" data-error="wrong" data-success="right">Ej: Orientado a SQL</span>
          </div>
          @if($errores[3] != "")
            <label class="red-text text-darken-2">{{"$errores[3]"}}</label>
          @endif
      </div>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Actividades a realizar </label>
          <br><br>
          <span class="left-align helper-text" data-success="right">El minimo de actividades debe ser 1 y como maximo se pueden colocar 4</span>
        </div>
        @if($errores[0] != "")
          <label class="red-text text-darken-2">{{"$errores[0]"}}</label>
        @endif
      </div>
      <div class="row">
          <div class="input-field col s6">
            <input name="Actividad1" value="{{ old('Activiad1', $request->Actividad1) }}" placeholder="Ej: Crear Base de datos" id="Actividad1" type="text" class="validate">
            <label for="Actividad1">Actividad 1</label>
          </div>
          <div class="input-field col s6">
            <input name="Actividad2" value="{{ old('Activiad2', $request->Actividad2) }}" placeholder="Ej: Crear aplicacion movil" id="Actividad2" type="text" class="validate">
            <label for="Actividad2">Actividad 2</label>
          </div>
          <div class="input-field col s6">
            <input name="Actividad3" value="{{ old('Activiad3', $request->Actividad3) }}" placeholder="Ej: Desarrollar bot" id="Actividad3" type="text" class="validate">
            <label for="Actividad3">Actividad 3</label>
          </div>
          <div class="input-field col s6">
            <input name="Actividad4" value="{{ old('Activiad4', $request->Actividad4) }}" placeholder="Ej: Desarrollar control de acceso" id="Actividad4" type="text" class="validate">
            <label for="Actividad4">Actividad 4</label>
          </div>
      </div>
      <a class="waves-effect red darken-1 btn" href="http://localhost:8000/empresa/practicas/mostrar" >Cancel</a>
      <button class="btn waves-effect waves-light" type="submit">Enviar</button>
    </form>
  </div>
</div>
@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
