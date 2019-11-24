<?php 
  session_start();

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
        session_destroy();
        echo"<script type=\"text/javascript\">alert('Su sesion a terminado'); window.location='?action=inicio';</script>";
        exit;
    }
?>
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- Start Page Loading -->
    <?php include 'views/Dashboard/Loading.php';?>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <?php include 'Header.php';?>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <?php include 'AsideLateral.php';?>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START CONTENT -->
            <section id="content">

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!--card stats start-->
                    <div id="card-stats">
                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Personas Registradas</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelPersona->Obtener_Registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Secretaria_Persona_Buscar">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m6 l6">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i>Vehículos Disponibles</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelCarros->Contar_Disponibles(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Secretaria_Vehiculo_Buscar_PorPlaca">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>  
                        </div>

                        <div class="row">

                            <div class="col s12 m6 l6">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Tipos De Vehículos</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelTipo_carro->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Secretaria_Vehiculo_Buscar_PorTipo">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m6 l6">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Egresos Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelEgresos->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Secretaria_Egresos">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col s12 m6 l6">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> VENTAS EN PROCESO</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelVentas->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                       <div align="center"><a href="?action=Secretaria_Ventas_En_Proceso">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col s12 m6 l6">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> VENTAS REALIZADAS</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelVentas->Contar_vendidos(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                       <div align="center"><a href="?action=Secretaria_Ventas">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--card stats end-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                </div>
                <!--end container-->
            </section>
            <!-- END CONTENT -->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

        </div>
        <!-- END WRAPPER -->
    </div>
    <!-- END MAIN -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <br><br><br><br><br><br><br><br><br>
    <!-- START FOOTER -->
    <?php include 'views/Dashboard/Footer.php';?>
    <!-- END FOOTER -->


    <!-- jQuery Library -->
    <script type="text/javascript" src="estilos/dashboard/js/jquery-1.11.2.min.js"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="estilos/dashboard/js/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
       

    <!-- chartist -->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/chartist-js/chartist.min.js"></script>   

    <!-- chartjs -->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/chartjs/chart.min.js"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script type="text/javascript" src="estilos/dashboard/js/plugins/sparkline/sparkline-script.js"></script>
    
    <!--jvectormap-->
    <script type="text/javascript" src="estilos/dashboard/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script type="text/javascript" src="estilos/dashboard/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script type="text/javascript" src="estilos/dashboard/js/plugins/jvectormap/vectormap-script.js"></script>
    
    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="estilos/dashboard/js/plugins.js"></script>