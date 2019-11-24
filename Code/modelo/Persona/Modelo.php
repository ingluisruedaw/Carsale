<?php
include_once("./modelo/conexion.php");
class Persona_Model{
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
							  persona.id,
							  concat(persona.nombres, ' ', persona.apellidos) AS nombres,
							  persona.sexo,
							  persona.email,
							  persona.direccion,
							  persona.barrio,
							  concat(ciudad.det,' - ',departamento.det) AS ciudad 
							FROM
							  persona
							  INNER JOIN ciudad ON (persona.ciudad = ciudad.id)
							  INNER JOIN departamento ON (ciudad.depto = departamento.id)");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almPersona = new Persona();
				$almPersona->__SET('id', $r->id);
				$almPersona->__SET('nombres', $r->nombres);
				$almPersona->__SET('sexo', $r->sexo);
				$almPersona->__SET('email', $r->email);
				$almPersona->__SET('direccion', $r->direccion);
				$almPersona->__SET('barrio', $r->barrio);
				$almPersona->__SET('ciudad', $r->ciudad);
				$result[] = $almPersona;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  persona.nombres,
								  persona.apellidos,
								  persona.sexo,
								  persona.email,
								  persona.direccion,
								  persona.barrio,
								  persona.ciudad
								FROM
								  persona
								WHERE
								  persona.id = ?");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almPersona = new Persona();

			$almPersona->__SET('nombres', $r->nombres);
			$almPersona->__SET('apellidos', $r->apellidos);
			$almPersona->__SET('sexo', $r->sexo);
			$almPersona->__SET('email', $r->email);
			$almPersona->__SET('direccion', $r->direccion);
			$almPersona->__SET('barrio', $r->barrio);
			$almPersona->__SET('ciudad', $r->ciudad);

			return $almPersona;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener_Registros(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  persona");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almPersona = new Persona();
			$almPersona->__SET('cantidad', $r->cantidad);

			return $almPersona;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  persona
								WHERE
								  persona.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(Persona $data){
		try {
			$sql = "UPDATE
					  persona
					SET
					  nombres = ?,
					  apellidos = ?,
					  sexo = ?,
					  email = ?,
					  direccion = ?,
					  barrio = ?,
					  ciudad = ?
					WHERE
					  persona.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('nombres'),
						$data->__GET('apellidos'),
						$data->__GET('sexo'),
						$data->__GET('email'),
						$data->__GET('direccion'),
						$data->__GET('barrio'),
						$data->__GET('ciudad'),						
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Persona $data){
		try {
		$sql = "INSERT INTO
				  persona(
				  id,
				  nombres,
				  apellidos,
				  sexo,
				  email,
				  direccion,
				  barrio,
				  ciudad)
				VALUES(
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('nombres'),
				$data->__GET('apellidos'),
				$data->__GET('sexo'),
				$data->__GET('email'),
				$data->__GET('direccion'),
				$data->__GET('barrio'),
				$data->__GET('ciudad')
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>