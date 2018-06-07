<?php 

class Materiales_utilizados
{


protected $numero;
protected $codigo;
protected $descripcion;
protected $requerida;
protected $utilizada;
protected $unidad_medida;


function __construct($numero='',$codigo='',$descripcion='',$requerida='',$utilizada='',$unidad_medida='')
{
   $this->numero         =  $numero;
   $this->codigo         =  $codigo;
   $this->descripcion    =  $descripcion;
   $this->requerida      =  $requerida;
   $this->utilizada      =  $utilizada;
   $this->unidad_medida  =  $unidad_medida;
 
}

function agregar (){

  try {
  $conexion  =  Conexion::get_conexion();
  $query     =  "INSERT INTO materiales_utilizados(numero,codigo,descripcion,requerida,utilizada,unidad_medida)
   VALUES(:numero,:codigo,:descripcion,:requerida,:utilizada,:unidad_medida)";
  $statement    = $conexion->prepare($query);
  $statement->bindParam(':numero',$this->numero);
  $statement->bindParam(':codigo',$this->codigo);
  $statement->bindParam(':descripcion',$this->descripcion);
  $statement->bindParam(':requerida',$this->requerida);
  $statement->bindParam(':utilizada',$this->utilizada);
  $statement->bindParam(':unidad_medida',$this->unidad_medida);
  
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


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM materiales_utilizados WHERE id=:id";
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
     $query     = "UPDATE  materiales_utilizados  SET codigo=:codigo,descripcion=:descripcion,requerida=:requerida,utilizada=:utilizada,unidad_medida=:unidad_medida WHERE  id=:id";
    $statement = $conexion->prepare($query);
   
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':requerida',$this->requerida);
    $statement->bindParam(':utilizada',$this->utilizada);
    $statement->bindParam(':unidad_medida',$this->unidad_medida);
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

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT * FROM materiales_utilizados  WHERE numero=:numero ";
	$statement = $conexion->prepare($query); 
  $statement->bindParam(':numero',$numero);
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
    $query     = "SELECT * FROM materiales_utilizados WHERE id=:id";
    $statement = $conexion->prepare($query);
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