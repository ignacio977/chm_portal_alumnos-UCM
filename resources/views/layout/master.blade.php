<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    @yield('title') <!--Definir titulo de pagina-->
    @yield('styles')<!--Definir archivos css, js, etc. o framework-->
  </head>
  <body>
    @include('layout.nav')
    @yield('body')
  </body>
</html>
