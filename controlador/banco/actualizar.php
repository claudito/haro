
<?php 

include'../../autoload.php';


$id 			= $_POST['id'];
$descripcion   	= $_POST['nombre'];


$mensaje  	=  new Message();
$area 		= new Banco($descripcion);
$valor    	=  $area->actualizar($id);




 ?>