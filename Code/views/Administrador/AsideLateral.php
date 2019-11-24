<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li class="divider"></li>
                        <li><a href="?action=cerrar_sesion"><i class="mdi-hardware-keyboard-tab"></i> Logout</a></li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['username']
                    ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">Administrador</p>
                </div>
            </div>
        </li>
        <li class="divider"></li>
            <!--<li class="bold"><a href="?action=webmaster" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>-->
        </li>
            <li class="divider"></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-child"></i> Usuarios</a>
                        <div class="collapsible-body">
                            <ul>                                        
                                <li><a href="?action=Admin_roles_Usuarios">Roles</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Usuarios_Reporte">Usuarios</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Personas_Reporte">Personas</a></li>
                                <li class="divider"></li>                              
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-language"></i> Ubicacion</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Admin_Pais_Reporte">Pais</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Departamento_Reporte">Departamento</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Ciudad_Reporte">Ciudad</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-maps-directions-car"></i> Vehículos</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Admin_Vehiculos_Reporte">Vehículos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Aranceles_Reporte">Aranceles</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Tipos_Vehiculos_Reporte">Tipos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Marcas_Reporte">Marcas</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Modelos_Reporte">Modelos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Tipos_De_Imagenes_Reporte">Tipo Imagenes</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Imagenes_De_Vehiculos_Reporte">Imagenes</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Tipos_De_Documentacion_De_Vehiculos_Reporte">Tipo Documentación</a></li>
                                <li class="divider"></li>                                
                                <li><a href="?action=Admin_Documentacion_De_Vehiculos_Reporte">Documentacion</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Egresos</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Admin_Tipo_De_Egresos_De_Vehiculos_Reporte">Tipo Egresos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Admin_Egresos_De_Vehiculos_Reporte">Egresos</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li> 

                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Ventas</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Admin_Ventas_Reporte">Reporte</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li> 
  

                </ul>
            </li>
            <li class="li-hover"><div class="divider"></div></li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
    </aside>