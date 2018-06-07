<?php 

class Orden_trabajo
{


protected $numero;
protected $codigo_maquina;
protected $usuario;
protected $descripcion;
protected $observaciones;
protected $fecha_finalizacion;
protected $hora_finalizacion;
protected $responsable_finalizacion;


function __construct($numero='',$codigo_maquina='',$usuario='',$descripcion='',$observaciones='',$fecha_finalizacion='',$hora_finalizacion='',$responsable_finalizacion='')
{
   $this->numero                     =  $numero;
   $this->codigo_maquina             =  $codigo_maquina;
   $this->usuario                    =  $usuario;
   $this->descripcion                =  $descripcion;
   $this->observaciones              =  $observaciones;
   $this->fecha_finalizacion         =  $fecha_finalizacion;
   $this->hora_finalizacion          =  $hora_finalizacion;
   $this->responsable_finalizacion   =  $responsable_finalizacion;
 
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM orden_trabajo WHERE numero=:numero";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO orden_trabajo(numero,codigo_maquina,usuario,descripcion,observaciones,fecha_finalizacion,hora_finalizacion,responsable_finalizacion)VALUES(:numero,:codigo_maquina,:usuario,:descripcion,:observaciones,:fecha_finalizacion,:hora_finalizacion,:responsable_finalizacion)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':codigo_maquina',$this->codigo_maquina);
    $statement->bindParam(':usuario',$this->usuario);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':observaciones',$this->observaciones);
    $statement->bindParam(':fecha_finalizacion',$this->fecha_finalizacion);
    $statement->bindParam(':hora_finalizacion',$this->hora_finalizacion);
    $statement->bindParam(':responsable_finalizacion',$this->responsable_finalizacion);



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


function eliminar_cab($numero)
{

$conexion  = Conexion::get_conexion();
$query     = "DELETE FROM orden_trabajo WHERE numero=:numero";
$statement = $conexion->prepare($query);
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

function eliminar_1($numero)
{

$conexion  = Conexion::get_conexion();
$query     = "DELETE FROM tareas_ejecutar WHERE numero=:numero";
$statement = $conexion->prepare($query);
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


function eliminar_2($numero)
{

$conexion  = Conexion::get_conexion();
$query     = "DELETE FROM materiales_utilizados WHERE numero=:numero";
$statement = $conexion->prepare($query);
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

function eliminar_3($numero)
{

$conexion  = Conexion::get_conexion();
$query     = "DELETE FROM personal_trabajos WHERE numero=:numero";
$statement = $conexion->prepare($query);
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


function eliminar_4($numero)
{

$conexion  = Conexion::get_conexion();
$query     = "DELETE FROM control_ot WHERE numero=:numero";
$statement = $conexion->prepare($query);
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
public function actualizar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  orden_trabajo SET  codigo_maquina=:codigo_maquina,descripcion=:descripcion,observaciones=:observaciones,responsable_finalizacion=:responsable_finalizacion
      WHERE  numero=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo_maquina',$this->codigo_maquina);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':observaciones',$this->observaciones);
    $statement->bindParam(':responsable_finalizacion',$this->responsable_finalizacion);
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




function lista()
{
   
	try {

	$modelo    = new Conexion();
	$conexion  = $modelo->get_conexion();
	$query     = "SELECT ot.usuario,ot.numero,m.descripcion as nombre,m.codigo,ot.usuario,ot.descripcion,ot.fecha_finalizacion,ot.hora_finalizacion,ot.responsable_finalizacion
FROM orden_trabajo AS ot 
INNER JOIN maquina AS m ON m.codigo = ot.codigo_maquina";
	$statement = $conexion->prepare($query); 
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
    $query     = "SELECT ot.observaciones,ot.numero,m.descripcion as nombre,m.codigo,ot.usuario,ot.descripcion,ot.fecha_finalizacion,ot.hora_finalizacion,ot.responsable_finalizacion
FROM orden_trabajo AS ot 
INNER JOIN maquina AS m ON m.codigo = ot.codigo_maquina WHERE ot.numero=:numero";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$id);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}


}



 ?>