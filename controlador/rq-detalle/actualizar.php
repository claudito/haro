<?php 

include'../../autoload.php';
include'../../session.php';

$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

$funciones   =  new Funciones();
$message     =  new Message();


$id          	= $funciones->validar_xss($_POST['idnumero']);
$cantidad    	= $funciones->validar_xss($_POST['cantidad']);
$saldo       	= $funciones->validar_xss($_POST['cantidad']);
$centro_costo	= $funciones->validar_xss($_POST['centro_costo']);

$comentario  	= $funciones->validar_xss($_POST['comentario']);

try {
	
$query   =  "UPDATE requisd SET 

cantidad=:cantidad,
saldo   =:saldo,
centro_costo  = :centro_costo,
comentario=:comentario
WHERE 
id=:id";
$statement = $conexion->prepare($query);
$statement->bindParam(':cantidad',$cantidad);
$statement->bindParam(':saldo',$saldo);
$statement->bindParam(':centro_costo',$centro_costo);
$statement->bindParam(':id',$id);
$statement->bindParam(':comentario',$comentario);
$statement->execute();
echo  $message->mensaje("Buen Trabajo","success","Registro Actualizado",2);


} catch (Exception $e) {
	
echo  $message->mensaje("Error","error","Intente de Nuevo",2);
echo $e->getMessage();

}


 ?>