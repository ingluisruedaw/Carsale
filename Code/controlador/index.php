<?php 
    require_once './modelo/Usuarios/Entidad.php';
    require_once './modelo/Usuarios/Modelo.php';

    require_once './modelo/Roles/Entidad.php';
    require_once './modelo/Roles/Modelo.php';

    require_once './modelo/Tipo_carro/Entidad.php';
    require_once './modelo/Tipo_carro/Modelo.php';

    require_once './modelo/Marca/Entidad.php';
    require_once './modelo/Marca/Modelo.php';

    require_once './modelo/Modelos/Entidad.php';
    require_once './modelo/Modelos/Modelo.php';

    require_once './modelo/Pais/Entidad.php';
    require_once './modelo/Pais/Modelo.php';

    require_once './modelo/Departamento/Entidad.php';
    require_once './modelo/Departamento/Modelo.php';

    require_once './modelo/Ciudad/Entidad.php';
    require_once './modelo/Ciudad/Modelo.php';

    require_once './modelo/Carros/Entidad.php';
    require_once './modelo/Carros/Modelo.php';

    require_once './modelo/Persona/Entidad.php';
    require_once './modelo/Persona/Modelo.php';

    require_once './modelo/Aranceles/Entidad.php';
    require_once './modelo/Aranceles/Modelo.php';

    require_once './modelo/Tipos_egreso/Entidad.php';
    require_once './modelo/Tipos_egreso/Modelo.php'; 

    require_once './modelo/Tip_docu/Entidad.php';
    require_once './modelo/Tip_docu/Modelo.php'; 

    require_once './modelo/Tipo_foto/Entidad.php';
    require_once './modelo/Tipo_foto/Modelo.php';

    require_once './modelo/Imagenes/Entidad.php';
    require_once './modelo/Imagenes/Modelo.php';

    require_once './modelo/Egresos/Entidad.php';
    require_once './modelo/Egresos/Modelo.php';

    require_once './modelo/Documentacion/Entidad.php';
    require_once './modelo/Documentacion/Modelo.php';

    require_once './modelo/Ventas/Entidad.php';
    require_once './modelo/Ventas/Modelo.php';

    require_once './modelo/Ventas_Arancel/Entidad.php';
    require_once './modelo/Ventas_Arancel/Modelo.php';

    require_once './modelo/Recuperar/Entidad.php';
    require_once './modelo/Recuperar/Modelo.php';

    $almUsuarios = new Usuarios();
    $modelUsuarios = new Usuarios_Model();

    $almRoles = new Roles();
    $modelRoles = new Roles_Model();

    $almTipo_carro = new Tipo_carro();
    $modelTipo_carro = new Tipo_carro_Model();

    $almMarca = new Marca();
    $modelMarca = new Marca_Model();

    $almModelos = new Modelos();
    $modelModelos = new Modelos_Model();

    $almPais = new Pais();
    $modelPais = new Pais_Model();

    $almDepartamento = new Departamento();
    $modelDepartamento = new Departamento_Model();

    $almCiudad = new Ciudad();
    $modelCiudad = new Ciudad_Model();

    $almCarros = new Carros();
    $modelCarros = new Carros_Model();

    $almPersona = new Persona();
    $modelPersona = new Persona_Model();

    $almAranceles = new Aranceles();
    $modelAranceles = new Aranceles_Model();

    $almTipos_egreso = new Tipos_egreso();
    $modelTipos_egreso = new Tipos_egreso_Model();

    $almTip_docu = new Tip_docu();
    $modelTip_docu = new Tip_docu_Model();

    $almTipo_foto = new Tipo_foto();
    $modelTipo_foto = new Tipo_foto_Model();

    $almImagenes = new Imagenes();
    $modelImagenes = new Imagenes_Model();

    $almEgresos = new Egresos();
    $modelEgresos = new Egresos_Model();

    $almDocumentacion = new Documentacion();
    $modelDocumentacion = new Documentacion_Model();

    $almVentas = new Ventas();
    $modelVentas = new Ventas_Model();

    $almVentas_Arancel = new Ventas_Arancel();
    $modelVentas_Arancel = new Ventas_Arancel_Model();

    $almRecuperar = new Recuperar();
    $modelRecuperar = new Recuperar_Model();

