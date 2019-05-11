<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--Definir titulo de pagina-->
    @yield('title')

    <!--Definimos frameworks y/o js, css, etc. necesarios-->
    @yield('styles')

    <!--Mostrar errores, si es que hay-->
    @include('layout.errores')

    <!--Incluir nav-->
    @include('layout.nav')
  </head>
  <body>
    <!--Definir body-->
    @yield('body')

    <!--Agregar scripts necesarios-->
    @yield('scripts')
  </body>
</html>

