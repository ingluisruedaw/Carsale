<?php
include_once("./modelo/conexion.php");
class Usuarios_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this->conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar(){
		try{
			$result = array();

			$stm = $this->conexion->prepare("SELECT 
											  usuarios.usuario,
											  usuarios.rol,
											  usuarios.persona as idpersona,
											  concat(persona.nombres,' ',persona.apellidos) as persona,
											  usuarios.estado as estado
											FROM
											  usuarios
											  INNER JOIN persona ON (usuarios.persona = persona.id)");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almUsuarios = new Usuarios();
				$almUsuarios->__SET('usuario', $r->usuario);
				$almUsuarios->__SET('rol', $r->rol);
				$almUsuarios->__SET('idpersona', $r->idpersona);
				$almUsuarios->__SET('persona', $r->persona);
				$almUsuarios->__SET('estado', $r->estado);
				$result[] = $almUsuarios;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	
	public function Listar_requerimiento(){//requerimiento
		try{
			$result = array();

			$stm = $this->conexion->prepare("select u.usuario, sum(v.total) as total, count(v.`carros_id`) as carros from usuarios u inner join ventas v on u.persona=v.vendedor GROUP BY u.usuario");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almUsuarios = new Usuarios();
				$almUsuarios->__SET('usuario', $r->usuario);
				$almUsuarios->__SET('total', $r->total);
				$almUsuarios->__SET('carros', $r->carros);
				$result[] = $almUsuarios;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_Activos(){
		try{
			$result = array();

			$stm = $this->conexion->prepare("SELECT 
											  usuarios.usuario,
											  usuarios.rol,
											  usuarios.persona AS idpersona,
											  concat(persona.nombres, ' ', persona.apellidos) AS persona
											FROM
											  usuarios
											  INNER JOIN persona ON (usuarios.persona = persona.id)
											WHERE
											  usuarios.estado = 1");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almUsuarios = new Usuarios();
				$almUsuarios->__SET('usuario', $r->usuario);
				$almUsuarios->__SET('rol', $r->rol);
				$almUsuarios->__SET('idpersona', $r->idpersona);
				$almUsuarios->__SET('persona', $r->persona);
				$result[] = $almUsuarios;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_Inactivos(){
		try{
			$result = array();

			$stm = $this->conexion->prepare("SELECT 
											  usuarios.usuario,
											  usuarios.rol,
											  usuarios.persona AS idpersona,
											  concat(persona.nombres, ' ', persona.apellidos) AS persona
											FROM
											  usuarios
											  INNER JOIN persona ON (usuarios.persona = persona.id)
											WHERE
											  usuarios.estado = 2");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almUsuarios = new Usuarios();
				$almUsuarios->__SET('usuario', $r->usuario);
				$almUsuarios->__SET('rol', $r->rol);
				$almUsuarios->__SET('idpersona', $r->idpersona);
				$almUsuarios->__SET('persona', $r->persona);
				$result[] = $almUsuarios;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  usuarios.rol,
								  usuarios.estado,
								  usuarios.persona
								FROM
								  usuarios
								WHERE
								  usuarios.usuario = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almUsuarios = new Usuarios();

			$almUsuarios->__SET('rol', $r->rol);
			$almUsuarios->__SET('estado', $r->estado);
			$almUsuarios->__SET('persona', $r->persona);

			return $almUsuarios;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_Existentes(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  usuarios");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almUsuarios = new Usuarios();
			$almUsuarios->__SET('cantidad', $r->cantidad);

			return $almUsuarios;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_Activos(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  usuarios
								WHERE
								  usuarios.estado = 1");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almUsuarios = new Usuarios();
			$almUsuarios->__SET('cantidad', $r->cantidad);

			return $almUsuarios;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_Inactivos(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  usuarios
								WHERE
								  usuarios.estado = 2");
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almUsuarios = new Usuarios();
			$almUsuarios->__SET('cantidad', $r->cantidad);

			return $almUsuarios;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM usuarios WHERE usuarios.usuario = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Form_Usuarios_eliminar';</script>";
		}
	}

	public function Actualizar(Usuarios $data){
		try {
			$sql = "UPDATE
					  usuarios
					SET
					  rol = ?,
					  persona = ?,
					  estado = ? 
					WHERE
					  usuarios.usuario = ?";

			$this->conexion->prepare($sql)
			     ->execute(
				array(
					$data->__GET('rol'),
					$data->__GET('persona'),
					$data->__GET('estado'),
					$data->__GET('usuario')					 
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar_Clave(Usuarios $data){
		try {
			$form_pass = $data->__GET('clave');
			$hash = password_hash($form_pass, PASSWORD_BCRYPT); 
			$sql = "UPDATE
					  usuarios
					SET
					  clave = '$hash'
					WHERE
					  usuarios.usuario = ?";

			$this->conexion->prepare($sql)
			     ->execute(
				array(
					$data->__GET('usuario')
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Usuarios $data){
		$form_pass = $data->__GET('clave');
		$hash = password_hash($form_pass, PASSWORD_BCRYPT); 
		try {
		$sql = "INSERT INTO usuarios(usuario,rol,persona,estado,clave) VALUES(?,?,?,?,'$hash')";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('usuario'),
				$data->__GET('rol'),
				$data->__GET('persona'),
				$data->__GET('estado')
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Usuarios';</script>";
		}
	}
}
?>