<?php 

class Control_ot
{

protected $numero;
protected $kilometraje;
protected $horometro;
protected $fecha;
protected $tipo;

function __construct($numero='',$kilometraje='',$horometro='',$fecha='',$tipo='')
{
   $this->numero           =  $numero;
   $this->kilometraje      =  $kilometraje;
   $this->horometro        =  $horometro;
   $this->fecha            =  $fecha;
   $this->tipo             =  $tipo;

 
}

function agregar (){

  try {
  $conexion  =  Conexion::get_conexion();
  $query     =  "INSERT INTO control_ot(numero,kilometraje,horometro,fecha,tipo)
   VALUES(:numero,:kilometraje,:horometro,:fecha,:tipo)";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':numero',$this->numero);
  $statement->bindParam(':kilometraje',$this->kilometraje);
  $statement->bindParam(':horometro',$this->horometro);
  $statement->bindParam(':fecha',$this->fecha);
  $statement->bindParam(':tipo',$this->tipo);

  
  
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
  $query     =  "DELETE FROM control_ot WHERE id=:id";
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
     $query     = "UPDATE  control_ot  SET kilometraje=:kilometraje,horometro=:horometro,tipo=:tipo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':kilometraje',$this->kilometraje);
    $statement->bindParam(':horometro',$this->horometro);
 
    $statement->bindParam(':tipo',$this->tipo);
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
$query     =  "SELECT  * FROM control_ot WHERE numero=:numero  ";
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
$query      =  "SELECT  * FROM control_ot WHERE id=:id";
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