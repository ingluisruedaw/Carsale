<?php
class Persona{
	private $id;
	private $tipodoc;
	private $nombres;
	private $apellidos;
	private $sexo;
	private $email;
	private $direccion;
	private $barrio;
	private $ciudad;

	private $cantidad;//utilizada para saber cuantos registros hay en la bd

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>