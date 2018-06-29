<?php 

class Requisc
{

protected $numero;
protected $id_usuario;
protected $fecha_inicio;
protected $fecha_fin;

protected $centro_costo;
protected $area;
protected $tipo;
protected $estado;
protected $prioridad;
protected $comentario;


function __construct($numero='',$id_usuario='',$fecha_inicio='',$fecha_fin='',$centro_costo='',$area='',$tipo='',$estado='',$prioridad='',$comentario='')
{
   $this->numero        =  $numero;
   $this->id_usuario    =  $id_usuario;
   $this->fecha_inicio  =  $fecha_inicio;
   $this->fecha_fin     =  $fecha_fin;
   
   $this->centro_costo  =  $centro_costo;
   $this->area          =  $area;
   $this->tipo          =  $tipo;
   $this->estado        =  $estado;
   $this->prioridad     =  $prioridad;
   $this->comentario     =  $comentario;
 
}

public function agregar()
{

   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM requisc WHERE numero=:numero AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO requisc(numero,id_usuario,fecha_inicio,fecha_fin,centro_costo,area,tipo,prioridad,comentario)VALUES(:numero,:id_usuario,:fecha_inicio,:fecha_fin,:centro_costo,:area,:tipo,:prioridad,:comentario)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
  
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':prioridad',$this->prioridad);
    $statement->bindParam(':comentario',$this->comentario);

    
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
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}



public function eliminar_firma($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM aprobacion_documentos WHERE nro_documento=:id AND tipo='RQ'";
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
     $query     = "DELETE FROM requisd WHERE numero=:id AND tipo='RQ'";
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
     $query     = "UPDATE  requisc  SET  fecha_inicio=:fecha_inicio,fecha_fin=:fecha_fin,centro_costo=:centro_costo,area=:area,tipo=:tipo,prioridad=:prioridad,
       comentario=:comentario
      WHERE  numero=:id AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':fecha_fin',$this->fecha_fin);
    
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
   
    $statement->bindParam(':prioridad',$this->prioridad);
    $statement->bindParam(':comentario',$this->comentario);
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





function lista($tipo)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT r.id,r.numero,r.comentario,concat(u.nombres ,' ', u.apellidos) as usuario, r.fecha_inicio, r.fecha_fin, c.id as idcentro_costo, c.codigo as codigo_cc, c.descripcion as centro_costo, a.id as idarea, a.codigo as codigo_area,a.descripcion as area, r.tipo, r.estado, r.prioridad

from requisc as r
left join area as a on r.area = a.id
left join usuario as u on r.id_usuario = u.id
left join centro_costo as c on r.centro_costo = c.id 

 WHERE r.tipo=:tipo";
	$statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
	$statement->execute();
	$result = $statement->fetchAll();
	return $result;
	} catch (Exception $e) {
	echo "ERROR: " . $e->getMessage();
	}


}


function lista_ordenes($tipo,$orden)
{
   
  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM requisc as c WHERE c.estado='A' AND c.tipo=:tipo AND 
c.numero IN (SELECT numero FROM requisd WHERE tipo=:tipo )  AND 
c.numero  NOT IN ( SELECT  requerimiento FROM comovc WHERE tipo=:orden)";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
  $statement->bindParam(':orden',$orden);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}




public function consulta($id,$campo,$tipo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT r.id,r.comentario, r.numero, concat(u.nombres ,' ', u.apellidos) as usuario, r.fecha_inicio, r.fecha_fin, c.id as idcentro_costo, c.codigo as codigo_cc, c.descripcion as centro_costo,a.id as idarea, a.codigo as codigo_area, a.descripcion as area, r.tipo, r.estado, r.prioridad
from requisc as r
left join area as a on r.area = a.id
left join usuario as u on r.id_usuario = u.id
left join centro_costo as c on r.centro_costo = c.id 
 WHERE r.numero=:id AND r.tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':tipo',$tipo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}




function actualizar_estado($tipo,$numero)
{

try {
  
$conexion = Conexion::get_conexion();
$query    = "SELECT  * FROM aprobacion_documentos WHERE tipo=:tipo AND nro_documento=:numero AND estado=1";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':numero',$numero);
$statement->execute();
$result = $statement->fetchAll();
if (count($result)==3)
{
  
$query =  "UPDATE requisc SET estado='A' WHERE numero=:numero AND tipo=:tipo";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':numero',$numero);
if ($statement)
{
  $statement->execute();
  return "ok";
}
else
{
  return "error";
}

}elseif (count($result)==2 || 1 || 0) {
 $query =  "UPDATE requisc SET estado='P' WHERE numero=:numero AND tipo=:tipo";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':numero',$numero);
if ($statement)
{
  $statement->execute();
  return "ok";
}
else
{
  return "error";
}
}


} catch (Exception $e) {
  
  echo "ERROR: " . $e->getMessage();
}




}

public function actualizar_rq($numero,$tipo)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  requisc  SET estado='AT' WHERE 
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

function actualizar_estado_oc($tipo,$numero)
{

try {
  
$conexion = Conexion::get_conexion();
$query    = "SELECT  * FROM aprobacion_documentos WHERE tipo=:tipo AND nro_documento=:numero AND estado=1";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':numero',$numero);
$statement->execute();
$result = $statement->fetchAll();
if (count($result)==3)
{
 
$query =  "UPDATE comovc SET estado='01' WHERE numero=:numero AND tipo=:tipo";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':numero',$numero);
if ($statement)
{
  $statement->execute();
  return "ok";
}
else
{
  return "error";
}

}elseif (count($result)==2 || 1 || 0) {
 $query =  "UPDATE comovc SET estado='00' WHERE numero=:numero AND tipo=:tipo";
$statement = $conexion->prepare($query);
$statement->bindParam(':tipo',$tipo);
$statement->bindParam(':numero',$numero);
if ($statement)
{
  $statement->execute();
  return "ok";
}
else
{
  return "error";
}
}


} catch (Exception $e) {
  
  echo "ERROR: " . $e->getMessage();
}




}



}



 ?>