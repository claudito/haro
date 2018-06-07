<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['codigo_maquina']) AND isset($_POST['usuario']) AND isset($_POST['descripcion']) AND isset($_POST['observaciones']) AND isset($_POST['fecha_finalizacion']) AND isset($_POST['hora_finalizacion'])  AND isset($_POST['responsable_finalizacion'])) 
{  

    $correlativo  =  new Correlativo();

	 $numero        	        =  $correlativo->correlativo('OT','numero')+1;
	 $codigo_maquina 	        =  $funciones->validar_xss($_POST['codigo_maquina']);
	 $usuario        	        =  $funciones->validar_xss($_POST['usuario']);
	 $descripcion 		        =  $funciones->validar_xss($_POST['descripcion']);
	 $observaciones 	        =  $funciones->validar_xss($_POST['observaciones']);
	 $fecha_finalizacion     	=  $funciones->validar_xss($_POST['fecha_finalizacion']);
	 $hora_finalizacion 	    =  $funciones->validar_xss($_POST['hora_finalizacion']);
	 $responsable_finalizacion  =  $funciones->validar_xss($_POST['responsable_finalizacion']);


if (strlen($codigo_maquina)>0 AND strlen($descripcion)>0 AND strlen($observaciones)>0 AND strlen($fecha_finalizacion)>0 AND strlen($hora_finalizacion)>0 AND strlen($responsable_finalizacion)>0 ) 
{
  
$objeto      =  new Orden_trabajo($numero,$codigo_maquina,$usuario,$descripcion,$observaciones,$fecha_finalizacion,$hora_finalizacion,$responsable_finalizacion);
$valor       =  $objeto->agregar();

if ($valor=='existe') 
{
  echo  $message->mensaje("Registro duplicado","warning","Intente con otra descripción",2);
} 
else if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Existoso",2);
  $correlativo  =  new Correlativo('OT','',1);
  $correlativo->actualizar_correlativo();

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