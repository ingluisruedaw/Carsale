<?php
class Recuperar{
	private $usuario;
	private $persona;
	private $nombres;
	private $apellidos;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>