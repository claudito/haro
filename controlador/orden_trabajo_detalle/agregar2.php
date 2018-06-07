<?php 

include'../../autoload.php';
include'../../session.php';



$funciones      		=  new Funciones();
$message        		=  new Message();


$numero         = $funciones->validar_xss($_POST['idnumero']);
$categoria         = $funciones->validar_xss($_POST['categoria']);
$nombre       = $funciones->validar_xss($_POST['nombre']);




$movalmdet_salida =  new Personal_trabajos($numero,$categoria,$nombre);
$valor   =  $movalmdet_salida->agregar();

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>