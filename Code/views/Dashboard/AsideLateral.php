<aside id="left-sidebar-nav">
    <ul id="slide-out" class="side-nav fixed leftside-navigation">
        <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image">
                </div>
                <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <!--<li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a></li>
                        <li class="divider"></li>-->
                        <li><a href="?action=cerrar_sesion"><i class="mdi-hardware-keyboard-tab"></i> Logout</a></li>
                    </ul>
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['username']
                    ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal">WebMaster</p>
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
                                <li><a href="?action=Roles">Roles</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Usuarios">Usuarios</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Persona">Personas</a></li>
                                <li class="divider"></li>                              
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-language"></i> Ubicacion</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Pais">Pais</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Departamento">Departamento</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Ciudad">Ciudad</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-maps-directions-car"></i> Vehículos</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Carros">Vehículos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Aranceles">Aranceles</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Tipo_carro">Tipos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Marca">Marcas</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Modelos">Modelos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Tipo_foto">Tipo Imagenes</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Imagenes">Imagenes</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Tip_docu">Tipo Documentación</a></li>
                                <li class="divider"></li>                                
                                <li><a href="?action=Documentacion">Documentacion</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Egresos</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Tipos_egreso">Tipo Egresos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Egresos">Egresos</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=requerimiento_Egreso">Evento por egreso</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li> 
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Ventas</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Ventas">Vender</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=requerimiento_Vendedores">Requerimiento</a></li>
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