if(isset($_REQUEST['action'])){
    switch($_REQUEST['action']){
        case 'inicio'://home de la aplicacion
            include 'views/navbar.php';
            include 'views/inicio.php';
            include 'views/footer.php';
            break;
        case 'login':
            include 'views/login.php';
            break;
        case 'logeo'://lo solicita el login
            include 'modelo/checklogin.php';
            break;
        case 'cerrar_sesion':
            include 'modelo/Login/logout.php';
            break;
        case 'webmaster':
            include 'views/Dashboard/index.php';
            break;
        case 'administrador':
            include 'views/Administrador/index.php';
            break;
        case 'secretaria':
            include 'views/Secretaria/index.php';
            break;
        case 'vendedor':
            include 'views/Vendedor/index.php';
            break;
        case 'Aranceles':
            include 'views/Formularios/Aranceles/index.php';
            break;
        case 'Form_Aranceles_registrar':
            include 'views/Formularios/Aranceles/insertar.php';
            break;
        case 'Aranceles_registrar':
            $almAranceles->__SET('id',$_REQUEST['id']);
            $almAranceles->__SET('detalle',$_REQUEST['detalle']);
            $almAranceles->__SET('valor',$_REQUEST['valor']);
            $modelAranceles->Registrar($almAranceles);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Aranceles';</script>";
            break;
        case 'Aranceles_eliminar':
            $modelAranceles->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Aranceles';</script>";
            break;
        case 'Form_Aranceles_actualizar'://formulario eliminar
            include 'views/Formularios/Aranceles/actualizar.php';
            break;
        case 'Aranceles_actualizar':
            $almAranceles->__SET('id',$_REQUEST['id']);
            $almAranceles->__SET('detalle',$_REQUEST['detalle']);
            $almAranceles->__SET('valor',$_REQUEST['valor']);
            $modelAranceles->Actualizar($almAranceles);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Aranceles';</script>";
            break;
        case 'Tipo_carro':
            include 'views/Formularios/Tipo_carro/index.php';
            break;
        case 'Form_Tipo_carro':
            include 'views/Formularios/Tipo_carro/insertar.php';
            break;
        case 'Tipo_carro_registrar':
            $almTipo_carro->__SET('id',$_REQUEST['id']);
            $almTipo_carro->__SET('det',$_REQUEST['det']);
            $modelTipo_carro->Registrar($almTipo_carro);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Tipo_carro';</script>";
            break;
        case 'Tipo_carro_eliminar':
            $modelTipo_carro->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Tipo_carro';</script>";
            break;
        case 'Form_Tipo_carro_actualizar':
            include 'views/Formularios/Tipo_carro/actualizar.php';
            break;
        case 'Tipo_carro_actualizar':
            $almTipo_carro->__SET('id',$_REQUEST['id']);
            $almTipo_carro->__SET('det',$_REQUEST['det']);
            $modelTipo_carro->Actualizar($almTipo_carro);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Tipo_carro';</script>";
            break;
        case 'Marca':
            include 'views/Formularios/Marca/index.php';
            break;
        case 'Form_Marca_Insertar':
            include 'views/Formularios/Marca/insertar.php';
            break;
        case 'Marca_registrar':
            $almMarca->__SET('id',$_REQUEST['id']);
            $almMarca->__SET('det',$_REQUEST['det']);
            $modelMarca->Registrar($almMarca);
             echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Marca';</script>";
            break;
        case 'Form_Marca_Actualizar':
            include 'views/Formularios/Marca/actualizar.php';
            break;
        case 'Marca_actualizar':
            $almMarca->__SET('id',$_REQUEST['id']);
            $almMarca->__SET('det',$_REQUEST['det']);
            $modelMarca->Actualizar($almMarca);
             echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Marca';</script>";
            break;
        case 'Marca_eliminar':
            $modelMarca->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Marca';</script>";
            break;
        case 'Modelos':
            include 'views/Formularios/Modelos/index.php';
            break;
        case 'Form_Modelos_Insertar':
            include 'views/Formularios/Modelos/insertar.php';
            break;
        case 'Modelos_registrar':
            $almModelos->__SET('id',$_REQUEST['id']);
            $almModelos->__SET('det',$_REQUEST['det']);
            $almModelos->__SET('marca',$_REQUEST['marca']);
            $modelModelos->Registrar($almModelos);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Modelos';</script>";
            break;
        case 'Form_Modelos_Actualizar':
            include 'views/Formularios/Modelos/actualizar.php';
            break;
        case 'Modelos_eliminar':
            $modelModelos->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Modelos';</script>";
            break;
        case 'Modelos_actualizar':
            $almModelos->__SET('id',$_REQUEST['id']);
            $almModelos->__SET('det',$_REQUEST['det']);
            $almModelos->__SET('marca',$_REQUEST['marca']);
            $modelModelos->Actualizar($almModelos);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Modelos';</script>";
            break;
        case 'Tipo_foto':
            include 'views/Formularios/Tipo_foto/index.php';
            break;
        case 'Tipo_foto_registrar':
            $almTipo_foto->__SET('id',$_REQUEST['id']);
            $almTipo_foto->__SET('det',$_REQUEST['det']);

            $modelTipo_foto->Registrar($almTipo_foto);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Tipo_foto';</script>";
            break;    
        case 'Tipo_foto_eliminar':
            $modelTipo_foto->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Tipo_foto';</script>";
            break;
        case 'Form_Tipo_foto_Actualizar':
            include 'views/Formularios/Tipo_foto/actualizar.php';
            break;
        case 'Tipo_foto_actualizar':
            $almTipo_foto->__SET('id',$_REQUEST['id']);
            $almTipo_foto->__SET('det',$_REQUEST['det']);

            $modelTipo_foto->Actualizar($almTipo_foto);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Tipo_foto';</script>";
            break;
        case 'Form_Tipo_foto_Insertar':
            include 'views/Formularios/Tipo_foto/insertar.php';
            break;
        case 'Carros':
            include 'views/Formularios/Carros/index.php';
            break;
        case 'Carros_Vendidos':
            include 'views/Formularios/Carros/index_vendidos.php';
            break;
        case 'Form_Vehiculos_Insertar':
            include 'views/Formularios/Carros/insertar.php';
            break;
        case 'Carros_eliminar':
            $modelCarros->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Carros';</script>";
            break;
        case 'Form_Vehiculos_actualizar':
            include 'views/Formularios/Carros/actualizar.php';
            break;
        case 'Form_Carro_Reporte':
            include 'views/Formularios/Carros/reporte.php';
            break;
        case 'Carros_registrar':
            $almCarros->__SET('id',$_REQUEST['id']);
            $almCarros->__SET('anio',$_REQUEST['anio']);
            $almCarros->__SET('km',$_REQUEST['km']);
            $almCarros->__SET('tipo',$_REQUEST['tipo']);
            $almCarros->__SET('motor',$_REQUEST['motor']);
            $almCarros->__SET('ciudad',$_REQUEST['ciudad']);
            $almCarros->__SET('combustible',$_REQUEST['combustible']);
            $almCarros->__SET('color',$_REQUEST['color']);
            $almCarros->__SET('transmision',$_REQUEST['transmision']);            
            $almCarros->__SET('direccion',$_REQUEST['direccion']);
            $almCarros->__SET('cilindraje',$_REQUEST['cilindraje']);
            $almCarros->__SET('modelo',$_REQUEST['modelo']);
            $almCarros->__SET('pventa',$_REQUEST['pventa']);
            $almCarros->__SET('pcompra',$_REQUEST['pcompra']);
            $almCarros->__SET('propietario',$_REQUEST['propietario']);   
            $modelCarros->Registrar($almCarros);            
            break;
        case 'Vehiculos_actualizar':
            $almCarros->__SET('id',$_REQUEST['id']);
            $almCarros->__SET('anio',$_REQUEST['anio']);
            $almCarros->__SET('km',$_REQUEST['km']);
            $almCarros->__SET('tipo',$_REQUEST['tipo']);
            $almCarros->__SET('motor',$_REQUEST['motor']);
            $almCarros->__SET('ciudad',$_REQUEST['ciudad']);
            $almCarros->__SET('combustible',$_REQUEST['combustible']);
            $almCarros->__SET('color',$_REQUEST['color']);
            $almCarros->__SET('transmision',$_REQUEST['transmision']);            
            $almCarros->__SET('direccion',$_REQUEST['direccion']);
            $almCarros->__SET('cilindraje',$_REQUEST['cilindraje']);
            $almCarros->__SET('modelo',$_REQUEST['modelo']);
            $almCarros->__SET('pventa',$_REQUEST['pventa']);
            $almCarros->__SET('pcompra',$_REQUEST['pcompra']);
            $almCarros->__SET('propietario',$_REQUEST['propietario']);   
            $modelCarros->Actualizar($almCarros);            
            break; 
        case 'Imagenes':
            include 'views/Formularios/Imagenes/index.php';
            break;
        case 'Form_Imagenes_insertar':
            include 'views/Formularios/Imagenes/insertar.php';
            break;
        case 'Imagenes_registrar':
            $dir_destino = './Carros/';
            $path_parts = pathinfo($_FILES["foto"]["name"]);
            $image_path = $_REQUEST['id'].'.'.$path_parts['extension'];
            $imagen_subida = $dir_destino . basename($image_path);

            //$path_parts = pathinfo($_FILES["p_image"]["name"]);
            //$image_path = $path_parts['filename'].'_'.time().'.'.$path_parts['extension']
            //$imagen_subida = $dir_destino . basename($_FILES['foto']['name']);
            if(!is_writable($dir_destino)){
                echo "no tiene permisos";
            }else{
                if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
                        $almImagenes->__SET('id',$_REQUEST['id']);
                        $almImagenes->__SET('carro',$_REQUEST['carro']);
                        $almImagenes->__SET('tipo',$_REQUEST['tipo']);
                        $almImagenes->__SET('foto',$imagen_subida);
                        $modelImagenes->Registrar($almImagenes);
                        echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Imagenes';</script>";
                    }else {
                        echo"<script type=\"text/javascript\">alert('Posible ataque de carga de archivos!'); window.location='?action=Imagenes';</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alert('Posible ataque del archivo subido'); window.location='?action=Imagenes';</script>";
                }  
            }
            break;
        case 'Imagenes_eliminar':
            $modelImagenes->Eliminar($_REQUEST['id']);
            unlink($_REQUEST['foto']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Imagenes';</script>";
            break;
        case 'Form_Imagenes_Actualizar':
            include 'views/Formularios/Imagenes/actualizar.php';
            break;
        case 'Imagenes_Actualizar':
            $dir_destino = './Carros/';
            $path_parts = pathinfo($_FILES["foto"]["name"]);
            $image_path = $_REQUEST['id'].'.'.$path_parts['extension'];
            $imagen_subida = $dir_destino . basename($image_path);
            if(!is_writable($dir_destino)){
                echo "no tiene permisos";
            }else{
                if(is_uploaded_file($_FILES['foto']['tmp_name'])){
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $imagen_subida)) {
                        $almImagenes->__SET('id',$_REQUEST['id']);
                        $almImagenes->__SET('carro',$_REQUEST['carro']);
                        $almImagenes->__SET('tipo',$_REQUEST['tipo']);
                        $almImagenes->__SET('foto',$imagen_subida);
                        $modelImagenes->Actualizar($almImagenes);
                        echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Imagenes';</script>";
                    }else {
                        echo"<script type=\"text/javascript\">alert('Posible ataque de carga de archivos!'); window.location='?action=Imagenes';</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alert('Posible ataque del archivo subido'); window.location='?action=Imagenes';</script>";
                }  
            }
            break;
        case 'Pais':
            include 'views/Formularios/Pais/index.php';
            break;
        case 'Form_Pais_Insertar':
            include 'views/Formularios/Pais/insertar.php';
            break;
        case 'Pais_registrar':
            $almPais->__SET('id',$_REQUEST['id']);
            $almPais->__SET('det',$_REQUEST['det']);
            $modelPais->Registrar($almPais);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Pais';</script>";
            break;
        case 'Pais_eliminar':
            $modelPais->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Pais';</script>";
            break;
        case 'Form_Pais_Actualizar':
            include 'views/Formularios/Pais/actualizar.php';
            break;
        case 'Pais_actualizar':
            $almPais->__SET('id',$_REQUEST['id']);
            $almPais->__SET('det',$_REQUEST['det']);
            $modelPais->Actualizar($almPais);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Pais';</script>";
            break;
        case 'Departamento':
            include 'views/Formularios/Departamento/index.php';
            break;
        case 'Form_Departamento_Insertar':
            include 'views/Formularios/Departamento/insertar.php';
            break;
        case 'Departamento_registrar':
            $almDepartamento->__SET('id',$_REQUEST['id']);
            $almDepartamento->__SET('det',$_REQUEST['det']);
            $almDepartamento->__SET('pais',$_REQUEST['pais']);
            $modelDepartamento->Registrar($almDepartamento);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Departamento';</script>";
            break;
        case 'Departamento_eliminar':
            $modelDepartamento->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Departamento';</script>";
            break;
        case 'Form_Departamento_Actualizar':
            include 'views/Formularios/Departamento/actualizar.php';
            break;
        case 'Departamento_Actualizar':
            $almDepartamento->__SET('id',$_REQUEST['id']);
            $almDepartamento->__SET('det',$_REQUEST['det']);
            $almDepartamento->__SET('pais',$_REQUEST['pais']);
            $modelDepartamento->Actualizar($almDepartamento);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Departamento';</script>";
            break;
        case 'Ciudad':
            include 'views/Formularios/Ciudad/index.php';
            break;
        case 'Form_Ciudad_Insertar':
            include 'views/Formularios/Ciudad/insertar.php';
            break;
        case 'Ciudad_registrar':
            $almCiudad->__SET('id',$_REQUEST['id']);
            $almCiudad->__SET('det',$_REQUEST['det']);
            $almCiudad->__SET('depto',$_REQUEST['depto']);
            $modelCiudad->Registrar($almCiudad);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Ciudad';</script>";
            break;
        case 'Ciudad_eliminar':
            $modelCiudad->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Ciudad';</script>";
            break;
        case 'Form_Ciudad_Actualizar':
            include 'views/Formularios/Ciudad/actualizar.php';
            break;
        case 'Ciudad_Actualizar':
            $almCiudad->__SET('id',$_REQUEST['id']);
            $almCiudad->__SET('det',$_REQUEST['det']);
            $almCiudad->__SET('depto',$_REQUEST['depto']);
            $modelCiudad->Actualizar($almCiudad);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Ciudad';</script>";
            break;        
        case 'Tipos_egreso':
            include 'views/Formularios/Tipos_egreso/index.php';
            break;
        case 'Form_Tipos_egreso_insertar':
            include 'views/Formularios/Tipos_egreso/insertar.php';
            break;
        case 'Form_Tipos_egreso_actualizar':
            include 'views/Formularios/Tipos_egreso/actualizar.php';
            break;
        case 'Tipos_egreso_registrar':
            $almTipos_egreso->__SET('id',$_REQUEST['id']);
            $almTipos_egreso->__SET('det',$_REQUEST['det']);
            $modelTipos_egreso->Registrar($almTipos_egreso);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Tipos_egreso';</script>";
            break;
        case 'Tipos_egreso_actualizar':
            $almTipos_egreso->__SET('id',$_REQUEST['id']);
            $almTipos_egreso->__SET('det',$_REQUEST['det']);
            $modelTipos_egreso->Actualizar($almTipos_egreso);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Tipos_egreso';</script>";
            break;
        case 'Tipos_egreso_eliminar':
            $modelTipos_egreso->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Tipos_egreso';</script>";
            break;
        case 'Egresos':
            include 'views/Formularios/Egresos/index.php';
            break;
        case 'Form_Egresos_insertar':
            include 'views/Formularios/Egresos/insertar.php';
            break;
        case 'Form_Egresos_actualizar':
            include 'views/Formularios/Egresos/actualizar.php';
            break;
        case 'Egresos_registrar':
        if (!isset($_SESSION)) session_start();
            $almEgresos->__SET('id',$_REQUEST['id']);
            $almEgresos->__SET('tipo',$_REQUEST['tipo']);
            $almEgresos->__SET('carro',$_REQUEST['carro']);
            $almEgresos->__SET('detalle',$_REQUEST['detalle']);
            $almEgresos->__SET('valor',$_REQUEST['valor']);
            $almEgresos->__SET('fecha',$_REQUEST['fecha']);
            $modelEgresos->Registrar($almEgresos);
            if ($_SESSION['rol']==1) {
                    echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Egresos';</script>";
                }elseif ($_SESSION['rol']==3) {
                    echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Secretaria_Egresos';</script>";
                } 
            
            break;
        case 'Egresos_actualizar':
            if (!isset($_SESSION)) session_start();
            $almEgresos->__SET('id',$_REQUEST['id']);
            $almEgresos->__SET('tipo',$_REQUEST['tipo']);
            $almEgresos->__SET('carro',$_REQUEST['carro']);
            $almEgresos->__SET('detalle',$_REQUEST['detalle']);
            $almEgresos->__SET('valor',$_REQUEST['valor']);
            $almEgresos->__SET('fecha',$_REQUEST['fecha']);
            $modelEgresos->Actualizar($almEgresos);
            if ($_SESSION['rol']==1) {
                    echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Egresos';</script>";
                }elseif ($_SESSION['rol']==3) {
                    echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Secretaria_Egresos';</script>";
                }            
            break;
        case 'Egresos_eliminar':
            $modelEgresos->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Egresos';</script>";
            break;
        case 'Tip_docu':
            include 'views/Formularios/Tip_docu/index.php';
            break;
        case 'Form_Tip_docu_Insertar':
            include 'views/Formularios/Tip_docu/insertar.php';
            break;
        case 'Form_Tip_docu_Actualizar':
            include 'views/Formularios/Tip_docu/actualizar.php';
            break;
        case 'Tip_docu_registrar':
            $almTip_docu->__SET('id',$_REQUEST['id']);
            $almTip_docu->__SET('det',$_REQUEST['det']);
            $modelTip_docu->Registrar($almTip_docu);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Tip_docu';</script>";
            break;
        case 'Tip_docu_actualizar':
            $almTip_docu->__SET('id',$_REQUEST['id']);
            $almTip_docu->__SET('det',$_REQUEST['det']);
            $modelTip_docu->Actualizar($almTip_docu);
            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Tip_docu';</script>";
            break;
        case 'Tip_docu_eliminar':
            $modelTip_docu->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Tip_docu';</script>";
            break;
        case 'Documentacion':
            include 'views/Formularios/Documentacion/index.php';
            break;
        case 'Form_Documentacion_Insertar':
            include 'views/Formularios/Documentacion/insertar.php';
            break;
        case 'Form_Documentacion_Actualizar':
            include 'views/Formularios/Documentacion/actualizar.php';
            break;
        case 'Documentacion_eliminar':
            $modelDocumentacion->Eliminar($_REQUEST['id']);
            unlink($_REQUEST['documento']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Documentacion';</script>";
            break;
        case 'Documentacion_registrar':
            $dir_destino = './Documentacion/';
            $path_parts = pathinfo($_FILES["documento"]["name"]);
            $image_path = $_REQUEST['id'].'.'.$path_parts['extension'];
            $imagen_subida = $dir_destino . basename($image_path);
            if(!is_writable($dir_destino)){
                echo "no tiene permisos";
            }else{
                if(is_uploaded_file($_FILES['documento']['tmp_name'])){
                    if (move_uploaded_file($_FILES['documento']['tmp_name'], $imagen_subida)) {
                        $almDocumentacion->__SET('id',$_REQUEST['id']);
                        $almDocumentacion->__SET('carros_id',$_REQUEST['carros_id']);
                        $almDocumentacion->__SET('tip_docu',$_REQUEST['tip_docu']);
                        $almDocumentacion->__SET('documento',$imagen_subida);
                        $almDocumentacion->__SET('fvence',$_REQUEST['fvence']);
                        $almDocumentacion->__SET('estado',$_REQUEST['estado']);
                        $modelDocumentacion->Registrar($almDocumentacion);
                        echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Documentacion';</script>";
                    }else {
                        echo"<script type=\"text/javascript\">alert('Posible ataque de carga de archivos!'); window.location='?action=Documentacion';</script>";
                    }
                }else{
                    echo"<script type=\"text/javascript\">alert('Posible ataque del archivo subido'); window.location='?action=Documentacion';</script>";
                }  
            }
            break;
        case 'Documentacion_Actualizar':            
            if ($_FILES["documento"]["name"]==null) {
                $almDocumentacion->__SET('id',$_REQUEST['id']);
                $almDocumentacion->__SET('carros_id',$_REQUEST['carros_id']);
                $almDocumentacion->__SET('tip_docu',$_REQUEST['tip_docu']);
                $almDocumentacion->__SET('fvence',$_REQUEST['fvence']);
                $almDocumentacion->__SET('estado',$_REQUEST['estado']);
                $modelDocumentacion->Actualizar_Sin_Imagen($almDocumentacion);
                echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Documentacion';</script>";
            }else{
                $dir_destino = './Documentacion/';
                $path_parts = pathinfo($_FILES["documento"]["name"]);
                $image_path = $_REQUEST['id'].'.'.$path_parts['extension'];
                $imagen_subida = $dir_destino . basename($image_path);
                if(!is_writable($dir_destino)){
                    echo "no tiene permisos";
                }else{
                    if(is_uploaded_file($_FILES['documento']['tmp_name'])){
                        if (move_uploaded_file($_FILES['documento']['tmp_name'], $imagen_subida)) {
                            $almDocumentacion->__SET('id',$_REQUEST['id']);
                            $almDocumentacion->__SET('carros_id',$_REQUEST['carros_id']);
                            $almDocumentacion->__SET('tip_docu',$_REQUEST['tip_docu']);
                            $almDocumentacion->__SET('documento',$imagen_subida);
                            $almDocumentacion->__SET('fvence',$_REQUEST['fvence']);
                            $almDocumentacion->__SET('estado',$_REQUEST['estado']);
                            $modelDocumentacion->Actualizar($almDocumentacion);
                            echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa'); window.location='?action=Documentacion';</script>";
                        }else {
                            echo"<script type=\"text/javascript\">alert('Posible ataque de carga de archivos!'); window.location='?action=Documentacion';</script>";
                        }
                    }else{
                        echo"<script type=\"text/javascript\">alert('Posible ataque del archivo subido'); window.location='?action=Documentacion';</script>";
                    }  
                }
                }          
            break;
        case 'Roles':
            include 'views/Formularios/Roles/index.php';
            break;
        case 'Form_Roles_Insertar':
            include 'views/Formularios/Roles/insertar.php';
            break;
        case 'Form_Roles_Actualizar':
            include 'views/Formularios/Roles/actualizar.php';
            break;
        case 'Roles_registrar':
            $almRoles->__SET('id',$_REQUEST['id']);
            $almRoles->__SET('det',$_REQUEST['det']);
            $modelRoles->Registrar($almRoles);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Roles';</script>";
            break;
        case 'Roles_Actualizar':
            $almRoles->__SET('id',$_REQUEST['id']);
            $almRoles->__SET('det',$_REQUEST['det']);
            $modelRoles->Actualizar($almRoles);
            echo"<script type=\"text/javascript\">alert('Actualización Exitosa'); window.location='?action=Roles';</script>";
            break;
        case 'Roles_eliminar':
            $modelRoles->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Roles';</script>";
            break;
        case 'Usuarios':
            include 'views/Formularios/Usuarios/index.php';
            break;
        case 'Usuarios_Activos':
            include 'views/Formularios/Usuarios/index_activos.php';
            break;
        case 'Usuarios_Inactivos':
            include 'views/Formularios/Usuarios/index_inactivos.php';
            break;
        case 'Form_Usuarios_Insertar':
            include 'views/Formularios/Usuarios/insertar.php';
            break;
        case 'Form_Usuarios_Actualizar':
            include 'views/Formularios/Usuarios/actualizar.php';
            break;
        case 'Form_Usuarios_Reporte':
            include 'views/Formularios/Usuarios/reporte.php';
            break;
        case 'Usuarios_Actualizar_Clave':
            $almUsuarios->__SET('usuario',$_REQUEST['usuario']);
            $almUsuarios->__SET('clave',$_REQUEST['clave']);
            $modelUsuarios->Actualizar_Clave($almUsuarios);
            echo"<script type=\"text/javascript\">alert('Actualización Exitosa'); window.location='?action=Usuarios';</script>";
            break;
        case 'Usuarios_Actualizar':
            $almUsuarios->__SET('usuario',$_REQUEST['usuario']);
            $almUsuarios->__SET('rol',$_REQUEST['rol']);
            $almUsuarios->__SET('persona',$_REQUEST['persona']);
            $almUsuarios->__SET('estado',$_REQUEST['estado']);
            $modelUsuarios->Actualizar($almUsuarios);
            echo"<script type=\"text/javascript\">alert('Actualización Exitosa'); window.location='?action=Usuarios';</script>";
            break;
        case 'Usuarios_registrar':
            $almUsuarios->__SET('usuario',$_REQUEST['usuario']);
            $almUsuarios->__SET('rol',$_REQUEST['rol']);
            $almUsuarios->__SET('clave',$_REQUEST['clave']);
            $almUsuarios->__SET('persona',$_REQUEST['persona']);
            $almUsuarios->__SET('estado',$_REQUEST['estado']);
            $modelUsuarios->Registrar($almUsuarios);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Usuarios';</script>";
            break;
        case 'Usuarios_eliminar':
            if (!isset($_SESSION)) session_start();
            if ($_SESSION['username']===$_REQUEST['usuario']) {
                echo"<script type=\"text/javascript\">alert('Error. No Puedes Eliminar Tu Usuario'); window.location='?action=Usuarios';</script>";
            }else{
                $modelUsuarios->Eliminar($_REQUEST['usuario']);
                echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Usuarios';</script>";
            }
            break;
        case 'Persona':
            include 'views/Formularios/Persona/index.php';
            break;
        case 'Form_Persona_Insertar':
            if (!isset($_SESSION)) session_start();
            if ($_SESSION['rol']==1) {
                include 'views/Formularios/Persona/insertar.php';
            }elseif ($_SESSION['rol']==3) {
                include 'views/Secretaria/Formularios/Persona/insertar.php';
            }
            
            break;
        case 'Form_Persona_Actualizar':
            include 'views/Formularios/Persona/actualizar.php';
            break;
        case 'Persona_registrar':
            if (!isset($_SESSION)) session_start();
            $almPersona->__SET('id',$_REQUEST['id']);
            $almPersona->__SET('nombres',$_REQUEST['nombres']);
            $almPersona->__SET('apellidos',$_REQUEST['apellidos']);
            $almPersona->__SET('sexo',$_REQUEST['sexo']);
            $almPersona->__SET('email',$_REQUEST['email']);
            $almPersona->__SET('direccion',$_REQUEST['direccion']);
            $almPersona->__SET('barrio',$_REQUEST['barrio']);
            $almPersona->__SET('ciudad',$_REQUEST['ciudad']);
            $modelPersona->Registrar($almPersona);
            if ($_SESSION['rol']==1) {
                echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Persona';</script>";
            }elseif ($_SESSION['rol']==2) {
                echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Admin_Personas_Reporte';</script>";
            }
            elseif ($_SESSION['rol']==3) {
                echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=secretaria';</script>";
            }else{
                echo"<script type=\"text/javascript\">alert('Accion No Permitida'); window.location='?action=inicio';</script>";
            }
            break;
        case 'Persona_Actualizar':
            if (!isset($_SESSION)) session_start();
            $almPersona->__SET('id',$_REQUEST['id']);
            $almPersona->__SET('nombres',$_REQUEST['nombres']);
            $almPersona->__SET('apellidos',$_REQUEST['apellidos']);
            $almPersona->__SET('sexo',$_REQUEST['sexo']);
            $almPersona->__SET('email',$_REQUEST['email']);
            $almPersona->__SET('direccion',$_REQUEST['direccion']);
            $almPersona->__SET('barrio',$_REQUEST['barrio']);
            $almPersona->__SET('ciudad',$_REQUEST['ciudad']);
            $modelPersona->Actualizar($almPersona);
            if ($_SESSION['rol']==1) {
                echo"<script type=\"text/javascript\">alert('Actualización Exitosa'); window.location='?action=Persona';</script>";
            }elseif ($_SESSION['rol']==2) {
                echo"<script type=\"text/javascript\">alert('Actualización Exitosa'); window.location='?action=Admin_Personas_Reporte';</script>";
            }            
            break;
        case 'Persona_eliminar':
            $modelPersona->Eliminar($_REQUEST['id']);
            echo"<script type=\"text/javascript\">alert('Eliminado Exitoso'); window.location='?action=Persona';</script>";
            break;
        case 'Ventas':
            include 'views/Formularios/Ventas/index.php';
            break;
        case 'Ventas_En_Proceso':
            include 'views/Formularios/Ventas/index_en_proceso.php';
            break;
        case 'Form_Ventas_Insertar':
            if (!isset($_SESSION)) session_start();

            if($_SESSION['idfactura']==null){
                if ($_SESSION['rol']==1) {
                    include 'views/Formularios/Ventas/insertar.php';
                }elseif ($_SESSION['rol']==3) {
                    
                }
                
            }else{
                if ($_SESSION['rol']==1) {
                    echo"<script type=\"text/javascript\">alert('EXISTE UNA FACTURA POR PROCESAR'); window.location='?action=Form_Ventas_Arancel';</script>"; 
                }elseif ($_SESSION['rol']==3) {
                    echo"<script type=\"text/javascript\">alert('EXISTE UNA FACTURA POR PROCESAR'); window.location='?action=Secretaria_Form_Ventas_Arancel';</script>"; 
                }               
            }            
            break;
        case 'Ventas_Insertar':
            $almVentas->__SET('id',$_REQUEST['id']);
            $almVentas->__SET('fecha',$_REQUEST['fecha']);
            $almVentas->__SET('vendedor',$_REQUEST['vendedor']);
            $almVentas->__SET('cliente',$_REQUEST['cliente']);
            $almVentas->__SET('carros_id',$_REQUEST['carros_id']);
            $almVentas->__SET('total',$_REQUEST['total']);
            $modelVentas->Registrar($almVentas);
            if (!isset($_SESSION)) session_start();
            $_SESSION['idfactura']=$_REQUEST['id'];
            if ($_SESSION['rol']==1) {
                echo"<script type=\"text/javascript\">alert('Ahora Procedera A Registrar Los Aranceles'); window.location='?action=Form_Ventas_Arancel';</script>";
            }elseif ($_SESSION['rol']==3) {
                echo"<script type=\"text/javascript\">alert('Ahora Procedera A Registrar Los Aranceles'); window.location='?action=Secretaria_Form_Ventas_Arancel';</script>";
            }
            
            break;
        case 'Ventas_Arancel':
            include 'views/Formularios/Ventas_Arancel/index.php';
            break;   
        case 'Form_Ventas_Arancel':
            include 'views/Formularios/Ventas_Arancel/insertar.php';
            break;
        case 'Ventas_Finalizar':
            if (!isset($_SESSION)) session_start();
            $modelVentas->Finalizar_Venta($_REQUEST['id']);
            $modelVentas->Vender_Vehiculo($_REQUEST['id']);
            $_SESSION['idfactura']=null;
            echo"<script type=\"text/javascript\">alert('Venta Finalizada'); window.location='?action=Ventas';</script>";
            break;
        case 'Ventas_Cancelar':
            session_start();
            $modelVentas->Cancelar_Venta_Arancel($_REQUEST['id']);
            $modelVentas->Cancelar_Venta($_REQUEST['id']);
            $_SESSION['idfactura']=null;
            if ($_SESSION['rol']==1) {
                echo"<script type=\"text/javascript\">alert('Venta Cancelada'); window.location='?action=Ventas';</script>";
            }elseif ($_SESSION['rol']==3) {
                echo"<script type=\"text/javascript\">alert('Venta Cancelada'); window.location='?action=Secretaria_Ventas';</script>";
            }
            
            break;
        case 'Ventas_Eliminar':
            $modelVentas->Anular_Venta($_REQUEST['id']);
            if (!isset($_SESSION)) session_start();
            $_SESSION['idfactura']=null;
            if ($_SESSION['rol']==1) {
                echo"<script type=\"text/javascript\">alert('ELIMINADO EXITOSO'); window.location='?action=Ventas';</script>";
            }elseif ($_SESSION['rol']==3) {
                echo"<script type=\"text/javascript\">alert('ELIMINADO EXITOSO'); window.location='?action=Secretaria_Ventas';</script>";
            }
            
            break;
        case 'Ventas_Arancel_registrar':            
            $almVentas_Arancel->__SET('id',$_REQUEST['id']);
            $almVentas_Arancel->__SET('aranceles_id',$_REQUEST['aranceles_id']);
            $almVentas_Arancel->__SET('ventas_id',$_REQUEST['ventas_id']);
            $almVentas_Arancel->__SET('persona_id',$_REQUEST['persona_id']);
            $modelVentas_Arancel->Registrar($almVentas_Arancel);
            echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='?action=Form_Ventas_Arancel';</script>";
            break;
        case 'Admin_roles_Usuarios':
            include 'views/Administrador/Formularios/Roles/index.php';
            break;
        case 'Admin_Usuarios_Reporte':
            include 'views/Administrador/Formularios/Usuarios/index.php';
            break;
        case 'Admin_Detalle_Usuarios_Reporte':
            include 'views/Administrador/Formularios/Usuarios/reporte.php';
            break;
        case 'Admin_Personas_Reporte':
            include 'views/Administrador/Formularios/Persona/index.php';
            break;
        case 'Admin_Personas_Insertar':
            include 'views/Administrador/Formularios/Persona/insertar.php';
            break;
        case 'Admin_Personas_Actualizar':
            include 'views/Administrador/Formularios/Persona/actualizar.php';
            break;
        case 'Admin_Pais_Reporte':
            include 'views/Administrador/Formularios/Pais/index.php';
            break;
        case 'Admin_Departamento_Reporte':
            include 'views/Administrador/Formularios/Departamento/index.php';
            break;
        case 'Admin_Ciudad_Reporte':
            include 'views/Administrador/Formularios/Ciudad/index.php';
            break;
        case 'Admin_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Carros/index.php';
            break;
        case 'Admin_Detalle_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Carros/reporte.php';
            break;
        case 'Admin_Aranceles_Reporte':
            include 'views/Administrador/Formularios/Aranceles/index.php';
            break;
        case 'Admin_Tipos_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Tipo_carro/index.php';
            break;
        case 'Admin_Marcas_Reporte':
            include 'views/Administrador/Formularios/Marca/index.php';
            break;
        case 'Admin_Modelos_Reporte':
            include 'views/Administrador/Formularios/Modelos/index.php';
            break;
        case 'Admin_Tipos_De_Imagenes_Reporte':
            include 'views/Administrador/Formularios/Tipo_foto/index.php';
            break;
        case 'Admin_Imagenes_De_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Imagenes/index.php';
            break;
        case 'Admin_Tipos_De_Documentacion_De_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Tip_docu/index.php';
            break;
        case 'Admin_Documentacion_De_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Documentacion/index.php';
            break;
        case 'Admin_Tipo_De_Egresos_De_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Tipos_egreso/index.php';
            break;
        case 'Admin_Egresos_De_Vehiculos_Reporte':
            include 'views/Administrador/Formularios/Egresos/index.php';
            break;
        case 'Admin_Ventas_Reporte':
            include 'views/Administrador/Formularios/Ventas/index.php';
            break;
        case 'Admin_Detalle_Ventas_Reporte':
            include 'views/Administrador/Formularios/Ventas/reporte.php';
            break;
        case 'Admin_Usuarios_Activos':
            include 'views/Administrador/Formularios/Usuarios/index_activos.php';
            break;
        case 'Admin_Form_Usuarios_Reporte':
            include 'views/Administrador/Formularios/Usuarios/reporte.php';
            break;
        case 'Admin_Usuarios_Inactivos':
            include 'views/Administrador/Formularios/Usuarios/index_inactivos.php';
            break;
        case 'Admin_Carros_Vendidos':
            include 'views/Administrador/Formularios/Carros/index_vendidos.php';
            break;
        case 'Admin_Form_Carro_Reporte':
            include 'views/Administrador/Formularios/Carros/reporte.php';
            break;
        case 'Recuperar_Clave':
            include 'views/Formularios/Recuperar/Recuperar_Clave.php';
            break;
        case 'Admin_Ventas_En_Proceso':
            include 'views/Administrador/Formularios/Ventas/index_en_proceso.php';
            break;
        case 'recuperar_clave_correo':
            $consulta=$modelRecuperar->Obtener($_REQUEST['usuario'], $_REQUEST['persona'], $_REQUEST['nombres'], $_REQUEST['apellidos']);
            if($consulta -> __GET('usuario') == $_REQUEST['usuario']){
                if (!isset($_SESSION)) session_start();
                $_SESSION['usuarioTemporal']=$consulta -> __GET('usuario');

                echo"<script type=\"text/javascript\">alert('Datos Exitosos, Procesa A Cambiar Su Clave'); window.location='?action=Form_Cambiar_Clave_Recuperar';</script>";
            }else{
                echo"<script type=\"text/javascript\">alert('ERROR. DATOS ERRONEOS'); window.location='?action=Recuperar_Clave';</script>";
            }
            break;
        case 'Form_Cambiar_Clave_Recuperar':
            include 'views/Formularios/Recuperar/cambiar_clave.php';
            break;
        case 'Cambiar_Clave_Recuperar':
            if (!isset($_SESSION)) session_start();
            $almUsuarios->__SET('usuario',$_REQUEST['usuario']);
            $almUsuarios->__SET('clave',$_REQUEST['clave']);
            $modelUsuarios->Actualizar_Clave($almUsuarios);
            $_SESSION['usuarioTemporal']=null;
            echo"<script type=\"text/javascript\">alert('Cambio Exitoso. Procesa A Logearse'); window.location='?action=login';</script>";
            break;
        case 'Vendedor_Vehiculo_Buscar_PorPlaca':
            include 'views/Vendedor/Formularios/Carros/Por_Placa.php';
            break;
        case 'Vendedor_Form_Carro_Reporte':
            include 'views/Vendedor/Formularios/Carros/reporte.php';
            break;
        case 'Vendedor_Vehiculo_Buscar_PorTipo':
            include 'views/Vendedor/Formularios/Carros/Por_Tipo.php';
            break;
        case 'Vendedor_Form_Carro_Reporte_PorTipo':
            include 'views/Vendedor/Formularios/Carros/reporte_PorTipo.php';
            break;
        case 'Vendedor_Vehiculo_Buscar_PorMarca':
            include 'views/Vendedor/Formularios/Carros/Por_Marca.php';
            break;
        case 'Vendedor_Form_Carro_Reporte_PorMarca':
            include 'views/Vendedor/Formularios/Carros/reporte_PorMarca.php';
            break;
        case 'Vendedor_Persona_Buscar':
            include 'views/Vendedor/Formularios/Persona/index.php';
            break;
        case 'Secretaria_Ventas':
            include 'views/Secretaria/Formularios/Ventas/index.php';
            break;
        case 'Secretaria_Form_Ventas_Insertar':
            if (!isset($_SESSION)) session_start();
            if($_SESSION['idfactura']==null){
                include 'views/Secretaria/Formularios/Ventas/insertar.php';
            }else{
                echo"<script type=\"text/javascript\">alert('EXISTE UNA FACTURA POR PROCESAR'); window.location='?action=Secretaria_Form_Ventas_Arancel';</script>";                
            }            
            break;
        case 'Secretaria_Form_Ventas_Arancel':
            include 'views/Secretaria/Formularios/Ventas_Arancel/insertar.php';
            break;
        case 'Secretaria_Form_Ventas_Reporte':
            include 'views/Secretaria/Formularios/Ventas/reporte.php';
            break;
        case 'Secretaria_Ventas_Arancel':
            include 'views/Secretaria/Formularios/Ventas_Arancel/index.php';
            break;
        case 'Secretaria_Egresos':
            include 'views/Secretaria/Formularios/Egresos/index.php';
            break;
        case 'Secretaria_Form_Egresos_insertar':
            include 'views/Secretaria/Formularios/Egresos/insertar.php';
            break;
        case 'Secretaria_Form_Egresos_actualizar':
            include 'views/Secretaria/Formularios/Egresos/actualizar.php';
            break;
        case 'Secretaria_Vehiculo_Buscar_PorPlaca':
            include 'views/Secretaria/Formularios/Carros/Por_Placa.php';
            break;
        case 'Secretaria_Form_Carro_Reporte':
            include 'views/Secretaria/Formularios/Carros/reporte.php';
            break;
        case 'Secretaria_Vehiculo_Buscar_PorTipo':
            include 'views/Secretaria/Formularios/Carros/Por_Tipo.php';
            break;
        case 'Secretaria_Form_Carro_Reporte_PorTipo':
            include 'views/Secretaria/Formularios/Carros/reporte_PorTipo.php';
            break;
        case 'Secretaria_Vehiculo_Buscar_PorMarca':
            include 'views/Secretaria/Formularios/Carros/Por_Marca.php';
            break;
        case 'Secretaria_Form_Carro_Reporte_PorMarca':
            include 'views/Secretaria/Formularios/Carros/reporte_PorMarca.php';
            break;
        case 'Secretaria_Persona_Buscar':
            include 'views/Secretaria/Formularios/Persona/index.php';
            break;
        case 'Secretaria_Ventas_En_Proceso':
            include 'views/Secretaria/Formularios/Ventas/index_en_proceso.php';
            break;
         case 'requerimiento_Egreso':
            include 'views/Formularios/Egresos/requerimiento.php';
            break;
        case 'requerimiento_Vendedores':
            include 'views/Formularios/Usuarios/requerimiento.php';
            break;   










        case 'Form_Ventas_Reporte':
            if (!isset($_SESSION)) session_start();
            if($_SESSION['rol']==1){
                include 'views/Formularios/Ventas/reporte.php';
            }elseif ($_SESSION['rol']==2) {
                include 'views/Administrador/Formularios/Ventas/reporte.php';                
            }
            
            break;






        case '404':
           include 'views/404.php';
            break;
                
        default:
            header('Location: ?action=404');
    }
}else{
    header('Location: ?action=inicio');
    exit;
}           
?>