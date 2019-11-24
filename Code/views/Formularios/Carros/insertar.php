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
              <h5 id="white" class="breadcrumbs-title">Formulario Insertar Vehículo</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Carros">Vehículo</a></li>
                <li id="white" class="active">Insertar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->


      <div id="login-page" class="row" align="center">
        <div id="fondo" class="col s12 z-depth-4 card-panel" >
        <br>
          <form class="login-form" action="?action=Carros_registrar" method="post" id="oscurecer">

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="marca" onchange="load(this.value)">
                <option>Seleccione</option>
                  <?php foreach($modelMarca->Listar() as $r): ?>
                    <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                  <?php endforeach; ?>
                </select>
                <label>Marca</label>
              </div>
            </div>
            
            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="id" maxlength="10" length="10" required/>
                <label for="id">Placa</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="anio" maxlength="4" length="4" required/>
                <label for="anio">Año</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="km" maxlength="45" length="45" required/>
                <label for="km">Kilometos</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="motor" maxlength="45" length="45" required/>
                <label for="motor"># Motor</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="cilindraje" maxlength="100" length="100" required/>
                <label for="cilindraje">Cilindraje</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="color" maxlength="100" length="100" required/>
                <label for="color">Color</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="pcompra" maxlength="100" length="100" required/>
                <label for="pcompra">Precio De Compra</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="pventa" maxlength="100" length="100" required/>
                <label for="pventa">Precio De Venta</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="propietario">
                  <?php foreach($modelPersona->Listar() as $r): ?>
                    <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?>                          
                    </option>
                  <?php endforeach; ?>
                </select>
                <label>Propietario</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="tipo">
                  <?php foreach($modelTipo_carro->Listar() as $r): ?>
                    <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                  <?php endforeach; ?>
                </select>
                <label>Tipo</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="transmision">
                  <option value="Automatica">Automática</option>
                  <option value="Mecanica">Mecánica</option>
                  <option value="Sincronica">Sincónica</option>
                </select>
                <label>Tipo Transmision</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="direccion">
                  <option value="Hidraulica">Hidráulica</option>
                  <option value="Asistida">Asistida</option>
                  <option value="Mecanica">Mecánica</option>
                </select>
                <label>Tipo Direccion</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="combustible">
                  <option value="Diesel">Diesel</option>
                  <option value="Gasolina">Gasolina</option>
                  <option value="Gasolina_y_Gas">Gasolina y Gas</option>
                </select>
                <label>Tipo Combustible</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="ciudad">
                  <?php foreach($modelCiudad->Listar() as $r): 
                    if ($r->id=='145') {?>
                      <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('det');?></option>
                    <?php }else{?>
                    <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                  <?php } endforeach; ?>
                </select>
                <label>Ciudad</label>
              </div>
            </div>


            <div class="row margin">
              <div class="input-field col s12" id="white">
                <div id="modelo"></div>
              </div>
            </div>


            <div class="row margin">
              <div class="input-field col s12">
              <button type="reset" class="waves-effect waves-light btn col s12 cyan">Limpiar</button>                 
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
      document.getElementById("modelo").innerHTML=xmlhttp.responseText;
      $('select').material_select();
    }
    }
}
xmlhttp.open("POST","views/Formularios/Carros/proc.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str);
}
</script>