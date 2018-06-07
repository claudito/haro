<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();



 $id        	= $funciones->validar_xss($_POST['id']);
 $precio 		= $funciones->validar_xss($_POST['precio']);
  $tipo 		= "OC";



$movalmdet_salida     =  new Comovd();

$valor       = $movalmdet_salida->actualizar_saldo_oc($id,$precio,$tipo);


switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>