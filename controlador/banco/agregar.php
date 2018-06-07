<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();


$descripcion        =  $_POST['nombre'];



$area = new Banco($descripcion);

$valor   =  $area->agregar();


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




 ?>

