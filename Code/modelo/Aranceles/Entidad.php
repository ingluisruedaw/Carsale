<?php
class Aranceles
{
	private $id;
	private $detalle;
	private $valor;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>