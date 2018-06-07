<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if ( isset($_POST['tipo_transaccion']) AND isset($_POST['fecha_inicio']) AND isset($_POST['comentario']) AND isset($_POST['codigo_cc']) AND isset($_POST['area']) AND isset($_POST['moneda']))
{
	
    $id          		=  $funciones->validar_xss($_POST['id']);
    $tipo          		=  $funciones->validar_xss($_POST['tipo']);
    $tran          		=  $funciones->validar_xss($_POST['tipo_transaccion']);
	$fecha_inicio 		=  $funciones->validar_xss($_POST['fecha_inicio']);
	$comentario 		=  $funciones->validar_xss($_POST['comentario']);
	$centro_costo 		=  $funciones->validar_xss($_POST['codigo_cc']);
	$area 				=  $funciones->validar_xss($_POST['area']);
    $moneda 			=  $funciones->validar_xss($_POST['moneda']);

if (strlen($tran)>0 AND strlen($fecha_inicio)>0  AND strlen($comentario)>0 AND strlen($centro_costo)>0  AND strlen($area)>0 AND strlen($moneda)>0) 
{
	
$objeto      =  new Movalmcab('','',$tran,'',$fecha_inicio,$comentario,$centro_costo,$area,$tipo,$moneda);
$valor       =  $objeto->actualizar($id);


if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);
}
else
{
  echo  $message->mensaje("Error de Actualización","error","Consulte al área de Soporte",2);
}

} 
else 
{
echo  $message->mensaje("Algún dato esta vacío","error","Verifique de nuevo",2);
}


} 


else 
{
echo  $message->mensaje("Algúna variable no esta definida","error","Consulte al área de soporte",2);
}

  
 ?>