<?php 

include'../../autoload.php';
include'../../session.php';


$funciones 		=  new Funciones();
$message        =  new Message();


echo $codigo_articulo    = $funciones->validar_xss($_POST['codigo_articulo']);echo "<br>";
echo $c_requerida    = $funciones->validar_xss($_POST['c_requerida']);echo "<br>";
echo $c_utilizada    = $funciones->validar_xss($_POST['c_utilizada']);echo "<br>";
echo $codigo_unidad    = $funciones->validar_xss($_POST['codigo_unidad']);echo "<br>";


/*
$material_utilizado =  new Material_utilizado('',$codigo_articulo,'',$c_requerida,$c_utilizada,$codigo_unidad);
$valor   =  $material_utilizado->agregar();

switch ($valor) {
	case 'ok':
	echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
		break;
	default:
	echo  $message->mensaje("Error","error","Intente de Nuevo",2);
		break;
}
*/
 ?>