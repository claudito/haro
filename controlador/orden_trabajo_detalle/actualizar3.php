<?php 

include'../../autoload.php';
include'../../session.php';


$funciones   =  new Funciones();
$message     =  new Message();

$id         = $funciones->validar_xss($_POST['idnumero']);
$kilometraje         = $funciones->validar_xss($_POST['kilometraje']);
$horometro       = $funciones->validar_xss($_POST['horometro']);
$tipo       = $funciones->validar_xss($_POST['tipo']);


$movalmdet_salida     =  new Control_ot('',$kilometraje,$horometro,'',$tipo);
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