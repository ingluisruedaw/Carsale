<?php
include_once("./modelo/conexion.php");
class Imagenes_Model{
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
											  imagenes.id,
											  imagenes.carro,
											  tipofoto.det as tipo,
											  imagenes.foto
											FROM
											  imagenes
											  INNER JOIN tipofoto ON (imagenes.tipo = tipofoto.id)");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almImagenes = new Imagenes();
				$almImagenes->__SET('id', $r->id);
				$almImagenes->__SET('carro', $r->carro);
				$almImagenes->__SET('tipo', $r->tipo);
				$almImagenes->__SET('foto', $r->foto);
				$result[] = $almImagenes;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener_Imagenes($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  imagenes.id,
											  tipofoto.det AS tipo,
											  imagenes.foto
											FROM
											  imagenes
											  INNER JOIN tipofoto ON (imagenes.tipo = tipofoto.id)
											WHERE
											  imagenes.carro = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almImagenes = new Imagenes();
				$almImagenes->__SET('id', $r->id);
				$almImagenes->__SET('tipo', $r->tipo);
				$almImagenes->__SET('foto', $r->foto);
				$result[] = $almImagenes;
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
								  imagenes.id,
								  imagenes.carro,
								  imagenes.tipo,
								  imagenes.foto
								FROM
								  imagenes
								WHERE
								  imagenes.id = ?");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almImagenes = new Imagenes();

			$almImagenes->__SET('id', $r->id);
			$almImagenes->__SET('carro', $r->carro);
			$almImagenes->__SET('tipo', $r->tipo);
			$almImagenes->__SET('foto', $r->foto);

			return $almImagenes;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  imagenes");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almImagenes = new Imagenes();
			$almImagenes->__SET('id', $r->id);

			return $almImagenes;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM imagenes");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almImagenes = new Imagenes();
			$almImagenes->__SET('cantidad', $r->cantidad);

			return $almImagenes;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  imagenes
								WHERE
								  imagenes.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Form_Imagenes_eliminar';</script>";
		}
	}

	public function Actualizar(Imagenes $data){
		try {
			$sql = "UPDATE
					  imagenes
					SET
					  carro = ?,
					  tipo = ?,
					  foto = ?
					WHERE
					  imagenes.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(array(
						$data->__GET('carro'),
						$data->__GET('tipo'),
						$data->__GET('foto'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Imagenes $data){
		try {
		$sql = "INSERT INTO
				  imagenes(
				  id,
				  carro,
				  tipo,
				  foto)
				VALUES(
				  ?,
				  ?,
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('carro'),
				$data->__GET('tipo'),
				$data->__GET('foto')
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Imagenes';</script>";
		}
	}
}
?>