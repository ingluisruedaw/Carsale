<?php
include_once("./modelo/conexion.php");
class Recuperar_Model{
	public $conexion;

	public function __CONSTRUCT(){
		try{
			$this -> conexion = new conexion(); //instanciamos la clase	        
		}catch(Exception $e){
			die($e->getMessage());
		}
	}

	public function Obtener($user, $persona, $nombres, $apellidos){
		try {
			$stm = $this -> conexion -> prepare("SELECT 
								  usuarios.usuario
								FROM
								  usuarios
								  INNER JOIN persona ON (usuarios.persona = persona.id)
								WHERE
								  usuarios.usuario = ? AND 
								  usuarios.persona = ? AND 
								  persona.nombres = ? AND 
								  persona.apellidos = ?");			
			$stm->execute(array($user, $persona, $nombres, $apellidos));
			$r = $stm->fetch(PDO::FETCH_OBJ);
			$almRecuperar = new Recuperar();
			if ($r=='') {
				$almRecuperar->__SET('usuario', '');
			}else{
				$almRecuperar->__SET('usuario', $r->usuario);
			}			
			return $almRecuperar;
		} catch (Exception $e) {
			die($e->getMessage());
		}
	}
}
?>