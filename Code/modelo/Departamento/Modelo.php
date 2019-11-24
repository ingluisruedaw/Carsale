<?php
include_once("./modelo/conexion.php");
class Departamento_Model{
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
										  departamento.id as id,
										  departamento.det as det,
										  pais.det as pais
										FROM
										  departamento
										  INNER JOIN pais ON (departamento.pais = pais.id)");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almDepartamento = new Departamento();
				$almDepartamento->__SET('id', $r->id);
				$almDepartamento->__SET('det', $r->det);
				$almDepartamento->__SET('pais', $r->pais);

				$result[] = $almDepartamento;
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
								  departamento.id,
								  departamento.det,
								  departamento.pais
								FROM
								  departamento
								  INNER JOIN pais ON (departamento.pais = pais.id)
								WHERE
								  departamento.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almDepartamento = new Departamento();

			$almDepartamento->__SET('id', $r->id);
			$almDepartamento->__SET('det', $r->det);
			$almDepartamento->__SET('pais', $r->pais);

			return $almDepartamento;
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
								  departamento");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almDepartamento = new Departamento();
			$almDepartamento->__SET('cantidad', $r->cantidad);

			return $almDepartamento;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  departamento
								WHERE
								  departamento.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Departamento';</script>";			
		}
	}

	public function Actualizar(Departamento $data){
		try {
			$sql = "UPDATE
					  departamento
					SET
					  det = ?,
					  pais = ?
					WHERE
					  departamento.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('det'),
						$data->__GET('pais'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Departamento $data){
		try {
		$sql = "INSERT INTO
				  departamento(
				  id,
				  det,
				  pais)
				VALUES(
				  ?,
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('det'),
				$data->__GET('pais')
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Departamento';</script>";
		}
	}
}
?>