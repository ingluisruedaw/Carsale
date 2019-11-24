<?php
include_once("./modelo/conexion.php");
class Tipo_foto_Model{
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

			$stm = $this->conexion->prepare("SELECT id,det FROM tipofoto");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almTipo_foto = new Tipo_foto();
				$almTipo_foto->__SET('id', $r->id);
				$almTipo_foto->__SET('det', $r->det);

				$result[] = $almTipo_foto;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT id,det
						FROM
						  tipofoto
						WHERE
						  tipofoto.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almTipo_foto = new Tipo_foto();

			$almTipo_foto->__SET('id', $r->id);
			$almTipo_foto->__SET('det', $r->det);

			return $almTipo_foto;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  tipofoto");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTipo_foto = new Tipo_foto();
			$almTipo_foto->__SET('id', $r->id);

			return $almTipo_foto;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM tipofoto");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTipo_foto = new Tipo_foto();
			$almTipo_foto->__SET('cantidad', $r->cantidad);

			return $almTipo_foto;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM tipofoto WHERE tipofoto.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(Tipo_foto $data){
		try {
			$sql = "UPDATE
					  tipofoto
					SET
					  det = ?
					WHERE
					  tipofoto.id = ?";

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

	public function Registrar(Tipo_foto $data)
	{
		try 
		{
		$sql = "INSERT INTO
				  tipofoto(
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
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
}
?>