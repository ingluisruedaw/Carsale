<?php
class Carros_Model{
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
											  carros.id,
											  carros.anio,
											  carros.km,
											  carros.tipo,
											  carros.motor,
											  ciudad.det AS ciudad,
											  departamento.det AS departamento,
											  pais.det AS pais,
											  carros.combustible,
											  carros.color,
											  carros.transmision,
											  carros.direccion,
											  carros.cilindraje,
											  modelo.det AS modelo,
											  marca.det AS marca,
											  carros.pventa,
											  carros.propietario AS propietario,
											  concat(persona.nombres, ' ', persona.apellidos) AS nombres,
											  carros.pcompra,
											  carros.estado
											FROM
											  carros
											  INNER JOIN ciudad ON (carros.ciudad = ciudad.id)
											  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
											  INNER JOIN marca ON (modelo.marca = marca.id)
											  INNER JOIN departamento ON (ciudad.depto = departamento.id)
											  INNER JOIN pais ON (departamento.pais = pais.id)
											  INNER JOIN persona ON (carros.propietario = persona.id)");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCarros = new Carros();
				$almCarros->__SET('id', $r->id);
				$almCarros->__SET('anio', $r->anio);
				$almCarros->__SET('km', $r->km);
				$almCarros->__SET('tipo', $r->tipo);
				$almCarros->__SET('motor', $r->motor);
				$almCarros->__SET('ciudad', $r->ciudad);
				$almCarros->__SET('departamento', $r->departamento);
				$almCarros->__SET('pais', $r->pais);
				$almCarros->__SET('combustible', $r->combustible);
				$almCarros->__SET('color', $r->color);
				$almCarros->__SET('transmision', $r->transmision);
				$almCarros->__SET('direccion', $r->direccion);
				$almCarros->__SET('cilindraje', $r->cilindraje);				
				$almCarros->__SET('marca', $r->marca);
				$almCarros->__SET('modelo', $r->modelo);
				$almCarros->__SET('pventa', $r->pventa);
				$almCarros->__SET('propietario', $r->propietario);
				$almCarros->__SET('estado', $r->estado);
				$result[] = $almCarros;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_Vendidos(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  carros.id,
											  carros.anio,
											  carros.km,
											  carros.tipo,
											  carros.motor,
											  ciudad.det AS ciudad,
											  departamento.det AS departamento,
											  pais.det AS pais,
											  carros.combustible,
											  carros.color,
											  carros.transmision,
											  carros.direccion,
											  carros.cilindraje,
											  modelo.det AS modelo,
											  marca.det AS marca,
											  carros.pventa,
											  carros.propietario AS propietario,
											  concat(persona.nombres, ' ', persona.apellidos) AS nombres,
											  carros.pcompra,
											  carros.estado
											FROM
											  carros
											  INNER JOIN ciudad ON (carros.ciudad = ciudad.id)
											  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
											  INNER JOIN marca ON (modelo.marca = marca.id)
											  INNER JOIN departamento ON (ciudad.depto = departamento.id)
											  INNER JOIN pais ON (departamento.pais = pais.id)
											  INNER JOIN persona ON (carros.propietario = persona.id) 
											WHERE
								  				carros.estado = 2");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCarros = new Carros();
				$almCarros->__SET('id', $r->id);
				$almCarros->__SET('anio', $r->anio);
				$almCarros->__SET('km', $r->km);
				$almCarros->__SET('tipo', $r->tipo);
				$almCarros->__SET('motor', $r->motor);
				$almCarros->__SET('ciudad', $r->ciudad);
				$almCarros->__SET('departamento', $r->departamento);
				$almCarros->__SET('pais', $r->pais);
				$almCarros->__SET('combustible', $r->combustible);
				$almCarros->__SET('color', $r->color);
				$almCarros->__SET('transmision', $r->transmision);
				$almCarros->__SET('direccion', $r->direccion);
				$almCarros->__SET('cilindraje', $r->cilindraje);				
				$almCarros->__SET('marca', $r->marca);
				$almCarros->__SET('modelo', $r->modelo);
				$almCarros->__SET('pventa', $r->pventa);
				$almCarros->__SET('propietario', $r->propietario);
				$almCarros->__SET('estado', $r->estado);
				$result[] = $almCarros;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_PorTipo($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  carros.id,
											  carros.anio,
											  carros.km,
											  carros.tipo,
											  carros.motor,
											  ciudad.det AS ciudad,
											  departamento.det AS departamento,
											  pais.det AS pais,
											  carros.combustible,
											  carros.color,
											  carros.transmision,
											  carros.direccion,
											  carros.cilindraje,
											  modelo.det AS modelo,
											  marca.det AS marca,
											  carros.pventa,
											  carros.propietario AS propietario,
											  concat(persona.nombres, ' ', persona.apellidos) AS nombres,
											  carros.pcompra,
											  carros.estado
											FROM
											  carros
											  INNER JOIN ciudad ON (carros.ciudad = ciudad.id)
											  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
											  INNER JOIN marca ON (modelo.marca = marca.id)
											  INNER JOIN departamento ON (ciudad.depto = departamento.id)
											  INNER JOIN pais ON (departamento.pais = pais.id)
											  INNER JOIN persona ON (carros.propietario = persona.id) 
											WHERE
								  				carros.tipo = ?
								  			AND carros.estado = 1");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCarros = new Carros();
				$almCarros->__SET('id', $r->id);
				$almCarros->__SET('anio', $r->anio);
				$almCarros->__SET('km', $r->km);
				$almCarros->__SET('tipo', $r->tipo);
				$almCarros->__SET('motor', $r->motor);
				$almCarros->__SET('ciudad', $r->ciudad);
				$almCarros->__SET('departamento', $r->departamento);
				$almCarros->__SET('pais', $r->pais);
				$almCarros->__SET('combustible', $r->combustible);
				$almCarros->__SET('color', $r->color);
				$almCarros->__SET('transmision', $r->transmision);
				$almCarros->__SET('direccion', $r->direccion);
				$almCarros->__SET('cilindraje', $r->cilindraje);				
				$almCarros->__SET('marca', $r->marca);
				$almCarros->__SET('modelo', $r->modelo);
				$almCarros->__SET('pventa', $r->pventa);
				$almCarros->__SET('propietario', $r->propietario);
				$almCarros->__SET('estado', $r->estado);
				$result[] = $almCarros;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_PorMarca($id){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  carros.id,
											  carros.anio,
											  carros.km,
											  carros.tipo,
											  carros.motor,
											  ciudad.det AS ciudad,
											  departamento.det AS departamento,
											  pais.det AS pais,
											  carros.combustible,
											  carros.color,
											  carros.transmision,
											  carros.direccion,
											  carros.cilindraje,
											  modelo.det AS modelo,
											  marca.det AS marca,
											  carros.pventa,
											  carros.propietario AS propietario,
											  concat(persona.nombres, ' ', persona.apellidos) AS nombres,
											  carros.pcompra,
											  carros.estado
											FROM
											  carros
											  INNER JOIN ciudad ON (carros.ciudad = ciudad.id)
											  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
											  INNER JOIN marca ON (modelo.marca = marca.id)
											  INNER JOIN departamento ON (ciudad.depto = departamento.id)
											  INNER JOIN pais ON (departamento.pais = pais.id)
											  INNER JOIN persona ON (carros.propietario = persona.id) 
											WHERE
								  				marca.id = ?
								  			AND carros.estado = 1");
			$stm->execute(array($id));
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCarros = new Carros();
				$almCarros->__SET('id', $r->id);
				$almCarros->__SET('anio', $r->anio);
				$almCarros->__SET('km', $r->km);
				$almCarros->__SET('tipo', $r->tipo);
				$almCarros->__SET('motor', $r->motor);
				$almCarros->__SET('ciudad', $r->ciudad);
				$almCarros->__SET('departamento', $r->departamento);
				$almCarros->__SET('pais', $r->pais);
				$almCarros->__SET('combustible', $r->combustible);
				$almCarros->__SET('color', $r->color);
				$almCarros->__SET('transmision', $r->transmision);
				$almCarros->__SET('direccion', $r->direccion);
				$almCarros->__SET('cilindraje', $r->cilindraje);				
				$almCarros->__SET('marca', $r->marca);
				$almCarros->__SET('modelo', $r->modelo);
				$almCarros->__SET('pventa', $r->pventa);
				$almCarros->__SET('propietario', $r->propietario);
				$almCarros->__SET('estado', $r->estado);
				$result[] = $almCarros;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Listar_Disponibles(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  carros.id,
											  carros.anio,
											  carros.km,
											  carros.tipo,
											  carros.motor,
											  ciudad.det AS ciudad,
											  departamento.det AS departamento,
											  pais.det AS pais,
											  carros.combustible,
											  carros.color,
											  carros.transmision,
											  carros.direccion,
											  carros.cilindraje,
											  modelo.det AS modelo,
											  marca.det AS marca,
											  carros.pventa,
											  carros.propietario AS propietario,
											  concat(persona.nombres, ' ', persona.apellidos) AS nombres,
											  carros.pcompra,
											  carros.estado
											FROM
											  carros
											  INNER JOIN ciudad ON (carros.ciudad = ciudad.id)
											  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
											  INNER JOIN marca ON (modelo.marca = marca.id)
											  INNER JOIN departamento ON (ciudad.depto = departamento.id)
											  INNER JOIN pais ON (departamento.pais = pais.id)
											  INNER JOIN persona ON (carros.propietario = persona.id) 
											WHERE
								  				carros.estado = 1");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCarros = new Carros();
				$almCarros->__SET('id', $r->id);
				$almCarros->__SET('anio', $r->anio);
				$almCarros->__SET('km', $r->km);
				$almCarros->__SET('tipo', $r->tipo);
				$almCarros->__SET('motor', $r->motor);
				$almCarros->__SET('ciudad', $r->ciudad);
				$almCarros->__SET('departamento', $r->departamento);
				$almCarros->__SET('pais', $r->pais);
				$almCarros->__SET('combustible', $r->combustible);
				$almCarros->__SET('color', $r->color);
				$almCarros->__SET('transmision', $r->transmision);
				$almCarros->__SET('direccion', $r->direccion);
				$almCarros->__SET('cilindraje', $r->cilindraje);				
				$almCarros->__SET('marca', $r->marca);
				$almCarros->__SET('modelo', $r->modelo);
				$almCarros->__SET('pventa', $r->pventa);
				$almCarros->__SET('propietario', $r->propietario);
				$almCarros->__SET('estado', $r->estado);
				$result[] = $almCarros;
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
								  carros.id,
								  carros.anio,
								  carros.km,
								  carros.motor,
								  carros.cilindraje,
								  carros.color,
								  carros.pcompra,
								  carros.pventa,
								  carros.propietario,
								  carros.ciudad,
								  carros.tipo,
								  carros.combustible,
								  carros.transmision,
								  carros.direccion,
								  carros.modelo_id,
								  carros.estado,
								  marca.id as marca
								FROM
								  carros
								  INNER JOIN modelo ON (carros.modelo_id = modelo.id)
								  INNER JOIN marca ON (modelo.marca = marca.id)
								WHERE
								  carros.id = ?");			
			$stm->execute(array($id));
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$almCarros = new Carros();			
			$almCarros->__SET('id', $r->id);
			$almCarros->__SET('anio', $r->anio);
			$almCarros->__SET('km', $r->km);
			$almCarros->__SET('motor', $r->motor);
			$almCarros->__SET('cilindraje', $r->cilindraje);
			$almCarros->__SET('color', $r->color);
			$almCarros->__SET('pcompra', $r->pcompra);
			$almCarros->__SET('pventa', $r->pventa);
			$almCarros->__SET('propietario', $r->propietario);
			$almCarros->__SET('ciudad', $r->ciudad);
			$almCarros->__SET('tipo', $r->tipo);
			$almCarros->__SET('combustible', $r->combustible);
			$almCarros->__SET('transmision', $r->transmision);
			$almCarros->__SET('direccion', $r->direccion);
			$almCarros->__SET('modelo', $r->modelo_id);
			$almCarros->__SET('estado', $r->estado);
			$almCarros->__SET('marca', $r->marca);

			return $almCarros;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Obtener_Disponibles(){
		try{
			$result = array();
			$stm = $this->conexion->prepare("SELECT 
											  carros.id
											FROM
											  carros
											WHERE
											  carros.estado = 1");
			$stm->execute();
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
				$almCarros = new Carros();
				$almCarros->__SET('id', $r->id);
				$almCarros->__SET('det', $r->det);
				$result[] = $almCarros;
			}
			return $result;
		} catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Contar_Existentes(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  carros");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCarros = new Carros();
			$almCarros->__SET('cantidad', $r->cantidad);

			return $almCarros;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_Disponibles(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  carros
								WHERE
								  carros.estado = 1");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCarros = new Carros();
			$almCarros->__SET('cantidad', $r->cantidad);

			return $almCarros;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Contar_Vendidos(){
		try {
			$stm = $this->conexion
			          ->prepare("SELECT 
								  count(*) AS cantidad
								FROM
								  carros
								WHERE
								  carros.estado = 2");		          
			$stm->execute();
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almCarros = new Carros();
			$almCarros->__SET('cantidad', $r->cantidad);

			return $almCarros;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}

	public function Eliminar($id){
		try {
			$stm = $this->conexion
			          ->prepare("DELETE
								FROM
								  carros
								WHERE
								  carros.id = ?");	          

			$stm->execute(array($id));
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error Al Eliminar'); window.location='?action=Carros';</script>";
		}
	}

	public function Actualizar(Carros $data){
		try {
			$sql = "UPDATE
					  carros
					SET
					  anio = ?,
					  km = ?,
					  motor = ?,
					  cilindraje = ?,
					  color = ?,
					  pcompra = ?,
					  pventa = ?,
					  propietario = ?,
					  ciudad = ?,
					  tipo = ?,
					  combustible = ?,
					  transmision = ?,
					  direccion = ?,
					  modelo_id = ?
					WHERE
					  carros.id = ?";

			$this->conexion->prepare($sql)
			     ->execute(
					array(
						$data->__GET('anio'),
						$data->__GET('km'),						
						$data->__GET('motor'),
						$data->__GET('cilindraje'),
						$data->__GET('color'),
						$data->__GET('pcompra'),
						$data->__GET('pventa'),
						$data->__GET('propietario'),
						$data->__GET('ciudad'),
						$data->__GET('tipo'),						
						$data->__GET('combustible'),						
						$data->__GET('transmision'),						
						$data->__GET('direccion'),
						$data->__GET('modelo'),										
						$data->__GET('id')
						)
				);
			     echo"<script type=\"text/javascript\">alert('Actualizacion Exitosa.'); window.location='?action=Carros';</script>";
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error.'); window.location='?action=Carros';</script>";
		}
	}


	public function Registrar(Carros $data){
		try {
		$sql = "INSERT INTO
				  carros(
				  id,
				  propietario,
				  anio,
				  ciudad,
				  km,
				  tipo,
				  motor,
				  combustible,
				  color,
				  transmision,
				  direccion,
				  cilindraje,
				  modelo_id,
				  pcompra,
				  pventa)
				VALUES( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

		$this->conexion->prepare($sql)
		     ->execute(
			array(
				$data->__GET('id'),
				$data->__GET('propietario'),
				$data->__GET('anio'),
				$data->__GET('ciudad'),
				$data->__GET('km'),
				$data->__GET('tipo'),
				$data->__GET('motor'),				
				$data->__GET('combustible'),
				$data->__GET('color'),
				$data->__GET('transmision'),				
				$data->__GET('direccion'),				
				$data->__GET('cilindraje'),
				$data->__GET('modelo'),
				$data->__GET('pcompra'),
				$data->__GET('pventa')
				)
			);
		     echo"<script type=\"text/javascript\">alert('Registro Exitoso. AHORA DEBE REGISTRAR LAS IMAGENES'); window.location='?action=Form_Imagenes_insertar';</script>";
		} catch (Exception $e) {
			echo"<script type=\"text/javascript\">alert('Error. Datos Existentes'); window.location='?action=Carros';</script>";
		}
	}
}
?>