<?php 

class Tareas_ejecutar
{

protected $numero;
protected $descripcion;
protected $estimado;
protected $t_real;
protected $solucionado;


function __construct($numero='',$descripcion='',$estimado='',$t_real='',$solucionado='')
{
   $this->numero           =  $numero;
   $this->descripcion      =  $descripcion;
   $this->estimado         =  $estimado;
   $this->t_real           =  $t_real;
   $this->solucionado      =  $solucionado;

 
}

function agregar (){

  try {
  $conexion  =  Conexion::get_conexion();
  $query     =  "INSERT INTO tareas_ejecutar(numero,descripcion,estimado,t_real,solucionado)
   VALUES(:numero,:descripcion,:estimado,:t_real,:solucionado)";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':numero',$this->numero);
  $statement->bindParam(':descripcion',$this->descripcion);
  $statement->bindParam(':estimado',$this->estimado);
  $statement->bindParam(':t_real',$this->t_real);
  $statement->bindParam(':solucionado',$this->solucionado);
  
  
  if ($statement) 
  {   
    $statement->execute();
    return "ok";
  } 
  else 
  {
    return "error";
  } 

  } catch (Exception $e) {
    
  }

}

 function eliminar($id)
{
  $conexion  =  Conexion::get_conexion();
  $query     =  "DELETE FROM tareas_ejecutar WHERE id=:id";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':id',$id);
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

public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  tareas_ejecutar  SET descripcion=:descripcion,estimado=:estimado,t_real=:t_real,solucionado=:solucionado WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':estimado',$this->estimado);
    $statement->bindParam(':t_real',$this->t_real);
    $statement->bindParam(':solucionado',$this->solucionado);
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





function lista($numero)
{
try {
  
$conexion  =  Conexion::get_conexion();
$query     =  "SELECT  * FROM tareas_ejecutar WHERE numero=:numero  ORDER BY id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':numero',$numero);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
  echo "Error:".$e->getMessage();
}

}





function consulta($id,$campo)
{
  
try {
$conexion  =  Conexion::get_conexion();
$query      =  "SELECT  * FROM tareas_ejecutar WHERE id=:id";
$statement  =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
  
} catch (Exception $e) {
  
echo "Error: ".$e->getMenssage();

}

}




}



 ?>