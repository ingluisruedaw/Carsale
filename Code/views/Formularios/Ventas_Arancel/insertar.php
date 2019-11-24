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

  if($_SESSION['idfactura']==null){
      header('Location: ?action=Form_Ventas_Insertar');
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
              <h5 class="breadcrumbs-title">Formulario Insertar Venta Arancel</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Ventas">Ventas</a></li>
                <li><a href="?action=Form_Ventas_Insertar">Insertar</a></li>
                <li><a href="?action=Ventas_Arancel">Ventas Arancel</a></li>
                <li class="active">Insertar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->

    

        <div id="basic-form" class="section">
            <div class="row">
                <div class="col s12 m12 l6">
                  <div class="card-panel">
                      <h4 class="header2" align="center">DATOS FACTURA</h4>
                      <?php $objfact=$modelVentas->ObtenerFactura($_SESSION['idfactura']);?>
                      <div class="row">


                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="VentasVendedor" type="text" value="<?php echo $objfact->vendedor; ?>" readonly>
                                  <label for="VentasVendedor">Vendedor</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="Ventascliente" type="text" value="<?php echo  $objfact->cliente; ?>" readonly>
                                  <label for="Ventascliente">Cliente</label>
                                </div>
                            </div>

                            <!--<div class="row">
                                <div class="input-field col s12">
                                  <input name="Ventas_Fecha" type="text" value="<?php //echo $objfact->fecha; ?>" readonly>
                                  <label for="Ventas_Fecha">Fecha</label>
                                </div>
                            </div>-->

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="Ventas_Total" type="text" value="<?php echo "$ ".number_format($objfact->total, 2, '.', ','); ?>" readonly>
                                  <label for="Ventas_Total">Total</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s12">
                                  <input name="Ventas_Vehiculo" type="text" value="<?php echo $objfact->carros_id; ?>" readonly>
                                  <label for="Ventas_Vehiculo">Vehículo</label>
                                </div>
                            </div>
                      </div>
                    </div>
                </div>

                <div class="col s12 m12 l6">
                  <div class="card-panel">
                      <h4 class="header2" align="center">VENTAS ARANCEL</h4>
                      <div class="row">
                          <form class="col s12" action="?action=<?php echo 'Ventas_Arancel_registrar'; ?>" method="post">

                            <div class="row">
                              <div class="input-field col s6">
                                <?php
                                  $registro=$modelVentas_Arancel->ObtenerMax();
                                ?>
                                <input type="number" name="ventas_id" value="<?php echo $_SESSION['idfactura']; ?>" readonly/>
                                <label for="ventas_id"># Factura</label>
                              </div>

                              <div class="input-field col s6">
                                <?php
                                  $registro=$modelVentas_Arancel->ObtenerMax();
                                ?>
                                <input type="number" name="id" value="<?php echo $registro->__GET('id')+1; ?>" readonly/>
                                <label for="id">Id Venta Arancel</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="input-field col s12">
                                <select name="persona_id">
                                  <?php foreach($modelPersona->Listar() as $r): ?>
                                    <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
                                  <?php endforeach; ?>
                                </select>
                                <label>Responsable</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="input-field col s12">
                                <select name="aranceles_id">
                                    <?php foreach($modelAranceles->Listar() as $r): ?>
                                      <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('detalle');?></option>
                                    <?php endforeach; ?>
                                </select>
                                <label>Arancel</label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="input-field col s6">
                                <button type="submit" class="waves-effect waves-light btn col s12 cyan">Agregar</button>
                              </div>
                            </div>


                          </form>
                      </div>
                    </div>
                </div>
            </div>

            <div class="row">
              <div class="col s12 ">
                <div class="card-panel">
                  <div class="row">
                    <div class="col s6">
                      <form action="?action=Ventas_Cancelar" method="post">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['idfactura'];?>">
                        <button type="submit" class="waves-effect waves-light btn col s12 cyan">CANCELAR VENTA</button>
                      </form>
                    </div>

                    <div class="col s6" align="right">
                      <form action="?action=Ventas_Finalizar" method="post">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['idfactura'];?>">
                        <button type="submit" class="waves-effect waves-light btn col s12 cyan">FINALIZAR VENTA</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col s12 ">
                <div class="card-panel">
                  <table id="data-table-simple" class="responsive-table display" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>arancel</th>                        
                        <th>persona_id</th>
                        <th>responsable</th>
                        <th>valor</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($modelVentas_Arancel->Listar_VentaArancel($_SESSION['idfactura']) as $r): ?>
                        <tr>
                          <td><?php echo $r->__GET('id'); ?></td>
                          <td><?php echo $r->__GET('arancel'); ?></td>                          
                           <td><?php echo $r->__GET('persona_id'); ?></td>
                          <td><?php echo $r->__GET('responsable'); ?></td>
                          <td><?php echo "$ ".number_format($r->__GET('valor'), 2, '.', ','); ?></td>                          
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                        <td colspan="5" style="text-align: center;font-weight: bold;font-size: 30px">Totales A Pagar</td>
                      </tr>
                      <?php foreach($modelVentas_Arancel->Obtener_Total_Venta_Arancel($_SESSION['idfactura']) as $r): ?>
                        <tr>
                          <td colspan="4" style="font-size: 20px;"><?php echo $r->__GET('responsable'); ?></td>
                          <td style="font-size: 20px;"><?php echo "$ ".number_format($r->__GET('total'), 2, '.', ','); ?></td>                           
                        </tr>
                      <?php endforeach; ?>
                      <tr>
                        <td colspan="4" style="font-size: 20px;"><?php echo "VALOR VEHÍCULO"; ?></td>
                        <td style="font-size: 20px;"><?php echo "$ ".number_format($objfact->total, 2, '.', ','); ?></td>    
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div><!--END BASIC FORMS-->

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