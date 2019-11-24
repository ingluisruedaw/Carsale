<?php
class Egresos
{
	private $id;
	private $tipo;
	private $carro;
	private $detalle;
	private $valor;
	private $fecha;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>