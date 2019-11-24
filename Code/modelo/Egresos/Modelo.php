<?php
include_once("./modelo/conexion.php");
class Egresos_Model{
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
											  egresos.id,
											  tipos_egreso.det AS tipo,
											  egresos.carro,
											  egresos.detalle,
											  egresos.valor,
											  egresos.fecha
											FROM
											  egresos
											  INNER JOIN tipos_egreso ON (egresos.tipos_egreso = tipos_egreso.id)");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almEgresos = new Egresos();
				$almEgresos->__SET('id', $r->id);
				$almEgresos->__SET('tipo', $r->tipo);
				$almEgresos->__SET('carro', $r->carro);
				$almEgresos->__SET('detalle', $r->detalle);
				$almEgresos->__SET('valor', $r->valor);
				$almEgresos->__SET('fecha', $r->fecha);
				$result[] = $almEgresos;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_requerimiento(){
		try{
			$result = array();

			$stm = $this->conexion->prepare("SELECT 
											  egresos.detalle,
											  COUNT(egresos.carro) as cantidad
											FROM
											  egresos
											GROUP BY
											  carro");
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almEgresos = new Egresos();
				$almEgresos->__SET('detalle', $r->detalle);
				$almEgresos->__SET('cantidad', $r->cantidad);
				$result[] = $almEgresos;
			}
			return $result;
		}
		catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){
		try {
			$result = array();
			$stm = $this->conexion
			          ->prepare("SELECT 
								  egresos.`id`,
								  tipos_egreso.det AS tipo,
								  egresos.carro,
								  egresos.detalle,
								  egresos.valor,
								  egresos.fecha
								FROM
								  egresos
								  INNER JOIN tipos_egreso ON (egresos.tipos_egreso = tipos_egreso.id)
								WHERE
								  egresos.carro = ?");
			          

			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almEgresos = new Egresos();
				$almEgresos->__SET('id', $r->id);
				$almEgresos->__SET('tipo', $r->tipo);
				$almEgresos->__SET('carro', $r->carro);
				$almEgresos->__SET('detalle', $r->detalle);
				$almEgresos->__SET('valor', $r->valor);
				$almEgresos->__SET('fecha', $r->fecha);
				$result[] = $almEgresos;
			}
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  egresos");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almEgresos = new Egresos();
			$almEgresos->__SET('id', $r->id);

			return $almEgresos;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM egresos");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almEgresos = new Egresos();
			$almEgresos->__SET('cantidad', $r->cantidad);

			return $almEgresos;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE FROM egresos WHERE egresos.id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Actualizar(Egresos $data){
		try {
			$sql = "UPDATE
					  egresos
					SET
					  tipos_egreso = ?,
					  carro = ?,
					  detalle = ?,
					  valor = ?,
					  fecha = ?
					WHERE
					  egresos.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
				array(
					$data->__GET('tipo'),
					$data->__GET('carro'),
					$data->__GET('detalle'),
					$data->__GET('valor'),
					$data->__GET('fecha'),
					$data->__GET('id') 
					)
				);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Egresos $data){
		try {
		$sql = "INSERT INTO
				  egresos(
				  id,
				  tipos_egreso,
				  carro,
				  detalle,
				  valor,
				  fecha)
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
				$data->__GET('tipo'),
				$data->__GET('carro'),
				$data->__GET('detalle'),
				$data->__GET('valor'),
				$data->__GET('fecha')
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>