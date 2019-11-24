<?php
class Modelos{
	private $id;
	private $det;
	private $marca;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}