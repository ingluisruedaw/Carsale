<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['rol']==3) {
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
  	header('Location: ?action=Ventas');
  }else{
    $objCarro = $modelCarros->Obtener($_REQUEST['id']);
    $objMarca = $modelMarca->Obtener($objCarro->__GET('marca'));
    $objTipo = $modelTipo_carro->Obtener($objCarro->__GET('tipo'));

    $objPropietario = $modelPersona->Obtener($objCarro->__GET('propietario'));
    $objCiudad = $modelCiudad->Obtener($objPropietario->__GET('ciudad'));
    $objDepartamento = $modelDepartamento->Obtener($objCiudad->__GET('depto'));
    $objPais = $modelPais->Obtener($objDepartamento->__GET('pais'));
    $objModelo = $modelModelos->Obtener_Modelos($objCarro->__GET('modelo'));

    $objCiudadVehiculo = $modelCiudad->Obtener($objCarro->__GET('ciudad'));
    $objDepartamentoVehiculo = $modelDepartamento->Obtener($objCiudadVehiculo->__GET('depto'));
    $objPaisVehiculo = $modelPais->Obtener($objDepartamentoVehiculo->__GET('pais'));

    $totegresos=0;
  	//$obj=$modelUsuarios->Obtener_reporte($_REQUEST['usuario']);
  }
?>
<!-- Start Page Loading -->
<?php include 'views/Dashboard/Loading.php';?>
<!-- End Page Loading -->

<!-- START HEADER -->
<?php include 'views/Secretaria/Header.php';?>
<!-- END HEADER -->

