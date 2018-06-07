<?php 

include'../../autoload.php';
include'../../session.php';



$funciones      		=  new Funciones();
$message        		=  new Message();


$numero         = $funciones->validar_xss($_POST['idnumero']);
$descripcion       = $funciones->validar_xss($_POST['descripcion']);
 $estimado       = $funciones->validar_xss($_POST['estimado']);
$t_real          = $funciones->validar_xss($_POST['t_real']);
$solucionado       = $funciones->validar_xss($_POST['solucionado']);


$movalmdet_salida =  new Tareas_ejecutar($numero,$descripcion,$estimado,$t_real,$solucionado);
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