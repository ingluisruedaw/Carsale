<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['rol']==1) {
    }else{
      require('modelo/Login/redirigir.php');
    }
  }else {
    header('Location: ?action=inicio');
    exit;
  }

  $now = time();
  if($now > $_SESSION['expire']) {
    session_unset();
    session_destroy();
    echo"<script type=\"text/javascript\">alert('Su sesion a terminado'); window.location='?action=inicio';</script>";
    exit;
  }
?>

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
<!-- Start Page Loading -->
<?php include 'views/Dashboard/Loading.php';?>
<!-- End Page Loading -->

<!-- START HEADER -->
<?php include 'views/Dashboard/Header.php';?>
<!-- END HEADER -->

<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">

    <!-- START LEFT SIDEBAR NAV-->
    <?php include 'views/Dashboard/AsideLateral.php';?>
    <!-- END LEFT SIDEBAR NAV-->

    <!-- START CONTENT -->
    <section id="content" >
      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Insertar Usuario</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Usuarios">Usuarios</a></li>
                <li id="white" class="active">Insertar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->


      <div id="login-page" class="row" align="center">
        <div class="col s12" >
        <br>
          <form class="login-form" action="?action=Usuarios_registrar" method="post" id="oscurecer">

            <div class="row margin">
              <div class="input-field col s12">
                <input type="text" id="white" name="usuario" value="<?php echo $almUsuarios->__GET('usuario'); ?>" maxlength="20" length="20" required/>
                <label for="usuario">Usuario</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <input type="password" id="white" name="clave" value="<?php echo $almUsuarios->__GET('clave'); ?>" maxlength="100" length="100" required/>
                <label for="clave">Clave</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="persona">
                  <?php foreach($modelPersona->Listar() as $r): ?>
                    <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?>                          
                    </option>
                  <?php endforeach; ?>
                </select>
                <label>Persona</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
              <select name="rol">
                          <?php foreach($modelRoles->Listar() as $r): ?>
                            <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                          <?php endforeach; ?>
                        </select>
                        <label>Rol</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
              <select name=estado>
                          <option value="1">ACTIVO</option>
                          <option value="2">INACTIVO</option>
                        </select>
                        <label>Estado</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
              <button type="reset" class="waves-effect waves-light btn col s12 cyan">Limpiar</button>                 
              </div>

              <div class="input-field col s12">
                 <button type="submit" class="waves-effect waves-light btn col s12 cyan">Guardar</button>
              </div>
            </div>
            <br>
          </form>
          <br>
        </div>
      </div>
  </div><!-- END WRAPPER -->
</div><!-- END MAIN -->

<br><br><br><br><br><br><br>
<!-- START FOOTER -->
<?php include 'views/Dashboard/Footer.php';?>
<!-- END FOOTER -->

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

<!-- chartist -->
<script type="text/javascript" src="estilos/dashboard/js/plugins/chartist-js/chartist.min.js"></script>   
    
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>
    
<script type="text/javascript">
  var singleValues = $( "#single" ).val();
  $(document).ready(function() {
    $('select').material_select();
  });
</script>