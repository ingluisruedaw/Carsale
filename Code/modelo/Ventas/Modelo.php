<?php
include_once("./modelo/conexion.php");
class Ventas_Model{
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
											  ventas.id,
											  ventas.vendedor,
											  ventas.cliente,
											  ventas.fecha,
											  ventas.total,
											  ventas.carros_id
											FROM
											  ventas
											WHERE
											  ventas.estado = 1");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almVentas = new Ventas();
				$almVentas->__SET('id', $r->id);
				$almVentas->__SET('vendedor', $r->vendedor);
				$almVentas->__SET('cliente', $r->cliente);
				$almVentas->__SET('fecha', $r->fecha);
				$almVentas->__SET('total', $r->total);
				$almVentas->__SET('carros_id', $r->carros_id);
				$result[] = $almVentas;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_en_proceso(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  ventas.id,
											  ventas.vendedor,
											  ventas.cliente,
											  ventas.fecha,
											  ventas.total,
											  ventas.carros_id
											FROM
											  ventas
											WHERE
											  ventas.estado = 2");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almVentas = new Ventas();
				$almVentas->__SET('id', $r->id);
				$almVentas->__SET('vendedor', $r->vendedor);
				$almVentas->__SET('cliente', $r->cliente);
				$almVentas->__SET('fecha', $r->fecha);
				$almVentas->__SET('total', $r->total);
				$almVentas->__SET('carros_id', $r->carros_id);
				$result[] = $almVentas;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($id){/*utilizado para obtener el detalle de una venta*/
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  ventas.vendedor,
								  ventas.cliente AS cliente_id,
								  concat(persona.nombres, ' ', persona.apellidos) AS cliente_nombres,
								  persona.direccion AS cliente_direccion,
								  persona.barrio AS cliente_barrio,
								  ciudad.det AS cliente_ciudad,
								  departamento.det AS cliente_departamento,
								  pais.det AS cliente_pais,
								  ventas.fecha,
								  ventas.total,
								  ventas.carros_id,
								  carros.propietario AS ant_prop_id,
								  concat(persona1.nombres, ' ', persona1.apellidos) AS ant_prop_nombres,
								  ciudad1.det AS ant_prop_ciudad,
								  departamento1.det AS ant_prop_departamento,
								  pais1.det AS ant_prop_pais,
								  carros.anio,
								  ciudad2.det AS carro_ciudad,
								  departamento2.det AS carro_departamento,
								  pais2.det AS carro_pais,
								  carros.km,
								  tipo_carro.det AS carro_tipo,
								  carros.motor,
								  carros.combustible,
								  carros.color,
								  carros.transmision,
								  carros.direccion,
								  carros.cilindraje,
								  modelo.det AS carro_modelo,
								  marca.det AS carro_marca,
								  carros.pcompra,
								  carros.pventa
								FROM
								  ventas
								  INNER JOIN persona ON (ventas.cliente = persona.id)
								  INNER JOIN carros ON (ventas.carros_id = carros.id)
								  INNER JOIN tipo_carro ON (carros.tipo = tipo_carro.id)
								  INNER JOIN ciudad ON (persona.ciudad = ciudad.id)
								  INNER JOIN departamento ON (ciudad.depto = departamento.id)
								  INNER JOIN pais ON (departamento.pais = pais.id)
								  INNER JOIN persona persona1 ON (carros.propietario = persona1.id)
								  INNER JOIN ciudad ciudad1 ON (persona1.ciudad = ciudad1.id)
								  INNER JOIN departamento departamento1 ON (ciudad1.depto = departamento1.id)
								  INNER JOIN pais pais1 ON (departamento1.pais = pais1.id)
								  INNER JOIN ciudad ciudad2 ON (carros.ciudad = ciudad2.id)
								  INNER JOIN departamento departamento2 ON (ciudad2.depto = departamento2.id)
								  INNER JOIN pais pais2 ON (departamento2.pais = pais2.id)
								  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
								  INNER JOIN marca ON (modelo.marca = marca.id)
								WHERE
								  ventas.id = ? AND 
								  ventas.estado = 1");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almVentas = new Ventas();

			$almVentas->__SET('vendedor', $r->vendedor);
			$almVentas->__SET('cliente_id', $r->cliente_id);
			$almVentas->__SET('cliente_nombres', $r->cliente_nombres);
			$almVentas->__SET('cliente_direccion', $r->cliente_direccion);
			$almVentas->__SET('cliente_barrio', $r->cliente_barrio);
			$almVentas->__SET('cliente_ciudad', $r->cliente_ciudad);
			$almVentas->__SET('cliente_departamento', $r->cliente_departamento);
			$almVentas->__SET('cliente_pais', $r->cliente_pais);
			$almVentas->__SET('fecha', $r->fecha);
			$almVentas->__SET('total', $r->total);
			$almVentas->__SET('carros_id', $r->carros_id);
			$almVentas->__SET('ant_prop_id', $r->ant_prop_id);
			$almVentas->__SET('ant_prop_nombres', $r->ant_prop_nombres);
			$almVentas->__SET('ant_prop_ciudad', $r->ant_prop_ciudad);
			$almVentas->__SET('ant_prop_departamento', $r->ant_prop_departamento);
			$almVentas->__SET('ant_prop_pais', $r->ant_prop_pais);
			$almVentas->__SET('anio', $r->anio);
			$almVentas->__SET('carro_ciudad', $r->carro_ciudad);
			$almVentas->__SET('carro_departamento', $r->carro_departamento);
			$almVentas->__SET('carro_pais', $r->carro_pais);
			$almVentas->__SET('km', $r->km);
			$almVentas->__SET('carro_tipo', $r->carro_tipo);
			$almVentas->__SET('motor', $r->motor);
			$almVentas->__SET('combustible', $r->combustible);
			$almVentas->__SET('color', $r->color);
			$almVentas->__SET('transmision', $r->transmision);
			$almVentas->__SET('direccion', $r->direccion);
			$almVentas->__SET('cilindraje', $r->cilindraje);
			$almVentas->__SET('carro_modelo', $r->carro_modelo);
			$almVentas->__SET('carro_marca', $r->carro_marca);
			$almVentas->__SET('pcompra', $r->pcompra);
			$almVentas->__SET('pventa', $r->pventa);

			return $almVentas;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Listar_Vendedores(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  usuarios.persona as vendedor
											FROM
											  usuarios
											WHERE
											  usuarios.estado = 1 AND 
											  usuarios.rol = 4");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almVentas = new Ventas();
				$almVentas->__SET('vendedor', $r->vendedor);
				$result[] = $almVentas;
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
								  ventas");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almVentas = new Ventas();
			$almVentas->__SET('id', $r->id);

			return $almVentas;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Finalizar_Venta($id){
		try {
			$sql = "UPDATE
					  ventas
					SET
					  estado = 1
					WHERE
					  ventas.id= ? ";

			$this->conexion->prepare($sql)
			     ->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Vender_Vehiculo($id){
		try {
			$sql = "UPDATE
					  carros
					SET
					  estado = 2
					WHERE
					  carros.id = (SELECT 
					  ventas.carros_id
					FROM
					  ventas
					WHERE
					  ventas.id = ?)";
			$this->conexion->prepare($sql)
			     ->execute(array($id));
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Cancelar_Venta($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  ventas
								WHERE
								  ventas.id = ? ");	         

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Ventas';</script>";
		}
	}

	public function Cancelar_Venta_Arancel($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  ventas_arancel
								WHERE
  									ventas_arancel.ventas_id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Ventas';</script>";
		}
	}

	public function Cancelar_Venta_Vehiculo($id){
		try {
			$stm = $this->conexion
			          ->prepare("UPDATE
								  carros
								SET
								  estado = 1
								WHERE
								  carros.id = (SELECT 
								  ventas.carros_id
								FROM
								  ventas
								WHERE
								  ventas.id = ?)");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Ventas';</script>";
		}
	}

	public function Anular_Venta($id){
		$this->Cancelar_Venta_Arancel($id);//elimino el detalle de la venta
		$this->Cancelar_Venta_Vehiculo($id);//cambio el estado del vehiculo
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  ventas
								WHERE
								  ventas.id = ?");	          
			$stm->execute(array($id));			
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('ERROR'); window.location='?action=Ventas';</script>";
		}
	}

	public function ObtenerFactura($id){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  concat(persona.nombres, ' ', persona.apellidos) AS vendedor,
								  concat(persona1.nombres, ' ', persona1.apellidos) AS cliente,
								  ventas.fecha,
								  ventas.total,
								  ventas.carros_id
								FROM
								  ventas
								  INNER JOIN persona ON (ventas.vendedor = persona.id)
								  INNER JOIN persona persona1 ON (ventas.cliente = persona1.id)
								WHERE
								  ventas.id = ?");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almVentas = new Ventas();

			$almVentas->__SET('vendedor', $r->vendedor);
			$almVentas->__SET('cliente', $r->cliente);
			$almVentas->__SET('fecha', $r->fecha);
			$almVentas->__SET('total', $r->total);
			$almVentas->__SET('carros_id', $r->carros_id);

			return $almVentas;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_registros(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM ventas WHERE ventas.estado = 2");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almVentas = new Ventas();
			$almVentas->__SET('cantidad', $r->cantidad);

			return $almVentas;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_vendidos(){
		try {
			$stm = $this->conexion->prepare("SELECT count(*) AS cantidad FROM ventas WHERE ventas.estado = 1");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almVentas = new Ventas();
			$almVentas->__SET('cantidad', $r->cantidad);

			return $almVentas;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Registrar(Ventas $data){
		try {
		$sql = "INSERT INTO
				  ventas(
				  id,
				  vendedor,
				  cliente,
				  total,
				  carros_id)
				VALUES(
				  ?,
				  ?,
				  ?,
				  ?,
				  ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('vendedor'),
				$data->__GET('cliente'),
				$data->__GET('total'),
				$data->__GET('carros_id')
				)
			);
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>