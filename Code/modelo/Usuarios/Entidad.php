<?php
class Usuarios{
	private $usuario;
	private $rol;
	private $persona;
	private $clave;
	private $idpersona;
	private $estado;

	private $total;
	private $carros;


	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>