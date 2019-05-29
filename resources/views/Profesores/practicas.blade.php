@extends('layout.master')

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col s12"></div>
    </div>
    @forelse ($practicasPendientes as $postulacion)
    <div class="row">
        <div class="col s2"></div>
        <div class="col s8 z-depth-1 section blue lighten-4">
            <div class="col s8">
                <h5 class="">Id: {{$postulacion->id}}</h5>
                <h5 class="">Alumno: {{$postulacion->alumnoid}}</h5>
                <h5 class="">Practica: {{$postulacion->practicaid}}</h5>
            </div>
            <div class="col s2">
                <form action="/profesor/coordinador" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_postulacion" value={{$postulacion->id}}>
                    <input type="hidden" name="estado" value="Aceptada">
                    <button type= "submit" class="btn-floating btn-large waves-effect waves-light green"><i class="material-icons">check</i></button>
                </form>
            </div>
            <div class="col s2">
                <form action="/profesor/coordinador" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="id_postulacion" value={{$postulacion->id}}>
                    <input type="hidden" name="estado" value="Rechazada">
                    <button type= "submit" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">clear</i></button>
                </form>
            </div>
        </div>
        <div class="col s2"></div>
    </div>    
    @empty
        
    @endforelse
    
    
</div>

@endsection
    