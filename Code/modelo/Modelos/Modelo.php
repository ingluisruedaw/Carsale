<?php
class Modelos_Model{
	private $pdo;

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
								  modelo.id,
								  modelo.det,
								  marca.det as marca
								FROM
								  modelo LEFT JOIN marca ON modelo.marca=marca.id;");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almModelos = new Modelos();
				$almModelos->__SET('id', $r->id);
				$almModelos->__SET('det', $r->det);
				$almModelos->__SET('marca', $r->marca);
				$result[] = $almModelos;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
								  modelo.id,
								  modelo.det 
								FROM
								  modelo
								WHERE
								  modelo.marca = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almModelos = new Modelos();
				$almModelos->__SET('id', $r->id);
				$almModelos->__SET('det', $r->det);
				//echo $r->id;
				$result[] = $almModelos;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener_Modelos($id){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  modelo.det
								FROM
								  modelo
								WHERE
								  modelo.id = ?");
			          
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almModelos = new Modelos();
			$almModelos->__SET('det', $r->det);

			return $almModelos;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  modelo");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almModelos = new Modelos();
			$almModelos->__SET('id', $r->id);

			return $almModelos;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM modelo");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almModelos = new Modelos();
			$almModelos->__SET('cantidad', $r->cantidad);

			return $almModelos;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
									FROM
									  modelo
									WHERE
									  modelo.id = ?"
								);	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Modelos';</script>";
		}
	}

	public function Actualizar(Modelos $data){
		try {
			$sql = "UPDATE
					  modelo
					SET
					  det = ?,
					  marca = ?
					WHERE
					  modelo.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('det'),
						$data->__GET('marca'),
						$data->__GET('id')
						)
				);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Actualizar'); window.location='?action=Modelos';</script>";
		}
	}

	public function Registrar(Modelos $data){
		try {
		$sql = "INSERT INTO
				  modelo(
				  id,
				  det,
				  marca)
				VALUES(
				  ?,
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('det'),
				$data->__GET('marca')
				)
			);
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Registrar'); window.location='?action=Modelos';</script>";
		}
	}
}