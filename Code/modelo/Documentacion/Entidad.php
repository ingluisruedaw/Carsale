<?php
class Documentacion{
	private $id;
	private $carros_id;
	private $tip_docu;
	private $documento;
	private $fvence;
	private $estado;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>