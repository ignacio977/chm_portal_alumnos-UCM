{{-- Mantenemos estandar base --}} 
@extends('layout.master')

{{-- Cambiamos titulo de pagina --}} 
@section('title')
  <title>Página de Inicio</title>
@endsection

{{-- Incluimos los archivos a utilizar para front --}}
@section('styles')
  @include('layout.materialize') {{-- De usar materialize, incluimos desde el layout --}}
@endsection

{{-- Aqui trabajamos todo el contenido de la vista --}}
@section('body')
  {{-- Contenido --}}
  <div class="slider"> <!--Empieza el slider de imágenes -->
    <ul class="slides">
       <li>
          <img src="http://portal.ucm.cl//content/uploads/2018/08/Ingenier%C3%ADa-en-Estad%C3%ADstica-se-presenta-como-la-carrera-del-futuro2.jpg"> 
          <div class="caption center-align">
             <h3>UCM sumó un nuevo doctorado acreditado</h3>
             <h5 class="light grey-text text-lighten-3">Doctorado del modelamiento matemático aplicado</h5>
          </div>
       </li>
       <li>
          <img src="http://portal.ucm.cl//content/uploads/bfi_thumb/portada_jesusmaestroUCM-o8lin3oxpj15wapyzfay8e8blasgsa9sisf9yp9a9s.jpg" > 
          <div class="caption left-align">
             <h3>UCM presentó a la comunidad la obra Jesús Maestro Bueno</h3>
          </div>
       </li>
       <li>
          <img src="http://www.extension.ucm.cl/wp-content/uploads/2017/07/extension_ucm.png"> 
          <div class="caption right-align">
             <h3>Programa Junio</h3>
          </div>
       </li>
    </ul>
  </div> <!--Termina el slider de imágenes -->
  <h4><center>NOTICIAS</center></h4> <!--Sección de noticias -->
  <br>
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l3">
        <div class="card">
          <div class="card-image">
            <img src="http://portal.ucm.cl//content/uploads/bfi_thumb/Comercio-justo-ucm-2019-3-o98536n493nc3cut91jlrvlp1ru4a6g77qds3gol6i.jpg">
            <span class="card-title"><i class="tiny material-icons">access_time</i>&nbsp 12 Jun 2019</span>
          </div>
          <div class="card-content">
            <p><b>Llaman a fortalecer la asociatividad de agricultores [...]</b></p>
          </div>
        </div>
      </div>
      
      <div class="col s12 m12 l3">
        <div class="card">
          <div class="card-image">
            <img src="http://portal.ucm.cl//content/uploads/bfi_thumb/Muestra-interactiva-UCM-1-o97oowxqhhm3as970e8qhbw3nz77ks4ce63vt1vqka.jpg">
            <span class="card-title"><i class="tiny material-icons">access_time</i>&nbsp 12 Jun 2019</span>
          </div>
          <div class="card-content">
            <p><b>Muestra interactiva de música y ciencias permite aprender [...]</b></p>
          </div>
        </div>
      </div>
      
      <div class="col s12 m12 l3">
        <div class="card">
          <div class="card-image">
            <img src="http://portal.ucm.cl//content/uploads/bfi_thumb/Gran-interes-desperto-clases-de-Lengua-de-Señas-Chilena3-1-o97o44q7dd5ul6g0detpckp6t9n1dpm07atdssp456.jpg">
            <span class="card-title"><i class="tiny material-icons">access_time</i>&nbsp 12 Jun 2019</span>
          </div>
          <div class="card-content">
            <p><b>Gran interés despertó clases de lengua de señas chilena [...]</b></p>
          </div>
        </div>
      </div>
      
      <div class="col s12 m12 l3">
        <div class="card">
          <div class="card-image">
            <img src="http://portal.ucm.cl//content/uploads/bfi_thumb/Mesas-PARI_sillas1.ucm_-o97nxrdl1sfvwbp5knoqg6kpv91h7kbhzrmwpa56be.jpg">
            <span class="card-title"><i class="tiny material-icons">access_time</i>&nbsp 12 Jun 2019</span>
          </div>
          <div class="card-content">
            <p><b>Estudiantes con discapacidad física recibieron [...]</b></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="page-footer" style="background-color: #001740;">
    <div class="container">
      <div class="row">
        <div class="col l2 s12">
          <br>
          <img src="/images/logo-footer_nuevo.png"> 
        </div>
        <div class="col l4 offset-l2 s12">
          <ul>
            <p class="grey-text text-lighten-4"><small>Campus San Miguel, Avenida San Miguel 3605,<br>Talca.<br>Teléfono: +56712203100</small></p>
            <p class="grey-text text-lighten-4"><small>Campus Nuestra Señora del Carmen, Carmen 684,<br> Curicó.<br>Teléfono: +56752203100</small></p>
            <p class="grey-text text-lighten-4"><small>Campus San Isidro - km. 6 Los Niches, Curicó.<br>Teléfono: +56752203583</small></p>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <div class="links"> {{-- Enlaces de la parte inferior --}}
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l3">
          <a href="" target="" title="Logo 5 Años acreditada por gestión institucional, Docencia de pregrado y vinculación con el medio desde el 2015 al 2020">
            <img src="http://portal.ucm.cl//content/uploads/2016/10/logo-1.png" alt="Logo 5 Años acreditada por gestión institucional, Docencia de pregrado y vinculación con el medio desde el 2015 al 2020"/>
          </a>
        </div>
        
        <div class="col s12 m12 l3">
          <a href="http://www.consejoderectores.cl" target="_blank" title="Logo Consejo de rectores de las universidades chilenas">
            <img src="http://portal.ucm.cl//content/uploads/2016/10/logo-4.png" alt="Logo Consejo de rectores de las universidades chilenas"/>
          </a>
        </div>

        <div class="col s12 m12 l2">
          <a href="http://redg9.cl" target="_blank" title="Logo universidades públicas no estatales">
            <img src="http://portal.ucm.cl//content/uploads/2016/10/logo-3.png" alt="Logo universidades públicas no estatales"/>
          </a>
        </div>
        
        <div class="col s12 m12 l2">
          <a href="http://www.auregionales.cl" target="_blank" title="">
            <img src="http://portal.ucm.cl//content/uploads/2016/10/logo-2.png" alt=""/>
          </a>
        </div>
        <div class="col s12 m12 l1">
          <a href="https://www.questionpro.com/a/showEntry.do?uID=2595" target="_blank" title="Aplicación para crear encuestas On Line">
            <img src="http://portal.ucm.cl//content/uploads/2017/12/question_pro.png" alt="Aplicación para crear encuestas On Line"/>
          </a>
        </div>
      </div>
    </div>
  </div>

@endsection

{{-- Agregamos los scripts para todos los elementos que utilicen JQuery al final para ayudar en tiempos de carga --}}
@section('scripts')
  <script src={{ asset('js/nav_scripts.js') }}></script>
@endsection
