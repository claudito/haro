<?php 
class Banco{


protected $nombre;





function __construct($nombre='')
{
  
     
     $this->nombre    =  $nombre;
    
  

}

function agregar ()
{

    $db         =  Conexion::get_conexion();
    $query     =  "INSERT INTO banco(nombre)
     VALUES(:nombre)";
    $statement    = $db->prepare($query);
    
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
}
 

function eliminar($id)
{
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query     =  "DELETE FROM banco WHERE id=:id";
$statement    = $db->prepare($query);
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

function actualizar($id)
{
    $conexion   =  new Conexion();
    $db         =  $conexion->get_conexion();
    $query     =  "UPDATE banco SET nombre=:nombre WHERE id=:id";
    $statement    = $db->prepare($query);
    $statement->bindParam(':id',$id);
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
}


function consulta($id,$campo)
{
    
try {
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM banco WHERE id=:id";
$statement  =  $db->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result  =  $statement->fetch();
return $result[$campo];
    
} catch (Exception $e) {
    
echo "Error: ".$e->getMenssage();

}

}

function lista()
{
try {
    
$conexion   =  new Conexion();
$db         =  $conexion->get_conexion();
$query      =  "SELECT  * FROM banco";
$statement  =  $db->prepare($query);
$statement->execute();
$result  =  $statement->fetchAll();
return $result;


} catch (Exception $e) {
    echo "Error:".$e->getMessage();
}

}

}


 ?>