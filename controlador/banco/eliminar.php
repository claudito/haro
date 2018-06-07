<?php 

include'../../autoload.php';

$id       =   $_POST['id'];

$mensaje  =  new Message();
$area  =  new Banco();
$valor    =  $area->eliminar($id);

if ($valor=='ok') 
{
 echo 
 $mensaje->mensaje('Buen Trabajo','success','Usuario Eliminado Correctamente',2);

}
else 
{
	echo
  $mensaje->mensaje('Error','error','Consulte al área de Soporte',2);
}



 ?>