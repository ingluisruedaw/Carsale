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
?>

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/botones.css" type="text/css" rel="stylesheet" media="screen,projection">

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
    <section id="content" >
      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Insertar Egreso</h5>
              <ol class="breadcrumb">
                <li><a href="?action=secretaria">Secretaria</a></li>
                <li><a href="?action=Secretaria_Egresos">Egresos</a></li>
                <li id="white" class="active">Insertar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->


      <div id="login-page" class="row" align="center">
        <div class="col s12" >
        <br>
          <form class="login-form" action="?action=Egresos_registrar" method="post" id="oscurecer">

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <?php
                    $registro=$modelEgresos->ObtenerMax();
                  ?>
                  <input type="number" name="id" value="<?php echo $registro->__GET('id')+1; ?>" readonly/>
                  <label for="id">Id</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="tipo">
                      <?php foreach($modelTipos_egreso->Listar() as $r): ?>
                        <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                      <?php endforeach; ?>
                    </select>
                    <label>Tipo De Egreso</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="carro">
                    <?php foreach($modelCarros->Obtener_Disponibles() as $r): ?>
                      <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
                      <?php endforeach; ?>
                  </select>
                  <label>Placa</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="detalle" length="100" required/>
                  <label for="detalle">Detalle</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="valor" required/>
                    <label for="valor">Valor</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="date" class="datepicker" name="fecha">
                    <label for="fecha">Fecha</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <button id="completo" type="reset" class="waves-effect waves-light btn col s12">Limpiar</button>                 
              </div>

              <div class="input-field col s12">
                 <button id="completo" type="submit" class="waves-effect waves-light btn col s12">Guardar</button>
              </div>
            </div>
            <br>
          </form>
          <br>
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

<script type="text/javascript">
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy/mm/dd'
  });
</script>