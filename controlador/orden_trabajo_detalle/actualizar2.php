<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();

$id         = $funciones->validar_xss($_POST['idnumero']);
$categoria         = $funciones->validar_xss($_POST['categoria']);
$nombre       = $funciones->validar_xss($_POST['nombre']);



$movalmdet_salida     =  new Personal_trabajos('',$categoria,$nombre);
$valor       = $movalmdet_salida->actualizar($id);



switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>