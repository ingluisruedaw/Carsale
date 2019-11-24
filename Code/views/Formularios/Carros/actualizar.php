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

  if($_REQUEST['id']==null){
      header('Location: ?action=Carros');
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
              <h5 id="white" class="breadcrumbs-title">Formulario Actualizar Vehículo</h5>
              <ol class="breadcrumb">
                <li><a href="?action=webmaster">Dashboard</a></li>
                <li><a href="?action=Carros">Vehículos</a></li>
                <li id="white" class="active">Actualizar</li>
              </ol>
            </div>
          </div>
        </div>
      </div><!--breadcrumbs end-->


      <div id="login-page" class="row" align="center">
        <div class="col s12" >
        <br>
          <?php $j=$modelCarros->Obtener($_REQUEST['id']);?>
          <form class="login-form" action="?action=Vehiculos_actualizar" method="post" id="oscurecer">

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="id" value="<?php echo $j->__GET('id'); ?>" readonly/>
                    <label for="id">Placa</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="anio" value="<?php echo $j->__GET('anio'); ?>" maxlength="4" length="4" required/>
                    <label for="anio">Año</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="km" value="<?php echo $j->__GET('km'); ?>" maxlength="45" length="45" required/>
                    <label for="km">Kilometos</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="motor" value="<?php echo $j->__GET('motor'); ?>" maxlength="45" length="45" required/>
                    <label for="motor"># Motor</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="cilindraje" value="<?php echo $j->__GET('cilindraje'); ?>" maxlength="100" length="100" required/>
                    <label for="cilindraje">Cilindraje</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="text" name="color" value="<?php echo $j->__GET('color'); ?>" maxlength="100" length="100" required/>
                    <label for="color">Color</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="pcompra" value="<?php echo $j->__GET('pcompra'); ?>" maxlength="100" length="100" required/>
                    <label for="pcompra">Precio De Compra</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <input type="number" name="pventa" value="<?php echo $j->__GET('pventa'); ?>" maxlength="100" length="100" required/>
                    <label for="pventa">Precio De Venta</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s9" id="white">
                <select name="propietario">
                      <?php $propietario_e=$j->__GET('propietario');?>
                      <?php foreach($modelPersona->Listar() as $r): ?>
                      <?php if($propietario_e==$r->__GET('id')){ ?>
                        <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('id');?></option>
                      <?php }else{?>
                        <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('id');?></option>
                      <?php }?>                   
                      <?php endforeach; ?>
                    </select>
                    <label>Pais</label>
              </div>

              <div class="input-field col s3" id="white">
                <li><a href="?action=Form_Persona_Insertar" class="btn-floating btn-small waves-effect waves-light cyan"><i class="mdi-content-add"></i></a></li>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="tipo">
                      <?php $tipo_e=$j->__GET('tipo');?>
                      <?php foreach($modelTipo_carro->Listar() as $r): ?>
                      <?php if($tipo_e==$r->__GET('tipo')){ ?>
                        <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('det');?></option>
                      <?php }else{?>
                        <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                      <?php }?>                   
                      <?php endforeach; ?>
                    </select>
                    <label>Tipo Carro</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="transmision">
                    <?php
                      if($j->__GET('transmision')=='Automatica'){?>
                        <option value="Automatica" selected>Automática</option>
                        <option value="Mecanica">Mecánica</option>
                        <option value="Sincronica">Sincónica</option>
                      <?php }elseif($j->__GET('transmision')=='Mecanica'){?>
                        <option value="Automatica">Automática</option>
                        <option value="Mecanica" selected>Mecánica</option>
                        <option value="Sincronica">Sincónica</option>
                      <?php }else{if($j->__GET('transmision')=='Sincronica'){}?>
                        <option value="Automatica">Automática</option>
                        <option value="Mecanica">Mecánica</option>
                        <option value="Sincronica" selected>Sincónica</option>
                      <?php } ?>               
                    </select>
                    <label>Tipo Transmision</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="direccion">
                    <?php
                      if($j->__GET('direccion')=='Hidraulica'){?>
                        <option value="Hidraulica" selected>Hidráulica</option>
                        <option value="Asistida">Asistida</option>
                        <option value="Mecanica">Mecánica</option>
                      <?php }elseif($j->__GET('direccion')=='Asistida'){?>
                        <option value="Hidraulica">Hidráulica</option>
                        <option value="Asistida" selected>Asistida</option>
                        <option value="Mecanica">Mecánica</option>
                      <?php }else{if($j->__GET('direccion')=='Mecanica'){}?>
                        <option value="Hidraulica">Hidráulica</option>
                        <option value="Asistida">Asistida</option>
                        <option value="Mecanica" selected>Mecánica</option>
                      <?php } ?>               
                    </select>
                    <label>Tipo Direccion</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="combustible">
                    <?php
                      if($j->__GET('combustible')=='Hidraulica'){?>
                        <option value="Diesel" selected>Diesel</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Gasolina_y_Gas">Gasolina y Gas</option>
                      <?php }elseif($j->__GET('combustible')=='Asistida'){?>
                        <option value="Diesel">Diesel</option>
                        <option value="Gasolina" selected>Gasolina</option>
                        <option value="Gasolina_y_Gas">Gasolina y Gas</option>
                      <?php }else{if($j->__GET('combustible')=='Mecanica'){}?>
                        <option value="Diesel">Diesel</option>
                        <option value="Gasolina">Gasolina</option>
                        <option value="Gasolina_y_Gas" selected>Gasolina y Gas</option>
                      <?php } ?>               
                    </select>
                    <label>Tipo Combustible</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <select name="ciudad">
                      <?php $ciudad_e=$j->__GET('ciudad');?>
                      <?php foreach($modelCiudad->Listar() as $r): ?>
                      <?php if($ciudad_e==$r->__GET('id')){ ?>
                        <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('det');?></option>
                      <?php }else{?>
                        <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                      <?php }?>                   
                      <?php endforeach; ?>
                    </select>
                    <label>Ciudad</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <?php $marca_e=$j->__GET('marca'); ?>
                    <select name="marca" onchange="load(this.value)">                    
                      <?php foreach($modelMarca->Listar() as $r): ?>
                        <?php
                          if ($marca_e==$r->__GET('id')) {?>
                            <option value="<?php echo $r->__GET('id');?>" selected><?php echo $r->__GET('det');?></option>            
                          <?php }else{?>
                              <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                          <?php } ?> 
                        ?>                        
                      <?php endforeach; ?>
                    </select>
                    <label>Marca</label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12" id="white">
                <div id="modelo">
                        <select name="modelo">                    
                          <?php foreach($modelModelos->Obtener($j->__GET('marca')) as $r): ?>          
                            <option value="<?php echo $r->__GET('id');?>"><?php echo $r->__GET('det');?></option>
                          <?php endforeach; ?>
                        </select>
                        <label>Modelo</label>
                      </div>
              </div>
            </div>

            <div class="row margin">

              <div class="input-field col s12">
                 <button type="submit" class="waves-effect waves-light btn col s12 cyan">Actualizar</button>
              </div>
            </div>
            <br>
          </form>
          <br>
        </div>
      </div>
  </div><!-- END WRAPPER -->
</div><!-- END MAIN -->

<br><br><br><br><br><br><br><br><br><br>
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
xmlhttp.open("POST","views/Formularios/Carros/proc2.php",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("q="+str);
}
</script>