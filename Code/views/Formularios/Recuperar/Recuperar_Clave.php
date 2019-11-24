<?php 
  if (!isset($_SESSION)) session_start();
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    require('modelo/Login/redirigir.php');
  }

?>

  <!-- CORE CSS-->
  <link href="estilos/dashboard/css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">

  <link href="estilos/recuperar.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body BGPROPERTIES="fixed">
  <!-- Start Page Loading -->
  <?php include 'views/Dashboard/Loading.php';?>
  <!-- End Page Loading -->

  <div id="login-page" class="row">
    <div id="oscurecer" class="col s12 z-depth-4 card-panel">
      <form class="login-form" action="?action=recuperar_clave_correo" method="post" id="myForm">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="images/user.png" alt="" class="circle responsive-img valign profile-image-login">
            <p id="white" class="center login-form-text">Recuperar Clave</p>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="white" name="usuario" id="usuario" type="text" required>
            <label for="usuario" class="center-align" required>Usuario</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="white" name="persona" id="persona" type="text" required>
            <label for="persona" class="center-align" required># Documento</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="white" name="nombres" id="nombres" type="text" required>
            <label for="nombres" class="center-align" required>Nombres</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="white" name="apellidos" id="apellidos" type="text" required>
            <label for="apellidos" class="center-align" required>Apellidos</label>
          </div>
        </div>

        <div class="row">
          <div class="input-field col s6">
            <a id="limpiar" type="reset" class="btn waves-effect waves-light col s12 cyan" onclick="myFunction()">Limpiar</a>
          </div>

          <div class="input-field col s6">
              <button type="submit" class="waves-effect waves-light btn col s12 cyan">Restablecer</button>
            </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <p id="white" class="margin center medium-small sign-up">Tienes Una Cuenta? <a href="?action=login">Login</a></p>
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

  <script>
function myFunction() {
    document.getElementById("myForm").reset();
}
</script>