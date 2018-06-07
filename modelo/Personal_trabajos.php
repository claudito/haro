<?php 
 
class Personal_trabajos
{

protected $numero;
protected $categoria;
protected $nombre;



function __construct($numero='',$categoria='',$nombre='')
{
   $this->numero           =  $numero;
   $this->categoria        =  $categoria;
   $this->nombre           =  $nombre;


 
}

function agregar (){

  try {
  $conexion  =  Conexion::get_conexion();
  $query     =  "INSERT INTO personal_trabajos(numero,categoria,nombre)
   VALUES(:numero,:categoria,:nombre)";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':numero',$this->numero);
  $statement->bindParam(':categoria',$this->categoria);
  $statement->bindParam(':nombre',$this->nombre);
 
  
  
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
  $query     =  "DELETE FROM personal_trabajos WHERE id=:id";
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
     $query     = "UPDATE  personal_trabajos  SET categoria=:categoria,nombre=:nombre WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':categoria',$this->categoria);
    $statement->bindParam(':nombre',$this->nombre);
 
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
$query     =  "SELECT  * FROM personal_trabajos WHERE numero=:numero  ";
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
$query      =  "SELECT  * FROM personal_trabajos WHERE id=:id";
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