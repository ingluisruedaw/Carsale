<?php 
require_once '../../../modelo/conexion.php';
require_once '../../../modelo/Carros/Entidad.php';
require_once '../../../modelo/Carros/Modelo.php';
$almCarros = new Carros();
$modelCarros = new Carros_Model();
$datos=$modelCarros->Obtener($_POST['q']);
if ($datos==null) {
	# code...
}else{
?>
<input type="text" name="total" value="<?php echo $datos->__GET('pventa'); ?>" readonly>
<input type="text" name="tota2" value="<?php echo "$ ".number_format($datos->__GET('pventa'), 2, '.', ','); ?>" readonly>
<button type="submit" class="waves-effect waves-light btn">Vender</button>
<?php }?>