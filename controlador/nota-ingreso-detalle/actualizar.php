<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();



 $id        	= $funciones->validar_xss($_POST['idnumero']);
 $cantidad    	= $funciones->validar_xss($_POST['cantidad']);
 $costo    		= $funciones->validar_xss($_POST['costo']);




$movalmdet_salida     =  new Movalmdet_salida('?','?',$tran,'?','?','?','?',$cantidad,$costo,$fecha,$centro_costo,'?');
$valor       = $movalmdet_salida->actualizar($id);
$valor       = $movalmdet_salida->actualizar_stock($id);


switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>