<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">

    <!-- START LEFT SIDEBAR NAV-->
    <?php include 'views/Secretaria/AsideLateral.php';?>
    <!-- END LEFT SIDEBAR NAV-->

    <!-- START CONTENT -->
    <section id="content" class="white">
      	<!--breadcrumbs start-->
      	<div id="breadcrumbs-wrapper" class=" grey lighten-3">
        	<div class="container">
        		<div class="row">
            		<div class="col s12 m12 l12">
              			<h5 class="breadcrumbs-title">Reporte Ventas</h5>
              			<ol class="breadcrumb">
                			<li><a href="?action=secretaria">Secretaria</a></li>
                			<li><a href="?action=Secretaria_Ventas">Ventas</a></li>
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
                    	<h4 class="header2" align="center" style="font-weight: bold;">Datos Del Vehículo</h4>
                    	<div class="row">
                      		<form class="col s12">
                        		<div class="row">
                          			<div class="input-field col s12">
                            			<input name="id" type="text" value="<?php echo $_REQUEST['id']; ?>" readonly>
                            			<label for="id" class="">Placa</label>
                          			</div>
                        		</div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="marca" type="text" value="<?php echo $objMarca->__GET('det'); ?>" readonly>
                                  <label for="marca" class="">Marca</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="modelo" type="text" value="<?php echo $objModelo->__GET('det'); ?>" readonly>
                                  <label for="modelo" class="">Modelo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="anio" type="text" value="<?php echo $objCarro->__GET('anio'); ?>" readonly>
                                  <label for="anio" class="">Año</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="color" type="text" value="<?php echo $objCarro->__GET('color'); ?>" readonly>
                                  <label for="color" class="">Color</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="tipo" type="text" value="<?php echo $objTipo->__GET('det'); ?>" readonly>
                                  <label for="tipo" class="">Tipo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="transmision" type="text" value="<?php echo $objCarro->__GET('transmision'); ?>" readonly>
                                  <label for="transmision" class="">Transmision</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="direccion" type="text" value="<?php echo $objCarro->__GET('direccion'); ?>" readonly>
                                  <label for="direccion" class="">Direccion</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="combustible" type="text" value="<?php echo $objCarro->__GET('combustible'); ?>" readonly>
                                  <label for="combustible" class="">Combustible</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="cilindraje" type="text" value="<?php echo $objCarro->__GET('cilindraje'); ?>" readonly>
                                  <label for="cilindraje" class="">Cilindraje</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="km" type="text" value="<?php echo $objCarro->__GET('km'); ?>" readonly>
                                  <label for="km" class="">Km</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="motor" type="text" value="<?php echo $objCarro->__GET('motor'); ?>" readonly>
                                  <label for="motor" class="">Motor</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="ciudad" type="text" value="<?php echo $objCiudadVehiculo->__GET('det'); ?>" readonly>
                                  <label for="ciudad" class="">Ciudad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="departamento" type="text" value="<?php echo $objDepartamentoVehiculo->__GET('det'); ?>" readonly>
                                  <label for="departamento" class="">Departamento</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="pais" type="text" value="<?php echo $objPaisVehiculo->__GET('det'); ?>" readonly>
                                  <label for="pais" class="">Pais</label>
                                </div>
                            </div>
		                        
                      		</form>
                    	</div>
                  	</div>
                </div>

                <div class="col s12 m12 l6">
                	<div class="card-panel">
                    	<h4 class="header2" align="center" style="font-weight: bold;">Datos Del Propietario</h4>
                    	<div class="row">
                      		<form class="col s12">

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="propietario" type="text" value="<?php echo $objCarro->__GET('propietario'); ?>" readonly>
                                  <label for="propietario" class="">Id</label>
                                </div>
                            </div>
                        
		                        <div class="row">
                                <div class="input-field col s12">
                                  <input name="nombres" type="text" value="<?php echo $objPropietario->__GET('nombres'); ?>" readonly>
                                  <label for="nombres" class="">Nombres</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="apellidos" type="text" value="<?php echo $objPropietario->__GET('apellidos'); ?>" readonly>
                                  <label for="apellidos" class="">Apellidos</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="sexo" type="text" value="<?php if($objPropietario->__GET('sexo')==1){echo "MASCULINO";}else{ echo "FEMENINO";} ?>" readonly>
                                  <label for="sexo" class="">Sexo</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="email" type="email" value="<?php echo $objPropietario->__GET('email'); ?>" readonly>
                                  <label for="email" class="">Email</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="direccion" type="text" value="<?php echo $objPropietario->__GET('direccion'); ?>" readonly>
                                  <label for="direccion" class="">Direccion</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="barrio" type="text" value="<?php echo $objPropietario->__GET('barrio'); ?>" readonly>
                                  <label for="barrio" class="">Barrio</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="ciudad" type="text" value="<?php echo $objCiudad->__GET('det'); ?>" readonly>
                                  <label for="ciudad" class="">Ciudad</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="departamento" type="text" value="<?php echo $objDepartamento->__GET('det'); ?>" readonly>
                                  <label for="departamento" class="">Departamento</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="pais" type="text" value="<?php echo $objPais->__GET('det'); ?>" readonly>
                                  <label for="pais" class="">Pais</label>
                                </div>
                            </div>

                      		</form>
                    	</div>
                  	</div>
                </div>

                <div class="col s12 m12 l6">
                  <div class="card-panel">
                      <h4 class="header2" align="center" style="font-weight: bold;">DATOS ECONOMICOS</h4>
                      <div class="row">
                          <form class="col s12">

                            <div class="input-field col s12">
                              <input name="pcompra" type="text" value="<?php echo "$ ".number_format($objCarro->__GET('pcompra'), 2, '.', ','); ?>" readonly>
                              <label for="pcompra" class="">Pcompra</label>
                            </div>

                            <div class="input-field col s12">
                              <input name="pventa" type="text" value="<?php echo "$ ".number_format($objCarro->__GET('pventa'), 2, '.', ','); ?>" readonly>
                              <label for="pventa" class="">Pventa</label>
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
                      		<form class="col s12" action="?action=<?php echo 'Usuarios_Actualizar'; ?>" method="post">
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
                          <form class="col s12" action="?action=<?php echo 'Usuarios_Actualizar'; ?>" method="post">
                            <div class="row">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="text-align: center;">PCOMPRA</th>
                                      <th style="text-align: center;">EGRESOS</th>
                                      <th style="text-align: center;">TOTAL</th>
                                      <th style="text-align: center;">PVENTA</th>
                                      <th style="text-align: center;">ESTADO</th>                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($objCarro->__GET('pcompra'), 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($totegresos, 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($totegresos+$objCarro->__GET('pcompra'), 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($objCarro->__GET('pventa'), 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php if(($objCarro->__GET('pventa')-($totegresos+$objCarro->__GET('pcompra')))>0){ echo "EXISTE GANANCIA";}else{echo "PERDIDA DE DINERO";} ?></td>
                                      </tr>
                                  </tbody>
                                  <tr>
                                    <td colspan="4" style="text-align: right;font-size: 20px;font-weight: bold;">Total: </td>
                                    <td style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo "$ ".number_format($objCarro->__GET('pventa')-($totegresos+$objCarro->__GET('pcompra')), 2, '.', ','); ?>
                                    </td>
                                  </tr>
                                  <?php if(($objCarro->__GET('pventa')-($totegresos+$objCarro->__GET('pcompra')))<=0){?>
                                  <tr>
                                    <td colspan="4" style="text-align: right;font-size: 20px;font-weight: bold;">Precio De Venta Sugerido: </td>
                                    <td style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo "$ ".number_format(($totegresos+$objCarro->__GET('pcompra'))*(1.2), 2, '.', ','); ?>
                                    </td>
                                  </tr>
                                  <?php }?>
                                </table>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="card-panel">
                    <h4 class="header2" align="center" style="font-weight: bold;">ESTADO FINANCIERO</h4>
                      <div class="row">
                          <form class="col s12" action="?action=<?php echo 'Usuarios_Actualizar'; ?>" method="post">
                            <div class="row">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="text-align: center;">PCOMPRA</th>
                                      <th style="text-align: center;">EGRESOS</th>
                                      <th style="text-align: center;">TOTAL</th>
                                      <th style="text-align: center;">PVENTA</th>
                                      <th style="text-align: center;">ESTADO</th>                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($objCarro->__GET('pcompra'), 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($totegresos, 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($totegresos+$objCarro->__GET('pcompra'), 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php echo "$ ".number_format($objCarro->__GET('pventa'), 2, '.', ','); ?></td>
                                        <td style="text-align: center;"><?php if(($objCarro->__GET('pventa')-($totegresos+$objCarro->__GET('pcompra')))>0){ echo "EXISTE GANANCIA";}else{echo "PERDIDA DE DINERO";} ?></td>
                                      </tr>
                                  </tbody>
                                  <tr>
                                    <td colspan="4" style="text-align: right;font-size: 20px;font-weight: bold;">Total: </td>
                                    <td style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo "$ ".number_format($objCarro->__GET('pventa')-($totegresos+$objCarro->__GET('pcompra')), 2, '.', ','); ?>
                                    </td>
                                  </tr>
                                  <?php if(($objCarro->__GET('pventa')-($totegresos+$objCarro->__GET('pcompra')))<=0){?>
                                  <tr>
                                    <td colspan="4" style="text-align: right;font-size: 20px;font-weight: bold;">Precio De Venta Sugerido: </td>
                                    <td style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo "$ ".number_format(($totegresos+$objCarro->__GET('pcompra'))*(1.2), 2, '.', ','); ?>
                                    </td>
                                  </tr>
                                  <?php }?>
                                </table>
                            </div>
                        </form>
                    </div>
                  </div>
              </div>

              <div class="row">
                  <div class="card-panel">
                    <h4 class="header2" align="center" style="font-weight: bold;">DOCUMENTACION</h4>
                      <div class="row">
                          <form class="col s12" action="?action=<?php echo 'Usuarios_Actualizar'; ?>" method="post">
                            <div class="row">
                                <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th style="text-align: center;">Id</th>
                                      <th style="text-align: center;">Tipo</th>
                                      <th style="text-align: center;">Foto</th>
                                      <th style="text-align: center;">Vencimiento</th>
                                      <th style="text-align: center;">Estado</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th style="text-align: center;">Id</th>
                                      <th style="text-align: center;">Tipo</th>
                                      <th style="text-align: center;">Foto</th>
                                      <th style="text-align: center;">Vencimiento</th>
                                      <th style="text-align: center;">Estado</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                    <?php foreach($modelDocumentacion->Listar_Documentaciones($_REQUEST['id']) as $r): ?>
                                      <tr>
                                        <td style="text-align: center;"><?php echo $r->__GET('id'); ?></td>
                                        <td style="text-align: center;"><?php echo $r->__GET('tip_docu'); ?></td>
                                        <td style="text-align: center;" width="40%">
                                          <img src=<?php echo $r->__GET('documento'); ?> alt="Elemento de Descarga" style="width:100%;"/>
                                        </td>
                                        <td style="text-align: center;"><?php echo $r->__GET('fvence'); ?></td>
                                        <td style="text-align: center;">
                                        <?php 
                                          if ($r->__GET('estado')==1) {
                                            echo "VIGENTE" ?>
                                          <?php }else{
                                            echo "VENCIDO" ?>
                                          <?php }?>
                                        </td>
                                      </tr>
                                    <?php endforeach; ?>
                                  </tbody>
                                </table>
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