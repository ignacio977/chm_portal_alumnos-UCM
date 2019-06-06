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
<br>
<div class="container">
  <div class="card-panel center">
    <form action="{{url('/empresa/practicas/enviar')}}" method="post">
      <p align="left">
        <a class="black-text text-darken-2" >La empresa
        <a >{{"$request->NombreEmpresa"}}
        <input name="id" value={{$request->id}} type="hidden" style="display:none">
        <a class="black-text text-darken-2" >ofrece practica
        <a class="black-text text-darken-2">desde el dia
        @if($request->DesdeD == 1)
          <a>Lunes<input name="DesdeD" value="Lunes" type="hidden" style="display:none">
        @elseif($request->DesdeD == 2)
          <a>Martes<input name="DesdeD" value="Martes" type="hidden" style="display:none">
        @elseif($request->DesdeD == 3)
          <a>Miercoles<input name="DesdeD" value="Miercoles" type="hidden" style="display:none">
        @elseif($request->DesdeD == 4)
          <a>Jueves<input name="DesdeD" value="Jueves" type="hidden" style="display:none">
        @elseif($request->DesdeD == 5)
          <a>Viernes<input name="DesdeD" value="Viernes" type="hidden" style="display:none">
        @elseif($request->DesdeD == 6)
          <a>Sabado<input name="DesdeD" value="Sabado" type="hidden" style="display:none">
        @elseif($request->DesdeD == 7)
          <a>Domingo<input name="DesdeD" value="Domingo" type="hidden" style="display:none">
        @endif
        <a class="black-text text-darken-2">hasta el dia
        @if($request->HastaD == 1)
          <a>Lunes<input name="HastaD" value="Lunes" type="hidden" style="display:none">
        @elseif($request->HastaD == 2)
          <a>Martes<input name="HastaD" value="Martes" type="hidden" style="display:none">
        @elseif($request->HastaD == 3)
          <a>Miercoles<input name="HastaD" value="Miercoles" type="hidden" style="display:none">
        @elseif($request->HastaD == 4)
          <a>Jueves<input name="HastaD" value="Jueves" type="hidden" style="display:none">
        @elseif($request->HastaD == 5)
          <a>Viernes<input name="HastaD" value="Viernes" type="hidden" style="display:none">
        @elseif($request->HastaD == 6)
          <a>Sabado<input name="HastaD" value="Sabado" type="hidden" style="display:none">
        @elseif($request->HastaD == 7)
          <a>Domingo<input name="HastaD" value="Domingo" type="hidden" style="display:none">
        @endif
        <input name="DesdeH" value="{{$request->DesdeH}}" type="hidden" style="display:none">
        <a class="black-text text-darken-2">desde las
        <a>{{"$request->DesdeH"}}
        <input name="HastaH" value="{{$request->HastaH}}" type="hidden" style="display:none">
        <a class="black-text text-darken-2">hasta las
        <a>{{"$request->HastaH"}}
        <input name="PuestoOfrecido" value="{{$request->PuestoOfrecido}}" type="hidden" style="display:none">
        <a class="black-text text-darken-2">el puesto ofrecido es 
        <a>{{"$request->PuestoOfrecido"}} 
        <a class="black-text text-darken-2">con enfoque en
        <input name="Enfoque" value="{{$request->Enfoque}}" type="hidden" style="display:none">
        <a>{{"$request->Enfoque"}}
        @if($actividad > 1)
          <a class="black-text text-darken-2">en las activades
          @if($request->Actividad1 != "")
            <a>{{$request->Actividad1}}<input name="Actividad1" value="{{$request->Actividad1}}" type="hidden" style="display:none">
          @endif
          @if($request->Actividad2 != "")
            <a>,{{$request->Actividad2}}<input name="Actividad2" value="{{$request->Actividad2}}" type="hidden" style="display:none">
          @endif
          @if($request->Actividad3 != "")
            <a>,{{$request->Actividad3}}<input name="Actividad3" value="{{$request->Actividad3}}" type="hidden" style="display:none">
          @endif
          @if($request->Actividad4 != "")
            <a>,{{$request->Actividad4}}<input name="Actividad4" value="{{$request->Actividad4}}" type="hidden" style="display:none">
          @endif
        @else
          <a class="black-text text-darken-2">en la actividad
          @if($request->Actividad1 != "")
            <a>{{$request->Actividad1}}<input name="Actividad1" value="{{$request->Actividad1}}" type="hidden" style="display:none">
          @endif
          @if($request->Actividad2 != "")
            <a>{{$request->Actividad2}}<input name="Actividad2" value="{{$request->Actividad2}}" type="hidden" style="display:none">
          @endif
          @if($request->Actividad3 != "")
            <a>{{$request->Actividad3}}<input name="Actividad3" value="{{$request->Actividad3}}" type="hidden" style="display:none">
          @endif
          @if($request->Actividad4 != "")
            <a>{{$request->Actividad4}}<input name="Actividad4" value="{{$request->Actividad4}}" type="hidden" style="display:none">
          @endif
        @endif
        <a class="black-text text-darken-2"> 
      </p>
    <a class="waves-effect red darken-1 btn" href="http://localhost:8000/empresa" >Cancel</a>
    <button name="update_data" class="btn waves-effect waves-light" type="submit">Enviar</button>
    </form>
  </div>
</div>
@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
