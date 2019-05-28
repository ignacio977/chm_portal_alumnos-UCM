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
        <input name="idEmpresa" value={{Auth::user()->id}} type="hidden" style="display:none">
        <a class="black-text text-darken-2" >ofrece practica
        <a class="black-text text-darken-2">desde el dia
        <input name="DesdeD" value={{$request->DesdeD}} type="hidden" style="display:none">
        @if($request->DesdeD == 1)
          <a>Lunes
        @elseif($request->DesdeD == 2)
          <a>Martes
        @elseif($request->DesdeD == 3)
          <a>Miercoles
        @elseif($request->DesdeD == 4)
          <a>Jueves
        @elseif($request->DesdeD == 5)
          <a>Viernes
        @elseif($request->DesdeD == 6)
          <a>Sabado
        @elseif($request->DesdeD == 7)
          <a>Domingo
        @endif
        <input name="HastaD" value={{$request->HastaD}} type="hidden" style="display:none">
        <a class="black-text text-darken-2">hasta el dia
        @if($request->HastaD == 1)
          <a>Lunes
        @elseif($request->HastaD == 2)
          <a>Martes
        @elseif($request->HastaD == 3)
          <a>Miercoles
        @elseif($request->HastaD == 4)
          <a>Jueves
        @elseif($request->HastaD == 5)
          <a>Viernes
        @elseif($request->HastaD == 6)
          <a>Sabado
        @elseif($request->HastaD == 7)
          <a>Domingo
        @endif
        <input name="DesdeH" value={{$request->DesdeH}} type="hidden" style="display:none">
        <a class="black-text text-darken-2">desde las
        <a>{{"$request->DesdeH"}}
        <input name="HastaH" value={{$request->HastaH}} type="hidden" style="display:none">
        <a class="black-text text-darken-2">hasta las
        <a>{{"$request->HastaH"}}
        <input name="PuestoOfrecido" value={{$request->PuestoOfrecido}} type="hidden" style="display:none">
        <a class="black-text text-darken-2">el puesto ofrecido es 
        <a>{{"$request->PuestoOfrecido"}} 
        <a class="black-text text-darken-2">con enfoque en
        <input name="Enfoque" value={{$request->Enfoque}} type="hidden" style="display:none">
        <a>{{"$request->Enfoque"}}
        @if($actividad > 1)
          <a class="black-text text-darken-2">en las activades
          @if($request->Actividad1 != "")
            <a>{{$request->Actividad1}}
          @endif
          @if($request->Actividad2 != "")
            <a>,{{$request->Actividad2}}
          @endif
          @if($request->Actividad3 != "")
            <a>,{{$request->Actividad3}}
          @endif
          @if($request->Actividad4 != "")
            <a>,{{$request->Actividad4}}
          @endif
        @else
          <a class="black-text text-darken-2">en la actividad
          @if($request->Actividad1 != "")
            <a>{{$request->Actividad1}}
          @endif
          @if($request->Actividad2 != "")
            <a>{{$request->Actividad2}}
          @endif
          @if($request->Actividad3 != "")
            <a>{{$request->Actividad3}}
          @endif
          @if($request->Actividad4 != "")
            <a>{{$request->Actividad4}}
          @endif
        @endif
        <a class="black-text text-darken-2"> 
      </p>
    <a class="waves-effect red darken-1 btn" href="http://localhost:8000/empresa" >Cancel</a>
    <input class="btn waves-effect waves-light" type="submit">
    </form>
  </div>
</div>
@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
