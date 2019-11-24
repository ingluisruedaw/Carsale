<?php
include_once("./modelo/conexion.php");
class Tip_docu_Model{
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

			$stm = $this->conexion->prepare("SELECT id,det FROM tip_docu");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almTip_docu = new Tip_docu();
				$almTip_docu->__SET('id', $r->id);
				$almTip_docu->__SET('det', $r->det);

				$result[] = $almTip_docu;
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
						  tip_docu
						WHERE
						  tip_docu.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almTip_docu = new Tip_docu();

			$almTip_docu->__SET('id', $r->id);
			$almTip_docu->__SET('det', $r->det);

			return $almTip_docu;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  tip_docu");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTip_docu = new Tip_docu();
			$almTip_docu->__SET('id', $r->id);

			return $almTip_docu;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM tip_docu");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTip_docu = new Tip_docu();
			$almTip_docu->__SET('cantidad', $r->cantidad);

			return $almTip_docu;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM tip_docu WHERE tip_docu.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(Tip_docu $data){
		try {
			$sql = "UPDATE
					  tip_docu
					SET
					  det = ?
					WHERE
					  tip_docu.id = ?";

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

	public function Registrar(Tip_docu $data)
	{
		try 
		{
		$sql = "INSERT INTO
				  tip_docu(
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