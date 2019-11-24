<?php
include_once("./modelo/conexion.php");
class Roles_Model{
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

			$stm = $this->conexion->prepare("SELECT * FROM roles");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almRoles = new Roles();
				$almRoles->__SET('id', $r->id);
				$almRoles->__SET('det', $r->det);

				$result[] = $almRoles;
			}

			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT *
						FROM
						  roles
						WHERE
						  roles.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almRoles = new Roles();

			$almRoles->__SET('id', $r->id);
			$almRoles->__SET('det', $r->det);

			return $almRoles;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  roles");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almRoles = new Roles();
			$almRoles->__SET('id', $r->id);

			return $almRoles;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  roles");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almRoles = new Roles();
			$almRoles->__SET('cantidad', $r->cantidad);

			return $almRoles;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM roles WHERE roles.id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?id=Form_Rol_eliminar';</script>";
		}
	}

	public function Actualizar(Roles $data){
		try {
			$sql = "UPDATE
					  roles
					SET
					  det = ?
					WHERE
					  roles.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('det'),
						$data->__GET('id')						 
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Roles $data){
		try 
		{
		$sql = "INSERT INTO
				  roles(
				  id,
				  det)
				VALUES(
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('det')
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?id=Rol_Usuarios';</script>";
		}
	}
}
?>