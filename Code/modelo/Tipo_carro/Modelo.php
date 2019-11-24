<?php
include_once("./modelo/conexion.php");
class Tipo_carro_Model{
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

			$stm = $this->conexion->prepare("SELECT * FROM tipo_carro");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almTipo_carro = new Tipo_carro();
				$almTipo_carro->__SET('id', $r->id);
				$almTipo_carro->__SET('det', $r->det);

				$result[] = $almTipo_carro;
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
								  tipo_carro.det
								FROM
								  tipo_carro
								WHERE
								  tipo_carro.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almTipo_carro = new Tipo_carro();
			$almTipo_carro->__SET('det', $r->det);

			return $almTipo_carro;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  tipo_carro");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTipo_carro = new Tipo_carro();
			$almTipo_carro->__SET('id', $r->id);

			return $almTipo_carro;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM tipo_carro");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTipo_carro = new Tipo_carro();
			$almTipo_carro->__SET('cantidad', $r->cantidad);

			return $almTipo_carro;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM tipo_carro WHERE tipo_carro.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Tipo_carro';</script>";
		}
	}

	public function Actualizar(Tipo_carro $data){
		try {
			$sql = "UPDATE
					  tipo_carro
					SET
					  det = ?
					WHERE
					  tipo_carro.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('det'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Actualizar'); window.location='?action=Tipo_carro';</script>";
		}
	}

	public function Registrar(Tipo_carro $data)
	{
		try 
		{
		$sql = "INSERT INTO
				  tipo_carro(
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
			echo"<script type=\"text/javascript\">alert('Error Al Registrar'); window.location='?action=Tipo_carro';</script>";
		}
	}
}
?>