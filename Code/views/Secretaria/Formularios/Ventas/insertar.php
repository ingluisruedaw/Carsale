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
              <h5 class="breadcrumbs-title">Formulario Insertar Venta</h5>
              <ol class="breadcrumb">
                <li><a href="?action=secretaria">Secretaria</a></li>
                <li><a href="?action=Secretaria_Ventas">Ventas</a></li>
                <li class="active">Insertar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->

      <!--start container-->
      	<div class="container">
        	<div class="section container">
          		<div class="divider"></div>

            	<div class="row">
                	<div class="card-panel">
                		<h4 class="header2" align="center">DATOS Basicos</h4>
                    	<div class="row">
                      		<form class="col s12" action="?action=<?php echo 'Ventas_Insertar'; ?>" method="post">

                      			<div class="row">
		                        	<div class="input-field col s6">
		                            	<?php
						                    $registro=$modelVentas->ObtenerMax();
						                  ?>
						                  <input type="number" name="id" value="<?php echo $registro->__GET('id')+1; ?>" readonly/>
						                  <label for="id">Id</label>
		                          	</div>

		                          	<div class="input-field col s6">
		                            	<input name="fecha" type="text" value="<?php echo date("Y/m/d"); ?>" readonly>
		                            	<label for="fecha">Fecha</label>
		                          	</div>
		                        </div>

		                        <div class="row">
		                        	<div class="input-field col s6">
				                    	<select name="vendedor">
				                      		<?php foreach($modelVentas->Listar_Vendedores() as $r): ?>
				                        		<option value="<?php echo $r->__GET('vendedor');?>"><?php echo $r->__GET('vendedor');?></option>
				                        	<?php endforeach; ?>
				                    	</select>
				                    	<label>Vendedor</label>
				                  	</div>

				                  	<div class="input-field col s6">
				                    	<select name="cliente">
				                      		<?php foreach($modelPersona->Listar() as $r): ?>
				                        		<option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
				                        	<?php endforeach; ?>
				                    	</select>
				                    	<label>Cliente</label>
				                  	</div>
				                </div>

				                <div class="row">
	                      			<div class="input-field col s12">
    					                  <select name="carros_id" onchange="load(this.value)">
                                  <option>Seleccione</option>
    					                    <?php foreach($modelCarros->Obtener_Disponibles() as $r): ?>
    					                      <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
    					                      <?php endforeach; ?>
    					                  </select>
					                  <label>Placa</label>
					                </div>
				                </div>

				                <div class="row">
				                    <div class="input-field col s12">
				                      <div id="total"></div>
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

<script type="text/javascript">
  
function load(str){
var xmlhttp;
if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}else{// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
    if (xmlhttp.responseText=="undefined"||xmlhttp.responseText=="") {
    }else{
      document.getElementById("total").innerHTML=xmlhttp.responseText;
    }
    }
}
xmlhttp.open("POST","views/Formularios/Ventas/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str);
}
</script>