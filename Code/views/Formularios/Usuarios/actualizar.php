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

  if ($_REQUEST['usuario']==null) {
    header('Location: ?action=Usuarios');
  }else{
    $obj=$modelUsuarios->Obtener($_REQUEST['usuario']);
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
              <h5 id="white" class="breadcrumbs-title">Formulario Actualizar Usuario</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Usuarios">Usuarios</a></li>
                <li id="white" class="active">Actualizar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->

      <div id="login-page" class="row" align="center">
        <div class="col s12" >
          <br>
          <form class="login-form" method="post" id="oscurecer">
            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="usuario" value="<?php echo $_REQUEST['usuario']; ?>" maxlength="20" length="20" readonly/>
                <label for="usuario">Usuario</label>
              </div>
            </div>
          </form>
          
          <br>
          <div class="row">
            <div id="login-page" class="row" align="center">            
              <form class="login-form" action="?action=Usuarios_Actualizar_Clave" method="post" id="oscurecer">
                
                <div class="row">
                  <div class="input-field col s12 center">
                    <img src="images/user.png" alt="" class="circle responsive-img valign profile-image-login">
                    <p id="white" class="center login-form-text">Actualizar Clave</p>
                  </div>
                </div>

                <div class="row margin">
                  <div class="input-field col s12">
                    <input type="hidden" name="usuario" value="<?php echo $_REQUEST['usuario']; ?>">
                    <input type="text" name="clave" id="white">
                    <label for="clave">clave</label>
                  </div>
                </div>

                <div class="row margin">
                  <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn col s12 cyan">Actualizar</button>
                  </div>
                </div>
                <br>
              </form>
              <br>
            </div>
          </div>

          <br>
          <div class="row">
            <div id="login-page" class="row" align="center">            
              <form class="login-form" action="?action=Usuarios_Actualizar" method="post" id="oscurecer">
                <input type="hidden" name="usuario" value="<?php echo $_REQUEST['usuario']; ?>">
                
                <div class="row">
                  <div class="input-field col s12 center">
                    <img src="images/user.png" alt="" class="circle responsive-img valign profile-image-login">
                    <p id="white" class="center login-form-text">Actualizar Usuario</p>
                  </div>
                </div>

                <div class="row margin">
                  <div class="input-field col s12" id="white">
                    <select name="persona">
                      <?php foreach($modelPersona->Listar() as $r): 
                        if ($obj->__GET('persona')==$r->__GET('id')) {?>
                          <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('id');?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
                        <?php } endforeach; ?>
                    </select>
                    <label>Persona</label>
                  </div>
                </div>

                <div class="row margin">
                  <div class="input-field col s12" id="white">
                    <select name="rol">
                      <?php foreach($modelRoles->Listar() as $r): 
                        if ($obj->__GET('rol')==$r->__GET('id')) {?>
                          <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('det');?></option>
                        <?php }else{ ?>
                          <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                      <?php } endforeach; ?>
                    </select>
                    <label>Rol</label>
                  </div>
                </div>

                <div class="row margin">
                  <div class="input-field col s12" id="white">
                    <select name=estado>                      
                      <?php if ($obj->__GET('estado')==1) {?>
                        <option value="1" selected>ACTIVO</option>
                        <option value="2">INACTIVO</option>
                      <?php }else{?>
                        <option value="1">ACTIVO</option>
                        <option value="2" selected>INACTIVO</option>
                      <?php } ?>
                    </select>
                    <label>Estado</label>
                  </div>
                </div>

                <div class="row margin">
                  <div class="input-field col s12">
                    <button type="submit" class="waves-effect waves-light btn col s12 cyan">Actualizar</button>
                  </div>
                </div>
                <br>
              </form>
              <br>
            </div>
          </div>
        </div>
        
      </div>

  </div><!-- END WRAPPER -->
</div><!-- END MAIN -->

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