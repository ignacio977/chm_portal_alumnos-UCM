@if(Auth::check())
  @php
    $uri = request()->path();
  @endphp
  @if(Auth::user()->tipo_usuario != $uri)
    @php
      header("Location: /home")
    @endphp
  @endif
@else
  @php
    header("Location: /home")
  @endphp
@endif