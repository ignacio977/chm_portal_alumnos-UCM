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
<div class="container">
  <form >
    <div class="card-panel center">
      <h5 class="center-align black-text text-darken-2">Formulario creacion practicas profesionales</h5>
      <div class="row">
        <div class="input-field col s12">
          <label for="disabled" class="black-text text-darken-2">Nombre de la Empresa</label>
          <input disabled value={{Auth::user()->nombres}} id="disabled" type="text" class="validate">
          <input value={{Auth::user()->id}} type="hidden" style="display:none">
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
          <input value="basura" id="disabled" type="hidden" class="validate" style="display:none">
          <label for="disabled" class="black-text text-darken-2">Dias De Practica </label>
          <br>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <select>
            <option value="" disabled selected>Seleccione un dia</option>
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
          <select>
            <option value="" disabled selected>Seleccione un dia</option>
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
      </div>
      <div class="row">
        <div class="input-field col s12">
          {{-- <input value="basura" id="disabled" type="hidden" class="validate" style="display:none"> --}}
          <label for="disabled" class="black-text text-darken-2">Horas De Practica </label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">  
          <input type="text" class="timepicker">
          <label >Desde: </label>
        </div>
        <div class="input-field col s6">  
          <input type="text" class="timepicker">
          <label >Hasta: </label>
        </div>
      </div>
      <div class="row">
          <div class="input-field col s12">
            <input id="Puesto_Ofrecido" type="text" class="validate">
            <label for="Puesto_Ofrecido">Puesto Ofrecido</label>
            <span class="helper-text" data-error="wrong" data-success="right">Ej: Practicante en Java</span>
          </div>
      </div>
      <div class="row">
          <div class="input-field col s12">
            <input id="Enfoque" type="text" class="validate">
            <label for="Enfoque">Enfoque Practica</label>
            <span class="helper-text" data-error="wrong" data-success="right">Ej: Orientado a SQL</span>
          </div>
      </div>
      <div class="row">
          <div class="input-field col s12">
            <input value="basura" id="disabled" type="hidden" class="validate" style="display:none">
            <label for="disabled" class="black-text text-darken-2">Actividades a realizar </label>
            <br><br>
            <span class="left-align helper-text" data-success="right">El minimo de actividades debe ser 1 y como maximo se pueden colocar 4</span>
          </div>
        </div>
      <div class="row">
          <div class="input-field col s6">
            <input placeholder="Ej: Crear Base de datos" id="Actividad1" type="text" class="validate">
            <label for="Actividad1">Actividad 1</label>
          </div>
          <div class="input-field col s6">
            <input placeholder="Ej: Crear aplicacion movil" id="Actividad2" type="text" class="validate">
            <label for="Actividad2">Actividad 2</label>
          </div>
          <div class="input-field col s6">
            <input placeholder="Ej: Desarrollar bot" id="Actividad3" type="text" class="validate">
            <label for="Actividad3">Actividad 3</label>
          </div>
          <div class="input-field col s6">
            <input placeholder="Ej: Desarrollar control de acceso" id="Actividad4" type="text" class="validate">
            <label for="Actividad4">Actividad 4</label>
          </div>
      </div>
      <a class="waves-effect red darken-1 btn" href="http://localhost:8000/empresa" >Cancel</a>
      <button class="btn waves-effect waves-light" type="submit" name="action">Crear Practica
      <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
