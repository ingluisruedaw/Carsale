<?php
include_once("./modelo/conexion.php");
class Ventas_Arancel_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this->conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_VentaArancel($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  ventas_arancel.id as id,
											  aranceles.detalle as arancel,
											  aranceles.valor,
											  ventas_arancel.persona_id,
											  concat(persona.nombres, ' ', persona.apellidos) AS responsable
											FROM
											  ventas_arancel
											  INNER JOIN persona ON (ventas_arancel.persona_id = persona.id)
											  INNER JOIN aranceles ON (ventas_arancel.aranceles_id = aranceles.id)
											WHERE
											  ventas_arancel.ventas_id = ?");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almVentas_Arancel = new Ventas_Arancel();
				$almVentas_Arancel->__SET('id', $r->id);
				$almVentas_Arancel->__SET('arancel', $r->arancel);
				$almVentas_Arancel->__SET('valor', $r->valor);
				$almVentas_Arancel->__SET('persona_id', $r->persona_id);
				$almVentas_Arancel->__SET('responsable', $r->responsable);
				$result[] = $almVentas_Arancel;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function ObtenerMax(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT max(id) as id
								FROM
								  ventas_arancel");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almVentas_Arancel = new Ventas_Arancel();
			$almVentas_Arancel->__SET('id', $r->id);

			return $almVentas_Arancel;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener_Total_Venta_Arancel($id){
		try {
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  sum(aranceles.valor) AS total,
											  concat(persona.nombres, ' ', persona.apellidos) AS responsable
											FROM
											  ventas_arancel
											  INNER JOIN aranceles ON (ventas_arancel.aranceles_id = aranceles.id)
											  INNER JOIN persona ON (ventas_arancel.persona_id = persona.id)
											WHERE
											  ventas_arancel.ventas_id = ?
											GROUP BY
											  `ventas_arancel`.`persona_id`");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almVentas_Arancel = new Ventas_Arancel();
				$almVentas_Arancel->__SET('total', $r->total);
				$almVentas_Arancel->__SET('responsable', $r->responsable);
				$result[] = $almVentas_Arancel;
			}
			return $result;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Ventas_Arancel $data){
		try {
		$sql = "INSERT INTO
				  ventas_arancel(
				  id,
				  aranceles_id,
				  ventas_id,
				  persona_id)
				VALUES(
				  ?,
				  ?,
				  ?,
				  ?)";
		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('aranceles_id'),
				$data->__GET('ventas_id'),
				$data->__GET('persona_id')
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>