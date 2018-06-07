<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();




$id          = $funciones->validar_xss($_POST['numero']);
$estados      = 'I';


$movalmdet_salida     = new Movalmdet();
$valor       = $movalmdet_salida->eliminar($id);

$valor       = $movalmdet_salida->eliminar_I($id,$estados);

 
switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Eliminado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>