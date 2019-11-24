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
<link href="http://cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
<link href="estilos/dashboard/js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">

<link href="estilos/rutas.css" type="text/css" rel="stylesheet" media="screen,projection">
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
    <section id="content">

      <!--breadcrumbs start-->
      <div id="titulos" id="breadcrumbs-wrapper" class=" grey lighten-3" BGPROPERTIES="fixed">
        <div class="container">
          <div class="row">
            <div class="col s12 m12 l12">
              <h5 id="white" class="breadcrumbs-title">Formulario Usuarios</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li id="white" class="active">Usuarios</li>
                <li><a href="?action=Form_Usuarios_Insertar" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-content-add"></i></a></li>
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
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Id Persona</th>
                  <th>Nombres</th>
                  <th>Estado</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Rol</th>
                  <th>Id Persona</th>
                  <th>Nombres</th>
                  <th>Estado</th>
                  <th>Actualizar</th>
                  <th>Eliminar</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach($modelUsuarios->Listar() as $r): ?>
                  <tr>
                    <td>
                      <form class="col s12" action="?action=<?php echo 'Form_Usuarios_Reporte'; ?>" method="post">
                        <input type="hidden" name="usuario" value="<?php echo $r->__GET('usuario'); ?>">
                        <button type="submit" class="waves-effect waves-light btn col s12 cyan"><?php echo $r->__GET('usuario'); ?></button>
                      </form>
                    <td>
                      <?php 
                        if($r->__GET('rol')=='1'){
                          echo "SUPERUSUARIO";
                        }elseif ($r->__GET('rol')=='2') {
                          echo "ADMINISTRADOR";
                        }elseif ($r->__GET('rol')=='3') {
                          echo "SECRETARIA";
                        }else{
                          echo "VENDEDOR";
                        }
                      ?>
                    </td>
                    <td><?php echo $r->__GET('idpersona'); ?></td>
                    <td><?php echo $r->__GET('persona'); ?></td>
                    <td>
                      <?php 
                        if($r->__GET('estado')=='1'){
                          echo "ACTIVO";
                        }elseif ($r->__GET('estado')=='2') {
                          echo "INACTIVO";
                        }
                      ?>
                    </td>
                    <td>
                     	<form action="?action=Form_Usuarios_Actualizar" method="post">
                        	<input type="hidden" name="usuario" value="<?php echo $r->usuario; ?>">
                        	<button type="submit" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-editor-mode-edit"></i></button>
                      	</form>
                    </td>
                    <td>
                      <form action="?action=<?php echo 'Usuarios_eliminar'; ?>" method="post">
                        <input type="hidden" name="usuario" value="<?php echo $r->usuario; ?>"/>
                        <button type="submit" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-action-delete"></i></button>
                      </form>
                    </td>
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