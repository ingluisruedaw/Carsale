<?php
class Tip_docu
{
	private $id;
	private $det;
	private $cantidad;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>