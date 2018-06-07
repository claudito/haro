<?php 

class Material_utilizado
{

#protected $codigo_maquina;
protected $codigo_articulo;
protected $descripcion_articulo;
protected $c_requerida;
protected $c_utilizada;
protected $codigo_unidad;


function __construct($codigo_articulo='',$descripcion_articulo='',$c_requerida='',$c_utilizada='',$codigo_unidad='')
{
   #$this->codigo_maquina        =  $codigo_maquina;
   $this->codigo_articulo       =  $codigo_articulo;
   $this->descripcion_articulo  =  $descripcion_articulo;
   $this->c_requerida           =  $c_requerida;
   $this->c_utilizada           =  $c_utilizada;
   $this->codigo_unidad         =  $codigo_unidad;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM mat_ut WHERE codigo_articulo=:codigo_articulo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_articulo',$this->codigo_articulo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO mat_ut(codigo_articulo,c_requerida,c_utilizada,codigo_unidad)VALUES(:codigo_articulo,:c_requerida,:c_utilizada,:codigo_unidad)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_articulo',$this->codigo_articulo);
    #$statement->bindParam(':descripcion_articulo',$this->descripcion_articulo);
    $statement->bindParam(':c_requerida',$this->c_requerida);
    $statement->bindParam(':c_utilizada',$this->c_utilizada);
    $statement->bindParam(':codigo_unidad',$this->codigo_unidad);
    
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


public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM mat_ut WHERE id=:id";
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
     $query     = "UPDATE  mat_ut  SET codigo_articulo=:codigo_articulo,descripcion_articulo=:descripcion_articulo,c_requerida=:c_requerida,c_utilizada=:c_utilizada,codigo_unidad=:codigo_unidad WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_articulo',$this->codigo_articulo);
    $statement->bindParam(':descripcion_articulo',$this->descripcion_articulo);
    $statement->bindParam(':c_requerida',$this->c_requerida);
    $statement->bindParam(':c_utilizada',$this->c_utilizada);
    $statement->bindParam(':codigo_unidad',$this->codigo_unidad);
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




 
function lista_mu($id)
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT m.id, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, m.c_requerida, m.c_utilizada,
u.codigo AS codigo_unidad, u.descripcion AS unidad
from mat_ut AS m
LEFT JOIN articulo AS a ON m.codigo_articulo = a.codigo
LEFT JOIN unidad AS u ON m.codigo_unidad = u.codigo ";
	$statement = $conexion->prepare($query); 
  $statement->bindParam(':id',$id);
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
    $query     = "SELECT m.id, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, m.c_requerida, m.c_utilizada,
u.codigo AS codigo_unidad, u.descripcion AS unidad
from mat_ut AS m
LEFT JOIN articulo AS a ON m.codigo_articulo = a.codigo
LEFT JOIN unidad AS u ON m.codigo_unidad = u.codigo WHERE m.id=:id";
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