<?php 

include'../../autoload.php';
include'../../session.php';


$funciones 		=  new Funciones();
$message        =  new Message();

$descripcion    = $funciones->validar_xss($_POST['descripcion']);
$t_estimado     = $funciones->validar_xss($_POST['tiempo_estimado']);
$t_real         = $funciones->validar_xss($_POST['tiempo_real']);
$solucion       = $funciones->validar_xss($_POST['solucion']);


$tarea_ejecutar =  new Tarea_ejecutar('',$descripcion,$t_estimado,$t_real,$solucion);
$valor   =  $tarea_ejecutar->agregar();

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}

 ?>