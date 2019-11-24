<?php
class Departamento{
	private $id;
	private $det;
	private $pais;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>