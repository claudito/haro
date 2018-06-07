<?php 

include'../../autoload.php';
include'../../session.php';

$message   =  new Message();
$funciones =  new Funciones();

if (isset($_POST['numero'])) 
{
	$id        =  $funciones->validar_xss($_POST['numero']);

if (strlen($id)>0) 
{

$objeto      =  new Movalmcab();
$valor       =  $objeto->eliminar_cab($id);
$valor2       =  $objeto->eliminar_det($id);
$valor       = $objeto->eliminar_det_stock($id);

if($valor=='ok')
{
  echo  $message->mensaje("Buen Trabajo","success","Registro Eliminado",2);
}
else
{
  echo  $message->mensaje("Error de Eliminación","error","Consulte al área de Soporte",2);
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