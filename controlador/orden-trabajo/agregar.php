<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['maquina']) AND isset($_POST['solicitante']) AND isset($_POST['autorizante']) AND isset($_POST['descripcion'])) 
{
 
$codigo_maquina     =  $funciones->validar_xss($_POST['maquina']);
$solicitante  		=  $funciones->validar_xss($_POST['solicitante']);
$autorizante  		=  $funciones->validar_xss($_POST['autorizante']);
$descripcion  		=  $funciones->validar_xss($_POST['descripcion']);


if (strlen($codigo_maquina)>0 AND strlen($solicitante)>0 AND strlen($autorizante)>0 AND strlen($descripcion)>0) 
{
  
$objeto      =  new Orden_trabajo($codigo_maquina,$solicitante,$autorizante,$descripcion);
$valor       =  $objeto->agregar();

if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
}
else
{
  echo  $message->mensaje("Error de Registro","error","Consulte al área de Soporte",2);
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