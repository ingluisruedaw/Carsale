<?php
include_once("./modelo/conexion.php");
class Documentacion_Model{
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
											  documentacion.id,
											  documentacion.carros_id,
											  tip_docu.det as tip_docu,
											  documentacion.documento,
											  documentacion.fvence,
											  documentacion.estado
											FROM
											  documentacion
											  INNER JOIN tip_docu ON (documentacion.tip_docu = tip_docu.id)");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almDocumentacion = new Documentacion();
				$almDocumentacion->__SET('id', $r->id);
				$almDocumentacion->__SET('carros_id', $r->carros_id);
				$almDocumentacion->__SET('tip_docu', $r->tip_docu);
				$almDocumentacion->__SET('documento', $r->documento);
				$almDocumentacion->__SET('fvence', $r->fvence);
				$almDocumentacion->__SET('estado', $r->estado);
				$result[] = $almDocumentacion;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_Documentaciones($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  documentacion.id,
											  tip_docu.det as tip_docu,
											  documentacion.documento,
											  documentacion.fvence,
											  documentacion.estado
											FROM
											  documentacion
											  INNER JOIN tip_docu ON (documentacion.tip_docu = tip_docu.id)
											WHERE
											  documentacion.carros_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almDocumentacion = new Documentacion();
				$almDocumentacion->__SET('id', $r->id);
				$almDocumentacion->__SET('tip_docu', $r->tip_docu);
				$almDocumentacion->__SET('documento', $r->documento);
				$almDocumentacion->__SET('fvence', $r->fvence);
				$almDocumentacion->__SET('estado', $r->estado);
				$result[] = $almDocumentacion;
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
									  documentacion.id,
									  documentacion.carros_id,
									  tip_docu.det AS tip_docu,
									  documentacion.documento,
									  documentacion.fvence,
									  documentacion.estado
									FROM
									  documentacion
									  INNER JOIN tip_docu ON (documentacion.tip_docu = tip_docu.id)
									WHERE
									  documentacion.id = ?");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almDocumentacion = new Documentacion();

			$almDocumentacion->__SET('id', $r->id);
			$almDocumentacion->__SET('carros_id', $r->carros_id);
			$almDocumentacion->__SET('tip_docu', $r->tip_docu);
			$almDocumentacion->__SET('documento', $r->documento);
			$almDocumentacion->__SET('fvence', $r->fvence);
			$almDocumentacion->__SET('estado', $r->estado);

			return $almDocumentacion;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  documentacion");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almDocumentacion = new Documentacion();
			$almDocumentacion->__SET('id', $r->id);

			return $almDocumentacion;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM documentacion");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almDocumentacion = new Documentacion();
			$almDocumentacion->__SET('cantidad', $r->cantidad);

			return $almDocumentacion;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
									FROM
									  documentacion
									WHERE
									  documentacion.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Documentacion';</script>";
		}
	}

	public function Actualizar(Documentacion $data){
		try {
			$sql = "UPDATE
					  documentacion
					SET
					  carros_id = ?,
					  tip_docu = ?,
					  documento = ?,
					  fvence = ?,
					  estado = ?
					WHERE
					  documentacion.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(array(
						$data->__GET('carros_id'),
						$data->__GET('tip_docu'),
						$data->__GET('documento'),
						$data->__GET('fvence'),
						$data->__GET('estado'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar_Sin_Imagen(Documentacion $data){
		try {
			$sql = "UPDATE
					  documentacion
					SET
					  carros_id = ?,
					  tip_docu = ?,
					  fvence = ?,
					  estado = ?
					WHERE
					  documentacion.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(array(
						$data->__GET('carros_id'),
						$data->__GET('tip_docu'),
						$data->__GET('fvence'),
						$data->__GET('estado'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Documentacion $data){
		try {
		$sql = "INSERT INTO
				  documentacion(
				  id,
				  carros_id,
				  tip_docu,
				  documento,
				  fvence,
				  estado)
				VALUES(
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
				$data->__GET('carros_id'),
				$data->__GET('tip_docu'),
				$data->__GET('documento'),
				$data->__GET('fvence'),
				$data->__GET('estado')				
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Documentacion';</script>";
		}
	}
}
?>