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
  <title>Detalle Retroalimentacion</title>
@endsection

@section('styles')
  @include('layout.materialize')
@endsection

@section('body')
<br>
<div class="container">
  <div class="card-panel center">
    <table class="table-border table-striped responsive-table">
      <thead>
        <tr>
          <th>Pregunta</th>
          <th>Respuesta</th>
        </tr>
      </thead>
    <?php $j = $i + 10 ?>
    @for($i; $i< $j;$i++)
    <tbody>
        <thead>
          <tr>
            <td>{{$Informacion[$i]->RespuestaPregunta->ContenidoPregunta}}</td>
            <td>
                @if(1<=($Informacion[$i]->NivelDeConformidad) && ($Informacion[$i]->NivelDeConformidad) <2)
                  <a>Muy en desacuerdo</a>
                @elseif(2<= ($Informacion[$i]->NivelDeConformidad) && ($Informacion[$i]->NivelDeConformidad) <3)
                  <a>En desacuerdo</a>
                @elseif(3<= ($Informacion[$i]->NivelDeConformidad) && ($Informacion[$i]->NivelDeConformidad) <4)
                  <a>Indiferente</a>
                @elseif(4<=($Informacion[$i]->NivelDeConformidad) && ($Informacion[$i]->NivelDeConformidad) <5)
                  <a>De acuerdo</a>
                @elseif(5<=($Informacion[$i]->NivelDeConformidad) &&($Informacion[$i]->NivelDeConformidad) <6)
                  <a>Muy de acuerdo</a>
                @endif</td>
          </thead>
        </tbody>
    @endfor
  </table>
  <br>
  <input disabled type="hidden" id="text7">
    <label class="black-text text-darken-2" for="text7">Comentario</label>
    @if($Comentarios != "0")
    <div class="row">
      <div class="input-field col s12">
          <input disabled type="text" id="text3" value="{{$Comentarios->comentario}}">
      </div>
    </div>
    @else
    <div class="input-field col s12">
        <input disabled type="text" id="text3" value="No hay comentarios">
    </div>
    @endif
    <br>
    <a class="btn waves-effect waves-light" href="http://localhost:8000/empresa/practicas/mostrarR" >Volver</a>
  </div>
</div>

@endsection
        
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
  <script src={{ asset('js/table_scripts.js') }}></script>
@endsection
