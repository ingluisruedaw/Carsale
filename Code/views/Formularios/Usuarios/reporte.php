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
    $objusuario = $modelUsuarios->Obtener($_REQUEST['usuario']);
    $objpersona = $modelPersona->Obtener($objusuario->__GET('persona'));
    $objCiudad = $modelCiudad->Obtener($objpersona->__GET('ciudad'));    
    $objDepartamento = $modelDepartamento->Obtener($objCiudad->__GET('depto'));
    $objPais = $modelPais->Obtener($objDepartamento->__GET('pais'));
  }
?>
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
    <section id="content" class="white">
      	<!--breadcrumbs start-->
      	<div id="breadcrumbs-wrapper" class=" grey lighten-3">
        	<div class="container">
        		<div class="row">
            		<div class="col s12 m12 l12">
              			<h5 class="breadcrumbs-title">Reporte Usuario</h5>
              			<ol class="breadcrumb">
                			<li><a href="?action=webmaster">Dashboard</a></li>
                			<li><a href="?action=Usuarios">Usuarios</a></li>
                			<li class="active">Reporte</li>
              			</ol>
            		</div>
          		</div>
        	</div>
      	</div><!--breadcrumbs end-->

      	<div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m12 l6">
                	<div class="card-panel">
                    	<h4 class="header2" align="center">Datos De Usuario</h4>
                    	<div class="row">
                      		<form class="col s12">
                        		<div class="row">
                          			<div class="input-field col s12">
                            			<input name="usuario" type="text" value="<?php echo $_REQUEST['usuario']; ?>" readonly>
                            			<label for="usuario" class="">Usuario</label>
                          			</div>
                        		</div>

		                        <div class="row">
		                        	<div class="input-field col s12">
		                            	<input name="rol" type="text" value="<?php 
                                    if($objusuario->__GET('rol')==1){
                                      echo "SUPERUSUARIO";
                                    }elseif ($objusuario->__GET('rol')==2) {
                                      echo "ADMINISTRADOR";
                                    }elseif ($objusuario->__GET('rol')==3) {
                                      echo "SECRETARIA";
                                    }elseif ($objusuario->__GET('rol')==4) {
                                      echo "VENDEDOR";
                                    }

                                      ; ?>" readonly>
		                            	<label for="email">Rol</label>
		                          	</div>
		                        </div>

		                        <div class="row">
		                          	<div class="input-field col s12">
		                            	<input name="idpersona" type="text" value="<?php echo $objusuario->__GET('persona'); ?>" readonly>
		                            	<label for="idpersona">Persona</label>
		                          	</div>
		                        </div>
                      		</form>
                    	</div>
                  	</div>
                </div>

                <div class="col s12 m12 l6">
                	<div class="card-panel">
                    	<h4 class="header2" align="center">Datos Personales</h4>
                    	<div class="row">
                      		<form class="col s12">
                        
		                        <div class="row">
		                          	<div class="input-field col s12">
		                            	<input name="nombres" type="text" value="<?php echo $objpersona->__GET('nombres')." ".$objpersona->__GET('apellidos'); ?>" readonly>
		                            	<label for="nombres">Nombres Y Apellidos</label>
		                          	</div>
		                        </div>

		                        <div class="row">
		                          	<div class="input-field col s12">
		                            	<input name="sexo" type="text" value="<?php if($objpersona->__GET('sexo')==1){ echo "MASCULINO";}else{ echo "FEMENINO";} ?>" readonly>
		                            	<label for="sexo">Sexo</label>
		                          	</div>
		                        </div>

		                        <div class="row">
		                          	<div class="input-field col s12">
		                            	<input name="email" type="text" value="<?php echo $objpersona->__GET('email'); ?>" readonly>
		                            	<label for="email">Email</label>
		                          	</div>
		                        </div>
                      		</form>
                    	</div>
                  	</div>
                </div>
            </div>
        </div><!--END BASIC FORMS-->

      	<!--start container-->
      	<div class="container">
        	<div class="section container">
          		<div class="divider"></div>

            	<div class="row">
                	<div class="card-panel">
                		<h4 class="header2" align="center">DATOS DE UBICACIÓN</h4>
                    	<div class="row">
                      		<form class="col s12">
                      			<input type="hidden" name="usuario" value="<?php echo $_REQUEST['usuario']; ?>">

	                        	<div class="row">
		                        	<div class="input-field col s12">
		                            	<input name="pais" type="text" value="<?php echo $objPais->__GET('det'); ?>" readonly>
		                            	<label for="pais">Pais</label>
		                          	</div>
		                        </div>

	                        	<div class="row">
		                        	<div class="input-field col s12">
		                            	<input name="departamento" type="text" value="<?php echo $objDepartamento->__GET('det'); ?>" readonly>
		                            	<label for="departamento">Departamento</label>
		                          	</div>
		                        </div>

	                        	<div class="row">
		                        	<div class="input-field col s12">
		                            	<input name="ciudad" type="text"  value="<?php echo $objCiudad->__GET('det'); ?>" readonly>
		                            	<label for="ciudad">Ciudad</label>
		                          	</div>
		                        </div>

	                        	<div class="row">
		                        	<div class="input-field col s12">
		                            	<input name="barrio" type="text" value="<?php echo $objpersona->__GET('barrio'); ?>" readonly>
		                            	<label for="barrio">Barrio</label>
		                          	</div>
		                        </div>

		                        <div class="row">
		                        	<div class="input-field col s12">
		                            	<input name="direccion" type="text" value="<?php echo $objpersona->__GET('direccion'); ?>" readonly>
		                            	<label for="direccion">Direccion</label>
		                          	</div>
		                        </div>
	                    	</form>
	                	</div>
                	</div>
            	</div>
        	</div><!--section container-->
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