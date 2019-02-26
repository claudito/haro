<?php 

include'../../autoload.php';
include'../../session.php';

$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

$articulo       =  new Articulo();
$requisc        =  new Requisc();
$funciones      =  new Funciones();
$message        =  new Message();

$idnumero       =   $_REQUEST['idnumero'];
$codigo         =   $_REQUEST['codigo'];
$cantidad       =   $_REQUEST['cantidad'];
$comentario     =   $funciones->validar_xss($_REQUEST['comentario']);
$centro_costo   =   $_REQUEST['centro_costo'];

try {
	
$query =  "SELECT * FROM articulo WHERE id=:codigo";
$statement = $conexion->prepare($query);
$statement->bindParam(':codigo',$codigo);
$statement->execute();
$data = $statement->fetch(PDO::FETCH_ASSOC);

##########

$query =  "INSERT INTO requisd(numero, item, codigo, descripcion, unidad, cantidad, saldo, comentario, centro_costo, ot, maquina, tipo)
VALUES
(:numero, 0, :codigo, :descripcion, 'UNIDAD', :cantidad, :saldo, comentario, :centro_costo, '', '', 'RQ')";
$statement = $conexion->prepare($query);
$statement->bindParam(':numero',$idnumero);
$statement->bindParam(':codigo',$data['codigo']);
$statement->bindParam(':descripcion',$data['descripcion']);
$statement->bindParam(':cantidad',$cantidad);
$statement->bindParam(':saldo',$cantidad);
$statement->bindParam(':centro_costo',$centro_costo);
$statement->execute();
echo  $message->mensaje("Buen Trabajo","success","Registro Agregado",2);



} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();


}







 ?>