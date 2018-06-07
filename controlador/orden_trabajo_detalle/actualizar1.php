<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();

$id         = $funciones->validar_xss($_POST['idnumero']);
$codigo         = $funciones->validar_xss($_POST['codigo']);
$descripcion       = $funciones->validar_xss($_POST['descripcion']);
$requerida       = $funciones->validar_xss($_POST['requerida']);
$utilizada         = $funciones->validar_xss($_POST['utilizada']);
$unidad_medida       = $funciones->validar_xss($_POST['unidad']);






$movalmdet_salida     =  new Materiales_utilizados('',$codigo,$descripcion,$requerida,$utilizada,$unidad_medida);
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