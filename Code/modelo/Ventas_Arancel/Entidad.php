<?php
class Ventas_Arancel{
	private $id;
	private $aranceles_id;
	private $ventas_id;
	private $persona_id;

	private $arancel;
	private $valor;
	private $responsable;

	private $total;

	public function __GET($k){ return $this->$k; }
	public function __SET($k, $v){ return $this->$k = $v; }
}
?>