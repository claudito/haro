<?php 

class Comovd
{


function __construct()
{

}


function numero_detalle($numero,$item){


	try {

      $modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT c.numero,d.item,d.descripcion,d.cantidad,d.unidad FROM requisc  as c
INNER JOIN requisd as d ON c.numero=d.numero WHERE c.numero=:numero AND d.item=:item";
	$statement = $conexion->prepare($query);
	$statement->bindParam(':numero',$numero);
    $statement->bindParam(':item',$item);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;

		
	} catch (Exception $e) {
		echo "Error: " . $e->getMessage();
	}
}

function lista_ordenes_cab($tipo){
	
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT * FROM comovc WHERE estado = '01' AND tipo='OC'";
	$statement = $conexion->prepare($query);
    $statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}

}



function actualizar_saldo($numero_oc,$numero_detalle,$saldo,$tipo2)
{
	try 
	{

		$modelo    = new Conexion();
		$conexion  = $modelo->get_conexion();
		$query     = "UPDATE comovd  SET saldo=:saldo  WHERE numero=:numero_oc AND id=:numero_detalle AND tipo=:tipo2";
        $statement = $conexion->prepare($query);
		$statement->bindParam(':numero_oc',$numero_oc);
		$statement->bindParam(':numero_detalle',$numero_detalle);
		$statement->bindParam(':saldo',$saldo);
		$statement->bindParam(':tipo2',$tipo2);
		if($statement)
		{
		$statement->execute();
		return "ok";
		}
		else
		{
		return "error";
		}



	} 
	catch (Exception $e) 
	{

	echo "Error:".$e->getMessage();
	}

}



function concepto($puesto='')
{
try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT * FROM comovd AS c WHERE c.tipo='OC' AND c.numero=:puesto ";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}
 

function detalle_rq($puesto='',$tipo='')
{
try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT * FROM requisd WHERE tipo=:tipo  AND numero=:puesto 
AND id NOT IN (SELECT id_requerimiento FROM comovd)";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->bindParam(':tipo',$tipo);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}




function concepto_2($puesto='')
{
try {
	
$conexion   =  Conexion::get_conexion();
$query      =  "SELECT * FROM comovd WHERE tipo='OC' AND numero=:puesto AND  precio > '0'";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
	echo "Error:".$e->getMessage();
}

}


function lista_ordenes($tipo){
	
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT  * FROM requisd WHERE tipo=:tipo AND estado='A'";
	$statement = $conexion->prepare($query);
    $statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}

}


function lista($numero,$tipo)
{
	
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT  * FROM comovd WHERE numero=:numero AND tipo=:tipo";
	$statement = $conexion->prepare($query);
    $statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':numero',$numero);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}




}



public function lista3($puesto,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT  saldo FROM comovd WHERE id=:puesto AND tipo='OC'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':puesto',$puesto);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}


public function lista4($puesto)
{
    try {
        
   $conexion   =  Conexion::get_conexion();
$query      =  "SELECT * FROM comovd WHERE id=:puesto AND tipo='OC' AND saldo>'0'";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':puesto',$puesto);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}








function transferir($tipo='',$rq='',$numero_rq='',$id_numero='',$id_detalle='')
{
	try 
	{

		$modelo    = new Conexion();
		$conexion  = $modelo->get_conexion();
		$query     = "INSERT INTO comovd(numero,numero_rq,id_requerimiento,item,codigo,descripcion,unidad,cantidad,saldo,centro_costo,ot,tipo)
SELECT :id_numero,:numero_rq,d.id,d.item,d.codigo,d.descripcion,d.unidad,d.cantidad,d.cantidad,d.centro_costo,d.ot,:tipo
FROM requisc AS c INNER JOIN requisd AS d ON c.numero=d.numero AND c.tipo=d.tipo WHERE c.tipo=:rq  AND c.numero=:numero_rq AND d.id=:id_detalle;";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':tipo',$tipo);
		$statement->bindParam(':rq',$rq);
		$statement->bindParam(':numero_rq',$numero_rq);
		$statement->bindParam(':id_numero',$id_numero);
		$statement->bindParam(':id_detalle',$id_detalle);
		if($statement)
		{
		$statement->execute();
		return "ok";
		}
		else
		{
		return "error";
		}



	} 
	catch (Exception $e) 
	{

	echo "Error:".$e->getMessage();
	}

}





function actualizar_saldo_oc($id,$precio,$tipo)
{
	try 
	{

		$modelo    = new Conexion();
		$conexion  = $modelo->get_conexion();
		$query     = "UPDATE comovd  SET precio=:precio  WHERE tipo=:tipo AND id=:id";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':precio',$precio);
        $statement->bindParam(':tipo',$tipo);
		$statement->bindParam(':id',$id);

		if($statement)
		{
		$statement->execute();
		return "ok";
		}
		else
		{
		return "error";
		}



	} 
	catch (Exception $e) 
	{

	echo "Error:".$e->getMessage();
	}

}





public function actualizar($numero,$tipo,$precio,$item)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "UPDATE comovd  SET precio=:precio  WHERE numero=:numero AND tipo=:tipo AND item=:item";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$numero);
    $statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':precio',$precio);
    $statement->bindParam(':item',$item);
    if($statement)
    {
    $statement->execute();
    return "ok";
    }
    else
    {
    return "error";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}









public function consulta($id,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM comovd WHERE id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}

public function consulta2($id,$campo,$tipo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM comovd WHERE id=:id AND tipo=:tipo";
    $statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}







}




 ?>