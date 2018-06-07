<?php 

class Requisd
{


protected $numero;
protected $item;
protected $codigo;
protected $descripcion;
protected $unidad;
protected $cantidad;
protected $saldo;
protected $centro_costo;
//protected $ot;
protected $comentario;
protected $fecha;
protected $tipo;


function __construct($numero='',$item='',$codigo='',$descripcion='',$unidad='',$cantidad='',$saldo='',$centro_costo=''/*,$ot=''*/,$comentario='',$fecha='',$tipo='')
{
   $this->numero        =  $numero;
   $this->item          =  $item;
   $this->codigo        =  $codigo;
   $this->descripcion   =  $descripcion;
   $this->unidad        =  $unidad;
   $this->cantidad      =  $cantidad;
   $this->saldo         =  $saldo;
   $this->fecha         =  $fecha;
   $this->centro_costo  =  $centro_costo;
   //$this->ot            =  $ot;
   $this->comentario    =  $comentario;
   $this->fecha         =  $fecha;
   $this->tipo          =  $tipo;
 
}


function item($tipo,$numero)
{


  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM requisd WHERE tipo=:tipo AND numero=:numero
                ORDER BY item DESC limit 1";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
  $statement->bindParam(':numero',$numero);
  $statement->execute();
  $result   = $statement->fetch();
  return $result['item']+1;
  
  } 
  catch (Exception $e)
  {
  echo "ERROR: " . $e->getMessage();
  }


}



public function agregar()
{

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "INSERT INTO requisd(numero,item,codigo,descripcion,unidad,cantidad,saldo,centro_costo,comentario,fecha,tipo)VALUES(:numero,:item,:codigo,:descripcion,:unidad,:cantidad,:saldo,:centro_costo,:comentario,:fecha,:tipo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':item',$this->item($this->tipo,$this->numero));
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':saldo',$this->saldo);
    $statement->bindParam(':centro_costo',$this->centro_costo);
  
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->bindParam(':tipo',$this->tipo);
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


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM requisc WHERE numero=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}

public function eliminar_det($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM requisd WHERE numero=:id AND tipo='RS'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}

public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  requisd  SET cantidad=:cantidad,saldo=:saldo,centro_costo=:centro_costo,comentario=:comentario,fecha=:fecha WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':saldo',$this->saldo);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->bindParam(':id',$id);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}





function lista($numero,$tipo)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT r.id,r.numero,r.item,a.codigo as codigo_articulo, a.descripcion as descripcion_articulo, u.descripcion as unidad, r.cantidad, r.saldo, r.estado, r.fecha, r.comentario, c.id as idcentro_costo, c.codigo as codigo_cc, c.descripcion as centro_costo, r.maquina, r.tipo
from requisd as r
left join articulo as a on r.codigo = a.codigo
left join unidad as u on r.unidad = u.descripcion
left join centro_costo as c on r.centro_costo = c.codigo

WHERE r.numero =:numero AND r.tipo = :tipo ORDER BY item";
	$statement = $conexion->prepare($query);
  $statement->bindParam(':numero',$numero);
  $statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}





public function consulta($id,$campo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT r.id,r.numero,r.item,a.codigo as codigo_articulo, a.descripcion as descripcion_articulo, u.descripcion as unidad, r.cantidad, r.saldo, r.estado, r.fecha, r.comentario, c.id as idcentro_costo, c.codigo as codigo_cc, c.descripcion as centro_costo, r.tipo
from requisd as r
left join articulo as a on r.codigo = a.codigo
left join unidad as u on r.unidad = u.descripcion
left join centro_costo as c on r.centro_costo = c.codigo

WHERE r.id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}



public function actualizar_rq($saldo,$numero,$tipo)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  requisd  SET saldo=:saldo WHERE 
      numero=:numero AND tipo=:tipo";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':saldo',$saldo);
    $statement->bindParam(':numero',$numero);
    $statement->bindParam(':tipo',$tipo);
   
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}

public function actualizar_rq1($numero_rq,$rq,$id_detalle)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  requisd  SET saldo=0 WHERE 
      numero=:numero_rq AND tipo=:rq AND id=:id_detalle";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero_rq',$numero_rq);
    $statement->bindParam(':rq',$rq);
    $statement->bindParam(':id_detalle',$id_detalle);
   
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}



public function actualizar_estado($numero,$tipo)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  requisd  SET estado='A' WHERE 
      numero=:numero AND tipo=:tipo";

    $statement = $conexion->prepare($query);
   
    $statement->bindParam(':numero',$numero);
    $statement->bindParam(':tipo',$tipo);
   
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}




public function actualizar_estado_detalle($numero_rq,$rq,$id_detalle)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  requisd  SET estado='A' WHERE 
      numero=:numero_rq AND tipo=:rq AND id=:id_detalle";

    $statement = $conexion->prepare($query);
   
    $statement->bindParam(':numero_rq',$numero_rq);
    $statement->bindParam(':rq',$rq);
    $statement->bindParam(':id_detalle',$id_detalle);
    if(!$statement)
    {
    return "error";
    }
    else
    {
    $statement->execute();
    return "ok";
    }
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}




}



 ?>