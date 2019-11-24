<?php 
  session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require('modelo/Login/redirigir.php');
  }
 
?>
  <!-- CORE CSS-->
  <link href="estilos/dashboard/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="estilos/login.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body BGPROPERTIES="fixed">
  <!-- Start Page Loading -->
  <?php include 'views/Dashboard/Loading.php';?>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div id="oscurecer" class="col s12 z-depth-4 card-panel" >
      <form class="login-form" action="?action=logeo" method="post">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/user.png" alt="" class="circle responsive-img valign profile-image-login">
            <p id="white" class="center login-form-text">Acceso Al Sistema</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="white" name="username" id="username" type="text" required>
            <label for="username" class="center-align">Usuario</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="white" name="password" id="password" type="password" required>
            <label for="password">Clave</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
          <button id="enviar" type="reset" class="waves-effect waves-light btn col s12 cyan">Limpiar</button>
          </div>

          <div class="input-field col s6">
            <button type="submit" class="waves-effect waves-light btn col s12 cyan">Ingresar</button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small" align="left"><a href="?action=inicio">Home (Inicio) ?</a></p>
          </div>  

          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small" align="right"><a href="?action=Recuperar_Clave">Restablecer Clave ?</a></p>
          </div>          
        </div>

      </form>
    </div>
  </div>



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="estilos/dashboard/js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="estilos/dashboard/js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="estilos/dashboard/js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="estilos/dashboard/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>