<?php
class Ventas{
	private $id;
	private $vendedor;
	private $cliente;
	private $fecha;
	private $estado;
	private $total;
	private $carros_id;

	private $cliente_id;
	private $cliente_nombres;
	private $cliente_direccion;
	private $cliente_barrio;
	private $cliente_ciudad;
	private $cliente_departamento;
	private $cliente_pais;
	private $ant_prop_nombres;
	private $ant_prop_id;
	private $ant_prop_ciudad;
	private $ant_prop_departamento;
	private $ant_prop_pais;
	private $anio;
	private $carro_ciudad;
	private $carro_departamento;
	private $carro_pais;
	private $km;
	private $carro_tipo;
	private $motor;
	private $combustible;
	private $color;
	private $transmision;
	private $direccion;
	private $cilindraje;
	private $carro_modelo;
	private $carro_marca;
	private $pcompra;
	private $pventa;
	PRIVATE $cantidad;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>