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
                    <p class="user-roal">Secretaria</p>
                </div>
            </div>
        </li>
        <li class="divider"></li>
            <!--<li class="bold"><a href="?action=webmaster" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>-->
        </li>
            <li class="divider"></li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-face-unlock"></i> Personas</a>
                        <div class="collapsible-body">
                            <ul>                                        
                                <li><a href="?action=Secretaria_Persona_Buscar">Persona</a></li>
                                <li class="divider"></li>                             
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-maps-directions-car"></i> Vehículos</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Secretaria_Vehiculo_Buscar_PorPlaca">Por Placa</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Secretaria_Vehiculo_Buscar_PorTipo">Por Tipo</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Secretaria_Vehiculo_Buscar_PorMarca">Por Marca</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li>
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Egresos</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Secretaria_Egresos">Egresos</a></li>
                                <li class="divider"></li>
                            </ul>
                        </div>
                    </li> 
                    <li class="divider"></li>
                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Ventas</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="?action=Secretaria_Ventas">Ventas</a></li>
                                <li class="divider"></li>
                                <li><a href="?action=Secretaria_Ventas_En_Proceso">En Proceso</a></li>
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