<?php
class Imagenes{
	private $id;
	private $carro;
	private $tipo;
	private $foto;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>