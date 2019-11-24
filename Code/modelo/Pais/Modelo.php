<?php
include_once("./modelo/conexion.php");
class Pais_Model{
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

			$stm = $this->conexion->prepare("SELECT * FROM pais");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almPais = new Pais();
				$almPais->__SET('id', $r->id);
				$almPais->__SET('det', $r->det);

				$result[] = $almPais;
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
								  pais.det
								FROM
								  pais
								WHERE
								  pais.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almPais = new Pais();
			$almPais->__SET('det', $r->det);

			return $almPais;
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
								  pais");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almPais = new Pais();
			$almPais->__SET('cantidad', $r->cantidad);

			return $almPais;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM pais WHERE pais.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Form_Pais_eliminar';</script>";
		}
	}

	public function Actualizar(Pais $data){
		try {
			$sql = "UPDATE
					  pais
					SET
					  det = ?
					WHERE
					  pais.id = ?";

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

	public function Registrar(Pais $data){
		try {
		$sql = "INSERT INTO
				  pais(
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
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Pais';</script>";
		}
	}
}
?>