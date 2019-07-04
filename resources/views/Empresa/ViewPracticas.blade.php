@extends('layout.master')

@section('title')
  <title>Perfil Empresa</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<br>
<div class="container">
  <div class="card-panel center">
    <h5>Oferta Practica Profesional</h5>
    <br>
    <div class="row">
      <div class="input-field col s12">
          <input disabled type="text" id="text1" value="{{$datos->Enfoque}}">
          <label class="black-text text-darken-2" for="text1">Enfoque</label>
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
          <input disabled type="text" id="text2" value="{{$datos->PuestoOfrecido}}">
          <label class="black-text text-darken-2" for="text2">Puesto Ofrecido</label>
      </div>
    </div>
    
    <input disabled type="hidden" id="text7">
    <label class="black-text text-darken-2" for="text7">Actividad</label>
    <div class="row">
        <div class="input-field col s6">
            <input disabled type="text" id="text3" value="{{$datos->Actividad1}}">
        </div>
        <div class="input-field col s6">
            <input disabled type="text" id="text4" value="{{$datos->Actividad2}}">
        </div>
        <div class="input-field col s6">
            <input disabled type="text" id="text5" value="{{$datos->Actividad3}}">
        </div>
        <div class="input-field col s6">
            <input disabled type="text" id="text6" value="{{$datos->Actividad4}}">
        </div>
      </div>
      <input type="hidden" name="" id="text">
      <label class="black-text text-darken-2" for="text">Dias de trabajo</label>
    <div class="row">
      <div class="input-field col s6">
          <input disabled type="text" name="" id="" value="{{$datos->DiasDesde}}">
      </div>
      <div class="input-field col s6">
          <input disabled type="text" name="" id="" value="{{$datos->DiasHasta}}">
      </div>
    </div>
    <input type="hidden" name="" id="text">
    <label class="black-text text-darken-2" for="text">Horario de trabajo</label>
    <div class="row">
      <div class="input-field col s6">
          <input disabled type="text" name="" id="" value="{{$datos->HorasDesde}}">
      </div>
        <div class="input-field col s6">
            <input disabled type="text" name="" id="" value="{{$datos->HorasHasta}}">
        </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
          <input disabled type="text" id="text1" value="{{$datos->Estado}}">
          <label class="black-text text-darken-2" for="text1">Estado</label>
      </div>
    </div>
    <a class="btn waves-effect waves-light" href="http://localhost:8000/empresa/practicas/mostrar" >Volver</a>
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
