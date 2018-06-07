<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();


$id          = $funciones->validar_xss($_POST['id']);

$tarea_ejecutar     = new Tarea_ejecutar();
$valor       = $tarea_ejecutar->eliminar($id);

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Eliminado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>