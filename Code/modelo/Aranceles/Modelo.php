<?php
include_once("./modelo/conexion.php");
class Aranceles_Model{
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

			$stm = $this->conexion->prepare("SELECT id, detalle, valor FROM aranceles");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almAranceles = new Aranceles();
				$almAranceles->__SET('id', $r->id);
				$almAranceles->__SET('detalle', $r->detalle);
				$almAranceles->__SET('valor', $r->valor);
				$result[] = $almAranceles;
			}

			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$stm = $this->conexion->prepare("SELECT id, detalle, valor FROM aranceles WHERE aranceles.id = ?");	          
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almAranceles = new Aranceles();
			$almAranceles->__SET('id', $r->id);
			$almAranceles->__SET('detalle', $r->detalle);
			$almAranceles->__SET('valor', $r->valor);
			return $almAranceles;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion->prepare("SELECT max(id) as id FROM aranceles");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almAranceles = new Aranceles();
			$almAranceles->__SET('id', $r->id);

			return $almAranceles;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM aranceles");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almAranceles = new Aranceles();
			$almAranceles->__SET('cantidad', $r->cantidad);

			return $almAranceles;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion->prepare("DELETE FROM aranceles WHERE aranceles.id = ?");	         
			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(Aranceles $data){
		try {
			$sql = "UPDATE aranceles SET detalle = ?, valor = ? WHERE aranceles.id = ?";
			$this->conexion->prepare($sql)->execute(array($data->__GET('detalle'),$data->__GET('valor'),$data->__GET('id')));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Aranceles $data){
		try {
			$sql = "INSERT INTO aranceles( id, detalle, valor) VALUES( ?, ?, ?)";
			$this->conexion->prepare($sql)->execute(array($data->__GET('id'), $data->__GET('detalle'), $data->__GET('valor')));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>