<?php
class Ciudad{
	private $id;
	private $det;
	private $depto;
	private $pais;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>