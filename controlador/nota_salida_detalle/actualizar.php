<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();



$id          	= $funciones->validar_xss($_POST['idnumero']);
//$tran    		= $funciones->validar_xss($_POST['tipo_transaccion']);

 $cantidad    	= $funciones->validar_xss($_POST['cantidad']);
 $cantidades    	= $funciones->validar_xss($_POST['cantidad']-$_POST['cantidad']-$_POST['cantidad']);
 $costo    		= $funciones->validar_xss($_POST['costo']);
//$fecha 			= $funciones->validar_xss($_POST['fecha_inicio']);
//$centro_costo	= $funciones->validar_xss($_POST['codigo_cc']);



$movalmdet_salida     =  new Movalmdet('?','?',$tran,'?','?','?','?',$cantidad,$costo,$fecha,$centro_costo,'?');
$valor       = $movalmdet_salida->actualizar($id);
$valor       = $movalmdet_salida->actualizar_stock($id,$cantidades);




switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>