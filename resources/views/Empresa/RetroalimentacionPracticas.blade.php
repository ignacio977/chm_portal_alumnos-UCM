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
    <h5>Retroalimentacion Practica Profesional</h5>
    <br>
    @for($i = 0; $i< count($Informacion); $i = $i+10)
      <div class="card-panel center">
        <table class="table-border table-striped responsive-table">
          <thead>
            <tr>
              <th>Nombre Alumno</th>
              <th>E-Mail</th>
              <th>Conformidad Promedio</th>
              <th>Detalle</th>
            </tr>
          </thead>
          <tbody>
            <thead>
              <tr>
                <form action="{{url('/empresa/practicas/mostrarR')}}" method="post">
                  <input name="informacion" value={{$Informacion}} type="hidden">
                  <input name="i" value={{$i}} type="hidden">
                  <td>{{$Informacion[$i]->RespuestaUsuario->nombres}}<br>{{$Informacion[$i]->RespuestaUsuario->apellidos}}</td>
                  <td>{{$Informacion[$i]->RespuestaUsuario->email}}</td>   
                  <td><?php $promedio = 0;?>
                    @for($j = $i; $j< ($i + 10); $j++)
                      <?php $promedio = $promedio + $Informacion[$j]->NivelDeConformidad?>
                    @endfor
                    @if(1<=($promedio/10) && ($promedio/10) <2)
                      Muy en desacuerdo
                    @elseif(2<= ($promedio/10) && ($promedio/10) <3)
                      En desacuerdo
                    @elseif(3<= ($promedio/10) && ($promedio/10) <4)
                      Indiferente
                    @elseif(4<=($promedio/10) && ($promedio/10) <5)
                      De acuerdo
                    @elseif(5<=($promedio/10) && ($promedio/10) <6)
                      Muy de acuerdo
                    @endif</td>
                    <td><button name="view_button" id="view_button" class="waves-effect orange btn" type="submit">
                      <i class="material-icons">visibility</i></button>
                  </form> 
                  </td>
            </thead>
          </tbody>
        </table>
      </div>
    @endfor
  </div>
</div>
@endsection

@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
