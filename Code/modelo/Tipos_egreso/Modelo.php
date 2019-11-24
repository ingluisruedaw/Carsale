<?php
include_once("./modelo/conexion.php");
class Tipos_egreso_Model{
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

			$stm = $this->conexion->prepare("SELECT id,det FROM tipos_egreso");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almTipos_egreso = new Tipos_egreso();
				$almTipos_egreso->__SET('id', $r->id);
				$almTipos_egreso->__SET('det', $r->det);

				$result[] = $almTipos_egreso;
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
						  tipos_egreso
						WHERE
						  tipos_egreso.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almTipos_egreso = new Tipos_egreso();

			$almTipos_egreso->__SET('id', $r->id);
			$almTipos_egreso->__SET('det', $r->det);

			return $almTipos_egreso;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  tipos_egreso");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTipos_egreso = new Tipos_egreso();
			$almTipos_egreso->__SET('id', $r->id);

			return $almTipos_egreso;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM tipos_egreso");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almTipos_egreso = new Tipos_egreso();
			$almTipos_egreso->__SET('cantidad', $r->cantidad);

			return $almTipos_egreso;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM tipos_egreso WHERE tipos_egreso.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Form_Tipos_egreso_eliminar';</script>";
		}
	}

	public function Actualizar(Tipos_egreso $data){
		try {
			$sql = "UPDATE
					  tipos_egreso
					SET
					  det = ?
					WHERE
					  tipos_egreso.id = ?";

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

	public function Registrar(Tipos_egreso $data)
	{
		try 
		{
		$sql = "INSERT INTO
				  tipos_egreso(
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
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Tipos_egreso';</script>";
		}
	}
}
?>