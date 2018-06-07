<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['maquina']) AND isset($_POST['autorizante']) AND isset($_POST['descripcion'])) 
{
	
	$id          		=  $funciones->validar_xss($_POST['id']);
	$codigo_maquina     =  $funciones->validar_xss($_POST['maquina']);
	$autorizante  		=  $funciones->validar_xss($_POST['autorizante']);
	$descripcion  		=  $funciones->validar_xss($_POST['descripcion']);


if (strlen($codigo_maquina)>0 AND strlen($autorizante)>0 AND strlen($descripcion)>0) 
{
	
$objeto      =  new Orden_trabajo($codigo_maquina,'',$autorizante,$descripcion);
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