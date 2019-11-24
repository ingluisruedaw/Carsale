<?php
include_once("./modelo/conexion.php");
class Marca_Model{
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

			$stm = $this->conexion->prepare("SELECT * FROM marca");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almMarca = new Marca();
				$almMarca->__SET('id', $r->id);
				$almMarca->__SET('det', $r->det);

				$result[] = $almMarca;
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
								  marca.det
								FROM
								  marca
								WHERE
								  marca.id = ?");
			          

			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almMarca = new Marca();

			$almMarca->__SET('det', $r->det);

			return $almMarca;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  marca");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almMarca = new Marca();
			$almMarca->__SET('id', $r->id);

			return $almMarca;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM marca");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almMarca = new Marca();
			$almMarca->__SET('cantidad', $r->cantidad);

			return $almMarca;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM marca WHERE marca.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Marca';</script>";
		}
	}

	public function Actualizar(Marca $data){
		try {
			$sql = "UPDATE
					  marca
					SET
					  det = ?
					WHERE
					  marca.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('det'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Actualizar'); window.location='?action=Marca';</script>";
		}
	}

	public function Registrar(Marca $data)
	{
		try 
		{
		$sql = "INSERT INTO
				  marca(
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
			echo"<script type=\"text/javascript\">alert('Error Al Registrar'); window.location='?action=Marca';</script>";
		}
	}
}
?>