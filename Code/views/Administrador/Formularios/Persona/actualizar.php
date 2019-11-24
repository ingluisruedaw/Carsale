<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['rol']==2) {
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

  if($_REQUEST['id']==null){
      header('Location: ?action=Admin_Personas_Reporte');
  }else{
  	$obj=$modelPersona->Obtener($_REQUEST['id']);
  }
?>

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- Start Page Loading -->
<?php include 'views/Dashboard/Loading.php';?>
<!-- End Page Loading -->

<!-- START HEADER -->
<?php include 'views/Administrador/Header.php';?>
<!-- END HEADER -->

<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">

    <!-- START LEFT SIDEBAR NAV-->
    <?php include 'views/Administrador/AsideLateral.php';?>
    <!-- END LEFT SIDEBAR NAV-->

    <!-- START CONTENT -->
    <section id="content" class="white">
      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Actualizar Persona</h5>
              <ol class="breadcrumb">
                <li><a href="?action=administrador">Administrador</a></li>
                <li><a href="?action=Admin_Personas_Reporte">Personas</a></li>
                <li id="white" class="active">Actualizar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->
      
      <div class="container">
        <div class="section container">
          <div class="divider"></div>
          <!--Input fields-->
          <div id="input-fields">
            <div class="col s12 m8 l9">
              <form class="col s12" action="?action=<?php echo 'Persona_Actualizar'; ?>" method="post">

                <div class="input-field col s12">
                  <input type="text" name="id" value="<?php echo $_REQUEST['id']; ?>" readonly/>
                  <label for="id">Id</label>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                    <input type="text" name="nombres" value="<?php echo $obj->__GET('nombres'); ?>" maxlength="45" length="45" required/>
                    <label for="nombres">Nombres</label>
                  </div>

                  <div class="input-field col s6">
                    <input type="text" name="apellidos" value="<?php echo $obj->__GET('apellidos'); ?>" maxlength="45" length="45" required/>
                    <label for="apellidos">Apellidos</label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s6">
                    <select name=sexo>
                    <?php 
                    	if ($obj->__GET('sexo')==1) {?>
                    		<option value="1" selected>Masculino</option>
                      		<option value="2">Femenino</option>
                    	<?php }else{ ?>
                    		<option value="1">Masculino</option>
                      		<option value="2" selected>Femenino</option>
                    	<?php } ?>
                      
                    </select>
                    <label>Sexo</label>
                  </div>

                  <div class="input-field col s6">
                    <input type="email" name="email" value="<?php echo $obj->__GET('email'); ?>" maxlength="50" length="50" class="validate"/>
                    <label for="sape">Email</label>
                  </div>
                </div>

                <div class="row">             
                  <div class="input-field col s6">
                    <input type="text" name="direccion" value="<?php echo $obj->__GET('direccion'); ?>" maxlength="45" length="45" required/>
                    <label for="direccion">Dirección</label>
                  </div>

                  <div class="input-field col s6">
                    <input type="text" name="barrio" value="<?php echo $obj->__GET('barrio'); ?>" maxlength="45" length="45" required/>
                    <label for="barrio">Barrio</label>
                  </div>
                </div>

                <div class="input-field col s12">
                  <select name="ciudad">
                    <?php foreach($modelCiudad->Listar() as $r): 
                    	if ($obj->__GET('ciudad')==$r->__GET('id')) {?>
                    		<option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('det');?></option>
                    	<?php }else{?>
                    		<option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                      
                    <?php } endforeach; ?>
                  </select>
                  <label>Ciudad</label>
                </div>

                <div class="row">
                  <button type="submit" class="waves-effect waves-light btn col s12 cyan">Actualizar</button>
                </div>
              </form>             
            </div>
          </div>       
        </div>
      </div><!--end container-->
    </section><!-- END CONTENT -->
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