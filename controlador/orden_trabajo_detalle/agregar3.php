<?php 

include'../../autoload.php';
include'../../session.php';



$funciones      		=  new Funciones();
$message        		=  new Message();


$numero         = $funciones->validar_xss($_POST['idnumero']);
$kilometraje         = $funciones->validar_xss($_POST['kilometraje']);
$horometro       = $funciones->validar_xss($_POST['horometro']);
$fecha       = $funciones->validar_xss($_POST['fecha']);
$tipo         = $funciones->validar_xss($_POST['tipo']);

$movalmdet_salida =  new Control_ot($numero,$kilometraje,$horometro,$fecha,$tipo);
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