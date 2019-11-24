<?php
include_once("./modelo/conexion.php");
class Ciudad_Model{
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
											  ciudad.id,
											  ciudad.det,
											  departamento.det AS depto,
											  pais.det as pais
											FROM
											  ciudad
											  INNER JOIN departamento ON (ciudad.depto = departamento.id)
											  INNER JOIN pais ON (departamento.pais = pais.id)
											ORDER BY
											  ciudad.det");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCiudad = new Ciudad();
				$almCiudad->__SET('id', $r->id);
				$almCiudad->__SET('det', $r->det);
				$almCiudad->__SET('depto', $r->depto);
				$almCiudad->__SET('pais', $r->pais);
				$result[] = $almCiudad;
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
								  ciudad.det,
								  ciudad.depto
								FROM
								  ciudad
								WHERE
								  ciudad.id = ?");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almCiudad = new Ciudad();

			$almCiudad->__SET('det', $r->det);
			$almCiudad->__SET('depto', $r->depto);

			return $almCiudad;
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
								  ciudad");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCiudad = new Ciudad();
			$almCiudad->__SET('cantidad', $r->cantidad);

			return $almCiudad;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  ciudad limit 1000000");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCiudad = new Ciudad();
			$almCiudad->__SET('id', $r->id);

			return $almCiudad;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  ciudad
								WHERE
								  ciudad.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Ciudad';</script>";
		}
	}

	public function Actualizar(Ciudad $data){
		try {
			$sql = "UPDATE
					  ciudad
					SET
					  det = ?,
					  depto = ?
					WHERE
					  ciudad.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('det'),
						$data->__GET('depto'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Ciudad $data){
		try {
		$sql = "INSERT INTO
				  ciudad(
				  id,
				  det,
				  depto)
				VALUES(
				  ?,
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('det'),
				$data->__GET('depto')
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Ciudad';</script>";
		}
	}
}
?>