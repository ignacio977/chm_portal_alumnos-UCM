
{{-- Navbar --}}
<nav>
  <div class="nav-wrapper" style="background-color: #17AEF6;">
    <a href="#" data-target="slide-out" class="sidenav-trigger show-on-large"><i class="material-icons">menu</i></a>
    <a href="#!" class="brand-logo" align="middle">UCM</a>
    <ul class="right hide-on-med-and-down">
      <li><a href="#user"><img class="circle" height="50" align="middle" style="transform: translateY(-15%);" src="images/smile.png"></a></li>
      <li><a href="">Botón 1</a></li>
      <li><a href="">Botón 2</a></li>
      <li><a href="">Botón 3</a></li>
    </ul>
  </div>
</nav>

{{-- Sidenav (menú desplegable que al que se cambia cuando se está en un dispositivo móvil) --}}
<ul id="slide-out" class="sidenav">
  <li><div class="user-view">
    <div class="background">
      <img src="images/forest.jpg">
    </div>
    <a href="#user"><img class="circle" src="images/smile.png"></a>
    <a href="#name"><span class="white-text name">Mike John</span></a>
    <a href="#email"><span class="white-text email">correolindo@gmail.com</span></a>
  </div></li>
  <li><a class="waves-effect" href="#!">Test</a></li> {{-- Agregar acá los botones igual, para poder visualizar en dispositivos móviles --}}
  <li><div class="divider"></div></li>
</ul>
