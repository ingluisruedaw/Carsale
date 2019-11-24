<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require('modelo/Login/redirigir.php');
  }

?>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="estilos/materialize/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
<link href="estilos/materialize/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

<body>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="estilos/materialize/js/materialize.min.js"></script>

    <?php include 'views/Dashboard/Loading.php';?>

    <div id="media-slider">
      <div class="slider">
        <ul class="slides" >
          <li class="active" style="opacity: 1; transform: translateX(0px) translateY(0px);">
            <img src="images/CF3.jpg" alt="img-1">
            <div class="caption center-align" style="opacity: 1; transform: translateY(0px) translateX(0px);"></div>
          </li>
          
          <li class="" style="opacity: 0; transform: translateX(0px) translateY(0px);">
            <img src="images/car.jpg" alt="img-2">
            <div class="caption left-align" style="opacity: 0; transform: translateX(-100px) translateY(0px);"></div>
          </li>

          <li class="" style="opacity: 0; transform: translateX(0px) translateY(0px);">
            <img src="images/carro.jpg" alt="img-3">
            <div class="caption right-align" style="opacity: 0; transform: translateX(100px) translateY(0px);"></div>
          </li>

          <li class="" style="opacity: 0; transform: translateX(0px) translateY(0px);">
            <img src="images/carslider.jpg" alt="img-4">
            <div class="caption center-align" style="opacity: 0; transform: translateY(-100px) translateX(0px);"></div>
          </li>

          <li class="" style="opacity: 0; transform: translateX(0px) translateY(0px);">
            <img src="images/carro3.jpg" alt="img-4">
            <div class="caption center-align" style="opacity: 0; transform: translateY(-100px) translateX(0px);"></div>
          </li>

        </ul>
      </div>
    </div>
  



  <div class="container">
    <div class="section">

    <div>
      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">Quienes Somos</h5>

            <p class="light" align="justify">Somos Una Empresa Que Desde Sus Inicios Se Ha Dedicado Siempre A La Compraventa De Vehículos De Alta Y Baja Gama, Desde Nuestros Inicios Nuestro Lema Ha Sido La Calidad.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center">Nuestra Experiencia</h5>

            <p class="light" align="justify">Llevar Más De 5 Años En El Mercado De La Compraventa De Vehículos Nos Hacer Tener La Suficiente Experiencia Para Ofrecerte Lo Mejor De Nuestro Portafolio</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center">Donde Ubicarnos</h5>

            <p class="light" align="justify">Estamos Ubicados En El Caribe Colombiano, En La Ciudad De Barranquilla Puedes Ubicarnos En El Barrio Prado</p>
          </div>
        </div>
      </div>

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">thumb_up</i></h2>
            <h5 class="center">Comparte En Facebook</h5>
            <p class="light" align="justify">Si te ha gustado nuestro portal web te invitamos a que compartas este sitio en tu muro de Facebook <a href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);var dir2= encodeURIComponent(dir);window.location.href=('http://www.facebook.com/share.php?u='+dir2+'&amp;t='+tit2+'');">AQUI</a></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">thumb_up</i></h2>
            <h5 class="center">Comparte En Google Plus</h5>
            <p class="light" align="justify">Si te ha gustado nuestro portal web te invitamos a que compartas este sitio en tu muro de Google Plus <a href="javascript:window.location.href='https://plus.google.com/share?url='+encodeURIComponent(location);void0;">AQUI</a></p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">thumb_up</i></h2>
            <h5 class="center">Comparte En Twitter</h5>
            <p class="light" align="justify">Si te ha gustado nuestro portal web te invitamos a que compartas este sitio en tu Twitter <a href="javascript:var dir=window.document.URL;var tit=window.document.title;var tit2=encodeURIComponent(tit);window.location.href=('http://twitter.com/?status='+tit2+'%20'+dir+'');">AQUI</a></p>
          </div>
        </div>
      </div>
    </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="estilos/materialize/js/materialize.js"></script>
  <script src="estilos/materialize/js/init.js"></script> 

  <!-- jQuery Library -->
    <script type="text/javascript" src="estilos/dashboard/js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="estilos/dashboard/js/materialize.js"></script>
    <!--prism-->
    <script type="text/javascript" src="estilos/dashboard/js/prism.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!-- chartist -->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/chartist-js/chartist.min.js"></script>   
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>


</body>
