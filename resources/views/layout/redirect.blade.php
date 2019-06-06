@if(Auth::check())
  {{-- Para los index se puede utilizar este modo de redireccionar por rol,
       pero para los sub directorios de cada rol, se puede agregar este mismo codigo
       pero se debe reemplazar el $uri por el rol correspondiente, EJ: 'estudiante' --}}
  @php
    $uri = request()->path();
  @endphp
  @if(Auth::user()->tipo_usuario != $uri)
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
