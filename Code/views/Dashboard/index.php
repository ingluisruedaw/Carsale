<?php 
  session_start();

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
        session_destroy();
        echo"<script type=\"text/javascript\">alert('Su sesion a terminado'); window.location='?action=inicio';</script>";
        exit;
    }
?>
<link href="estilos/fondos_rutas.css" type="text/css" rel="stylesheet" media="screen,projection">

    <!-- Start Page Loading -->
    <?php include 'Loading.php';?>
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
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Personas Registradas</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelPersona->Obtener_Registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Persona">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i>Vehículos Existentes</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelCarros->Contar_Existentes(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Carros">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Usuarios Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelUsuarios->Contar_Existentes(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Usuarios">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Usuarios Activos</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelUsuarios->Contar_Activos(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Usuarios_Activos">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-social-group-add"></i> Roles De Usuarios</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelRoles->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Roles">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Paises Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelPais->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Pais">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Deptos Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelDepartamento->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Departamento">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Usuarios inactivos</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelUsuarios->Contar_Inactivos(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Usuarios_Inactivos">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Vehiculos Vendidos</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelCarros->Contar_Vendidos(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                       <div align="center"><a href="?action=Carros_Vendidos">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Ciudades Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelCiudad->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Pais">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Aranceles Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelAranceles->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Aranceles">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Tipos De Vehículos</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelTipo_carro->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Tipo_carro">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Marcas Registradas</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelMarca->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                       <div align="center"><a href="?action=Marca">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Modelos Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelModelos->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Modelos">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Tipos De Imagenes</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelTipo_foto->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Tipo_foto">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Imagenes Registradas</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelImagenes->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Imagenes">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Tipos De Documentación</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelTip_docu->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                       <div align="center"><a href="?action=Tip_docu">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Documentaciones</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelDocumentacion->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Documentacion">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Tipos De Egresos</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelTipos_egreso->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Tipos_egreso">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Egresos Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelEgresos->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Egresos">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>

                        <div class="row">
                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> VENTAS EN PROCESO</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelVentas->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                       <div align="center"><a href="?action=Ventas_En_Proceso">Abrir Detalle</a></div>
                                    </div>
                                </div>
                            </div>  

                            <div class="col s12 m6 l3">
                                <div class="card" id="oscurecer">
                                    <div class="card-content">
                                        <p class="card-stats-title" id="white"><i class="mdi-action-trending-up"></i> Egresos Registrados</p>
                                        <h4 class="card-stats-number" id="white"><?php $registros = $modelEgresos->Contar_registros(); echo $registros->__GET('cantidad')?></h4>
                                    </div>
                                    <div class="card-action">
                                        <div align="center"><a href="?action=Egresos">Abrir Detalle</a></div>
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

    <!-- START FOOTER -->
    <?php include 'Footer.php';?>
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