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

<link rel="stylesheet" href="estilos/dist/css/dropify.min.css">
<link rel="stylesheet" href="estilos/dist/css/carsale.css">

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
              <h5 id="white" class="breadcrumbs-title">Formulario Insertar Documentación</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Documentacion">Documentaciones</a></li>
                <li id="white" class="active">Insertar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->


      <div id="login-page" class="row" align="center">
        <div class="col s12" >
        <br>
          <form class="login-form" enctype="multipart/form-data" action="?action=Documentacion_registrar" method="post" id="oscurecer">

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <?php
                    $registro=$modelDocumentacion->ObtenerMax();
                  ?>
                  <input type="number" name="id" value="<?php echo $registro->__GET('id')+1; ?>" readonly/>
                  <label for="id">Id</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="carros_id">
                    <?php foreach($modelCarros->Obtener_Disponibles() as $r): ?>
                      <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
                      <?php endforeach; ?>
                  </select>
                  <label>Placa</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="tip_docu">
                    <?php foreach($modelTip_docu->Listar() as $r): ?>
                      <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                    <?php endforeach; ?>
                  </select>
                  <label>Tipo De Documentacion</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="date" class="datepicker" name="fvence">
                    <label for="fvence">Fecha</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="estado">
                      <option value="1">VIGENTE</option>
                      <option value="2">VENCIDO</option>
                  </select>
                  <label>Tipo De Documentacion</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
              <input type="file" id="documento" name="documento" class="foto" data-allowed-file-extensions="jpg jepg png" data-max-file-size="19M"/>
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
<script src="estilos/dist/js/dropify.min.js"></script>

<script>
  $(document).ready(function(){
    // Basic
    $('.dropify').dropify();
    // Translated
    $('.foto').dropify({
      messages: {
        default: 'arrastra y suelta un archivo o haga clic aquí</br>Max 19Mb',
        replace: 'Arrastre un archivo o haga clic en reemplazar',
        remove:  'Eliminar Documentación',
        error:   'Lo sentimos, archivo incompatible.'
      }
    });

    // Used events
    var drEvent = $('#input-file-events').dropify();

    drEvent.on('dropify.beforeClear', function(event, element){
      return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element){
      alert('File deleted');
    });

    drEvent.on('dropify.errors', function(event, element){
      console.log('Has Errors');
    });

    var drDestroy = $('#input-file-to-destroy').dropify();
    drDestroy = drDestroy.data('dropify')
    $('#toggleDropify').on('click', function(e){
      e.preventDefault();
      if (drDestroy.isDropified()) {
        drDestroy.destroy();
      } else {
        drDestroy.init();
      }
    })
  });
</script>

<script type="text/javascript">
  $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year
    format: 'yyyy/mm/dd'
  });
</script>