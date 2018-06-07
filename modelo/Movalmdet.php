<?php 

class Movalmdet
{

protected $alm;
protected $numero;
protected $tran;
protected $item;
protected $codigo;
protected $descripcion;
protected $unidad;
protected $cantidad;
protected $fecha;
protected $centro_costo;
protected $tipo;
protected $estado;
function __construct($alm='',$numero='',$tran='',$item='',$codigo='',$descripcion='',$unidad='',$cantidad='',$fecha='',$centro_costo='',$tipo='',$estado='')
{
   $this->alm               =  $alm; 
   $this->numero            =  $numero;
   $this->tran              =  $tran;
   $this->item              =  $item;
   $this->codigo            =  $codigo;
   $this->descripcion       =  $descripcion;
   $this->unidad            =  $unidad;
   $this->cantidad          =  $cantidad;
   $this->fecha             =  $fecha;
   $this->centro_costo      =  $centro_costo;
   $this->tipo              =  $tipo;
   $this->estado            =  $estado;  
}

function item($tipo,$numero)
{


  try {

  $modelo    = new Conexion();
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT  * FROM movalmdet WHERE tipo=:tipo AND numero=:numero
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
$query     = "INSERT INTO movalmdet(alm,numero,item,codigo,descripcion,unidad,cantidad,tipo)VALUES(:alm,:numero,:item,:codigo,:descripcion,:unidad,:cantidad,:tipo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':alm',$this->alm);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':item',$this->item($this->tipo,$this->numero));
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':cantidad',$this->cantidad);
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
   
    $conexion  = Conexion::get_conexion();
     $query     = "DELETE FROM movalmdet WHERE id=:id";
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


public function eliminar_I($id,$estados)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE stock SET estado=:estado where id=:id AND tipo='NS'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':estado',$estados);
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
public function actualizar_stock($id,$cantidad)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  stock  SET cantidad=:cantidad WHERE  id=:id AND tipo='NS'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':cantidad',$cantidad);
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

public function eliminar_stock()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM stock WHERE codigo=:codigo and descripcion=:descripcion and tipo='NS'";
    $statement = $conexion->prepare($query);
   $statement->bindParam(':codigo',$this->codigo);
   $statement->bindParam(':descripcion',$this->descripcion);
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
     $query     = "UPDATE  movalmdet  SET tran=:tran,cantidad=:cantidad,fecha=:fecha,centro_costo=:centro_costo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':fecha',$this->fecha);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    

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
  $query     = "SELECT m.id, m.alm, m.numero, t.codigo AS tipo_transaccion, t.descripcion AS transaccion, m.item, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, u.codigo AS codigo_unidad, u.descripcion AS unidad, m.cantidad, m.costo, m.fecha, c.codigo AS codigo_cc, c.descripcion AS centro_costo,  m.tipo 
FROM movalmdet AS m
LEFT JOIN transacciones_mov AS t ON m.tran = t.codigo
LEFT JOIN articulo AS a ON m.codigo = a.codigo
LEFT JOIN unidad AS u ON m.unidad = u.descripcion
LEFT JOIN centro_costo AS c ON m.centro_costo = c.codigo
WHERE m.numero =:numero AND m.tipo = :tipo ORDER BY item";
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
    $query     = "SELECT m.id, m.alm, m.numero, t.codigo AS tipo_transaccion, t.descripcion AS transaccion, m.item, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, u.codigo AS codigo_unidad, u.descripcion AS unidad, m.cantidad, m.costo, m.fecha, c.codigo AS codigo_cc, c.descripcion AS centro_costo,  m.tipo 
FROM movalmdet AS m
LEFT JOIN transacciones_mov AS t ON m.tran = t.codigo
LEFT JOIN articulo AS a ON m.codigo = a.codigo
LEFT JOIN unidad AS u ON m.unidad = u.descripcion
LEFT JOIN centro_costo AS c ON m.centro_costo = c.codigo

WHERE m.id=:id";
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