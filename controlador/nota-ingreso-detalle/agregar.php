<?php 

include'../../autoload.php';
include'../../session.php';


$articulo       		=  new Articulo();
$movalmcab_salida      	=  new Movalmcab_salida();
$funciones      		=  new Funciones();
$message        		=  new Message();

$alm			= '01';
$numero         = $funciones->validar_xss($_POST['idnumero']);
//$tran         	= $funciones->validar_xss($_POST['tipo_transaccion']);
$item           = 0;
$idcodigo       = $funciones->validar_xss($_POST['codigo']);

$fecha         = $movalmcab_salida->consulta($idcodigo,'fecha_inicio');
$codigo         = $articulo->consulta($idcodigo,'codigo');
$descripcion    = $articulo->consulta($idcodigo,'descripcion');
$unidad         = $articulo->consulta($idcodigo,'unidad');
$cantidad       = $funciones->validar_xss($_POST['cantidad']);
$precio         = $funciones->validar_xss($_POST['costo']);
//$fecha          = $funciones->validar_xss($_POST['fecha']);
//$centro_costo   = $movalmcab_salida->consulta($idcodigo,'centro');

$tipo           = 'NI';

$movalmdet_salida =  new Movalmdet_salida($alm,$numero,$tran,$item,$codigo,$descripcion,$unidad,$cantidad,$precio,$fecha,$centro_costo,$tipo);
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