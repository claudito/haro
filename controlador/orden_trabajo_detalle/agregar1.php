<?php 

include'../../autoload.php';
include'../../session.php';



$funciones      		=  new Funciones();
$message        		=  new Message();


$numero         = $funciones->validar_xss($_POST['idnumero']);
$codigo         = $funciones->validar_xss($_POST['codigo']);
$descripcion       = $funciones->validar_xss($_POST['descripcion']);
$requerida       = $funciones->validar_xss($_POST['requerida']);
$utilizada         = $funciones->validar_xss($_POST['utilizada']);
$unidad_medida       = $funciones->validar_xss($_POST['unidad']);


$movalmdet_salida =  new Materiales_utilizados($numero,$codigo,$descripcion,$requerida,$utilizada,$unidad_medida);
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