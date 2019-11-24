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

  if ($_REQUEST['id']==null) {
  	header('Location: ?action=Admin_Ventas_Reporte');
  }else{
    $obventa = $modelVentas -> Obtener($_REQUEST['id']);//obtengo el objeto ventas

    $totegresos=0;
  	//$obj=$modelUsuarios->Obtener_reporte($_REQUEST['usuario']);
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
              			<h5 id="white" class="breadcrumbs-title">Reporte Detalle De Venta</h5>
              			<ol class="breadcrumb">
                			<li><a href="?action=administrador">Administrador</a></li>
                			<li><a href="?action=Admin_Ventas_Reporte">Ventas</a></li>
                			<li  id="white" class="active">Reporte</li>
              			</ol>
            		</div>
          		</div>
        	</div>
      	</div><!--breadcrumbs end-->

      	<div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m12 l6">
                	<div class="card-panel">
                    	<h4 class="header2" align="center" style="font-weight: bold;">Datos Del Vehículo</h4>
                    	<div class="row">
                      		<form class="col s12">
                        		<div class="row">
                          			<div class="input-field col s12">
                            			<input name="id" type="text" value="<?php echo $obventa->__GET('carros_id'); ?>" readonly>
                            			<label for="id" class="">Placa</label>
                          			</div>
                        		</div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="marca" type="text" value="<?php echo $obventa->__GET('carro_marca'); ?>" readonly>
                                  <label for="marca" class="">Marca</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="modelo" type="text" value="<?php echo $obventa->__GET('carro_modelo'); ?>" readonly>
                                  <label for="modelo" class="">Modelo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="anio" type="text" value="<?php echo $obventa->__GET('anio'); ?>" readonly>
                                  <label for="anio" class="">Año</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="color" type="text" value="<?php echo $obventa->__GET('color'); ?>" readonly>
                                  <label for="color" class="">Color</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="tipo" type="text" value="<?php echo $obventa->__GET('carro_tipo'); ?>" readonly>
                                  <label for="tipo" class="">Tipo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="transmision" type="text" value="<?php echo $obventa->__GET('transmision'); ?>" readonly>
                                  <label for="transmision" class="">Transmision</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="direccion" type="text" value="<?php echo $obventa->__GET('direccion'); ?>" readonly>
                                  <label for="direccion" class="">Direccion</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="combustible" type="text" value="<?php echo $obventa->__GET('combustible'); ?>" readonly>
                                  <label for="combustible" class="">Combustible</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="cilindraje" type="text" value="<?php echo $obventa->__GET('cilindraje'); ?>" readonly>
                                  <label for="cilindraje" class="">Cilindraje</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="km" type="text" value="<?php echo $obventa->__GET('km'); ?>" readonly>
                                  <label for="km" class="">Km</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="motor" type="text" value="<?php echo $obventa->__GET('motor'); ?>" readonly>
                                  <label for="motor" class="">Motor</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="ciudad" type="text" value="<?php echo $obventa->__GET('carro_ciudad'); ?>" readonly>
                                  <label for="ciudad" class="">Ciudad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="departamento" type="text" value="<?php echo $obventa->__GET('carro_departamento'); ?>" readonly>
                                  <label for="departamento" class="">Departamento</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="pais" type="text" value="<?php echo $obventa->__GET('carro_pais'); ?>" readonly>
                                  <label for="pais" class="">Pais</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="pais" type="text" value="<?php echo $obventa->__GET('pcompra'); ?>" readonly>
                                  <label for="pais" class="">Precio Compra</label>
                                </div>
                            </div>
		                        
                      		</form>
                    	</div>
                  	</div>
                </div>

                <div class="col s12 m12 l6">
                	<div class="card-panel">
                    	<h4 class="header2" align="center" style="font-weight: bold;">Datos Del Comprador</h4>
                    	<div class="row">
                      		<form class="col s12">

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="propietario" type="text" value="<?php echo $obventa->__GET('cliente_id'); ?>" readonly>
                                  <label for="propietario" class="">Id</label>
                                </div>
                            </div>
                        
		                        <div class="row">
                                <div class="input-field col s12">
                                  <input name="nombres" type="text" value="<?php echo $obventa->__GET('cliente_nombres'); ?>" readonly>
                                  <label for="nombres" class="">Nombres</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="direccion" type="text" value="<?php echo $obventa->__GET('cliente_direccion'); ?>" readonly>
                                  <label for="direccion" class="">Direccion</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="barrio" type="text" value="<?php echo $obventa->__GET('cliente_barrio'); ?>" readonly>
                                  <label for="barrio" class="">Barrio</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="ciudad" type="text" value="<?php echo $obventa->__GET('cliente_ciudad'); ?>" readonly>
                                  <label for="ciudad" class="">Ciudad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="departamento" type="text" value="<?php echo $obventa->__GET('cliente_departamento'); ?>" readonly>
                                  <label for="departamento" class="">Departamento</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="pais" type="text" value="<?php echo $obventa->__GET('cliente_pais'); ?>" readonly>
                                  <label for="pais" class="">Pais</label>
                                </div>
                            </div>

                      		</form>
                    	</div>
                  	</div>
                </div>

                <div class="col s12 m12 l6">
                  <div class="card-panel">
                      <h4 class="header2" align="center" style="font-weight: bold;">Datos Del Vendedor</h4>
                      <div class="row">
                          <form class="col s12">

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="propietario" type="text" value="<?php echo $obventa->__GET('ant_prop_id'); ?>" readonly>
                                  <label for="propietario" class="">Id</label>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="nombres" type="text" value="<?php echo $obventa->__GET('ant_prop_nombres'); ?>" readonly>
                                  <label for="nombres" class="">Nombres</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="ciudad" type="text" value="<?php echo $obventa->__GET('ant_prop_ciudad'); ?>" readonly>
                                  <label for="ciudad" class="">Ciudad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="departamento" type="text" value="<?php echo $obventa->__GET('ant_prop_departamento'); ?>" readonly>
                                  <label for="departamento" class="">Departamento</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="pais" type="text" value="<?php echo $obventa->__GET('ant_prop_pais'); ?>" readonly>
                                  <label for="pais" class="">Pais</label>
                                </div>
                            </div>

                          </form>
                      </div>
                    </div>
                </div>

                <div class="col s12 m12 l6">
                  <div class="card-panel">
                      <h4 class="header2" align="center" style="font-weight: bold;">Datos Economicos</h4>
                      <div class="row">
                          <form class="col s12">

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="propietario" type="text" value="<?php echo $obventa->__GET('total'); ?>" readonly>
                                  <label for="propietario" class="">Precio Venta</label>
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
                		<h4 class="header2" align="center" style="font-weight: bold;">EGRESOS</h4>
                    	<div class="row">
                      		<form class="col s12">
                              <div class="row">
                                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                    <thead>
                                      <tr>
                                        <th style="text-align: center;">Id</th>
                                        <th style="text-align: center;">Tipo</th>
                                        <th style="text-align: center;">Detalle</th>
                                        <th style="text-align: center;">Fecha</th>
                                        <th style="text-align: center;">Valor</th>                                      
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach($modelEgresos->Obtener($_REQUEST['id']) as $r): ?>
                                        <tr>
                                          <td style="text-align: center;"><?php echo $r->__GET('id'); ?></td>
                                          <td style="text-align: center;"><?php echo $r->__GET('tipo'); ?></td>
                                          <td style="text-align: center;"><?php echo $r->__GET('detalle'); ?></td>
                                          <td style="text-align: center;"><?php echo $r->__GET('fecha'); ?></td>
                                          <td style="text-align: center;"><?php echo "$ ".number_format($r->__GET('valor'), 2, '.', ','); ?></td>
                                          <?php $totegresos=$totegresos+$r->__GET('valor'); ?>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                    <tr>
                                      <td colspan="3"></td>
                                      <td style="text-align: right;font-size: 20px;font-weight: bold;">Total: </td>
                                      <td colspan="5" style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo "$ ".number_format($totegresos, 2, '.', ','); ?></td>
                                    </tr>
                                  </table>
                              </div>
                          </form>
	                	  </div>
                	</div>
            	</div>

            	<div class="row">
                  <div class="card-panel">
                    <h4 class="header2" align="center" style="font-weight: bold;">ESTADO FINANCIERO EGRESOS</h4>
                      <div class="row">
                          
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="card-panel">
                    <h4 class="header2" align="center" style="font-weight: bold;">ESTADO FINANCIERO</h4>
                      <div class="row">
                          
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="card-panel">
                    <h4 class="header2" align="center" style="font-weight: bold;">DOCUMENTACION</h4>
                      <div class="row">
                          
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