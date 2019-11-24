<?php 
  if (!isset($_SESSION)) session_start();

  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($_SESSION['rol']==4) {
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
<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/botones.css" type="text/css" rel="stylesheet" media="screen,projection">

<!-- Start Page Loading -->
<?php include 'views/Dashboard/Loading.php';?>
<!-- End Page Loading -->

<!-- START HEADER -->
<?php include 'views/Vendedor/Header.php';?>
<!-- END HEADER -->

<!-- START MAIN -->
<div id="main">
  <!-- START WRAPPER -->
  <div class="wrapper">
    <!-- START LEFT SIDEBAR NAV-->
    <?php include 'views/Vendedor/AsideLateral.php';?>
    <!-- END LEFT SIDEBAR NAV-->
    <!-- START CONTENT -->
    <section id="content" class="white">
      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Buscar</h5>
              <ol class="breadcrumb">
                <li><a href="?action=vendedor">Vendedor</a></li>
                <li id="white" class="active">Vehículos</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->
      
      <!--start container-->
      <div class="container">
        <div class="section container">
          <div class="divider"></div>
          <!--Input fields-->
          <div id="input-fields">
            <table id="data-table-simple" class="responsive-table display" cellspacing="0">
              <thead>
                <tr>
                  <th>Placa</th>
                  <th>Propietario</th>
                  <th>Ciudad</th>
                  <th>Color</th>
                  <th>Transmision</th>
                  <th>Valor</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Placa</th>
                  <th>Propietario</th>
                  <th>Ciudad</th>
                  <th>Color</th>
                  <th>Transmision</th>
                  <th>Valor</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelCarros->Listar_Disponibles() as $r): ?>
                  <tr>
                    <td>
                      <form class="col s12" action="?action=<?php echo 'Vendedor_Form_Carro_Reporte'; ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $r->__GET('id'); ?>">
                        <button id="botones" type="submit" class="waves-effect waves-light btn"><?php echo $r->__GET('id'); ?></button>
                      </form>
                    </td>
                    <td><?php echo $r->__GET('propietario'); ?></td>
                    <td><?php echo $r->__GET('ciudad'); ?></td>
                    <td><?php echo $r->__GET('color'); ?></td>
                    <td><?php echo $r->__GET('transmision'); ?></td>
                    <td><?php echo "$ ".number_format($r->__GET('pventa'), 2, '.', ','); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
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

<!-- data-tables -->
<script type="text/javascript" src="estilos/dashboard/js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="estilos/dashboard/js/plugins/data-tables/data-tables-script.js"></script>

<!-- chartist -->
<script type="text/javascript" src="estilos/dashboard/js/plugins/chartist-js/chartist.min.js"></script>   
    
<!--plugins.js - Some Specific JS codes for Plugin Settings-->
<script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>