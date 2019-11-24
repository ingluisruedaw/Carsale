<?php
class Carros{
	private $id;
	private $anio;
	private $km;
	private $tipo;
	private $motor;
	private $ciudad;
	private $departamento;
	private $pais;
	private $combustible;
	private $color;
	private $transmision;	
	private $direccion;	
	private $cilindraje;
	private $marca;
	private $modelo;
	private $pventa;
	private $pcompra;
	private $propietario;
	private $estado;

	private $cantidad;//utilizada para saber cuantos registros hay en la bd

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>