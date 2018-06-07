<?php 

include'../../autoload.php';
include'../../session.php';

$message     =  new Message();
$funciones   =  new Funciones();

if (isset($_POST['id']) AND isset($_POST['codigo_maquina'])  AND isset($_POST['descripcion']) AND isset($_POST['observaciones']) AND isset($_POST['responsable_finalizacion'])) 
{
	
	$id          		      =  $funciones->validar_xss($_POST['id']);
	 $codigo_maquina  	      =  $funciones->validar_xss($_POST['codigo_maquina']);
    $descripcion  		      =  $funciones->validar_xss($_POST['descripcion']);
     $observaciones  		  =  $funciones->validar_xss($_POST['observaciones']);
   
$responsable_finalizacion =  $funciones->validar_xss($_POST['responsable_finalizacion']);
   

if ( strlen($codigo_maquina)>0  AND strlen($descripcion)>0 AND strlen($observaciones)>0  AND strlen($responsable_finalizacion)>0 ) 
{
	
$objeto      =  new Orden_trabajo('',$codigo_maquina,'',$descripcion,$observaciones,'','',$responsable_finalizacion);
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