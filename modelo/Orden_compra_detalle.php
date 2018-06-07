<?php 

class Orden_compra_detalle
{


protected $numero;
protected $saldo;
protected $precio;
protected $centro_costo;
protected $tipo;


function __construct($numero='',$saldo='',$precio='',$centro_costo='',$tipo='')
{
   $this->numero        =  $numero;
   $this->saldo         =  $saldo;
   $this->precio        =  $precio;
   $this->centro_costo  =  $centro_costo;
   $this->tipo          =  $tipo;
}




function transferir($tipo='',$rq='',$numero='',$orden='')
{
    try 
    {

        $modelo    = new Conexion();
        $conexion  = $modelo->get_conexion();
        $query     = "INSERT INTO comovd(numero,item,codigo,descripcion,unidad,cantidad,saldo,centro_costo,ot,tipo)
SELECT :orden,d.item,d.codigo,d.descripcion,d.unidad,d.cantidad,d.cantidad,d.centro_costo,d.ot,:tipo
FROM requisc AS c INNER JOIN requisd AS d ON c.numero=d.numero AND c.tipo=d.tipo WHERE c.tipo=:rq AND c.estado='A' AND c.numero=:numero;";
        $statement = $conexion->prepare($query);
        $statement->bindParam(':tipo',$tipo);
        $statement->bindParam(':rq',$rq);
        $statement->bindParam(':numero',$numero);
        $statement->bindParam(':orden',$orden);
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



public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM area WHERE id=:id";
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
     $query     = "UPDATE  area  SET codigo=:codigo,descripcion=:descripcion WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
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
	$query     = "SELECT * FROM area ORDER BY descripcion";
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
    $query     = "SELECT * FROM area WHERE id=:id";
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