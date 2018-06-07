<?php 
 
class Movalmdet_salida
{

protected $alm;
protected $numero;
protected $tran;
protected $item;
protected $codigo;
protected $descripcion;
protected $unidad;
protected $cantidad;
protected $costo;
protected $fecha;
protected $centro_costo;
protected $tipo;

function __construct($alm='',$numero='',$tran='',$item='',$codigo='',$descripcion='',$unidad='',$cantidad='',$costo='',$fecha='',$centro_costo='',$tipo='')
{
   $this->alm               =  $alm; 
   $this->numero            =  $numero;
   $this->tran              =  $tran;
   $this->item              =  $item;
   $this->codigo            =  $codigo;
   $this->descripcion       =  $descripcion;
   $this->unidad            =  $unidad;
   $this->cantidad          =  $cantidad;
   $this->costo             =  $costo;
   $this->fecha             =  $fecha;
   $this->centro_costo      =  $centro_costo;
   $this->tipo              =  $tipo;
   
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









function transferir_oc($numero_oc,$numero_detalle,$saldo) 
{
  try 
  {

    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "INSERT INTO movalmdet(alm,numero,id_importado,numero_oc,item,item_importado,codigo,descripcion,unidad,cantidad,costo,tipo,estado)
SELECT '01',:numero,d.id,:numero_oc,:item,d.item,d.codigo,d.descripcion,d.unidad,:saldo,d.precio,:tipo,'A'
FROM comovc AS c INNER JOIN comovd AS d ON c.numero=d.numero  WHERE c.tipo='OC'  AND c.numero=:numero_oc AND d.id = :numero_detalle;";
        $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':numero_oc',$numero_oc);
    $statement->bindParam(':saldo',$saldo);
    $statement->bindParam(':numero_detalle',$numero_detalle);
    $statement->bindParam(':item',$this->item($this->tipo,$this->numero));
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
  catch (Exception $e) 
  {

  echo "Error:".$e->getMessage();
  }

}





public function agregar()
{

$modelo    = new Conexion();
$conexion  = $modelo->get_conexion();
$query     = "INSERT INTO movalmdet(alm,numero,item,codigo,descripcion,unidad,cantidad,costo,tipo)VALUES(:alm,:numero,:item,:codigo,:descripcion,:unidad,:cantidad,:costo,:tipo)";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':alm',$this->alm);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':item',$this->item($this->tipo,$this->numero));
    $statement->bindParam(':codigo',$this->codigo);
    $statement->bindParam(':descripcion',$this->descripcion);
    $statement->bindParam(':unidad',$this->unidad);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':costo',$this->costo);
     
 
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
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
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


public function eliminar_stock($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM stock WHERE id=:id";
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
     $query     = "UPDATE  movalmdet  SET tran=:tran,cantidad=:cantidad,costo=:costo,fecha=:fecha,centro_costo=:centro_costo WHERE  id=:id";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':cantidad',$this->cantidad);
    $statement->bindParam(':costo',$this->costo);
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





public function actualizar_stock($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "UPDATE  stock  SET cantidad=:cantidad WHERE  id=:id AND tipo='NI'";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':cantidad',$this->cantidad);
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
  $query     = "SELECT m.id, m.alm, m.numero, t.codigo AS tipo_transaccion, t.descripcion AS transaccion, m.item, a.codigo AS codigo_articulo, a.descripcion AS descripcion_articulo, u.codigo AS codigo_unidad, u.descripcion AS unidad, m.cantidad, m.costo, m.fecha, c.codigo AS codigo_cc, c.descripcion AS centro_costo, o.codigo AS codigo_ot, o.descripcion AS orden_trabajo, m.tipo
FROM movalmdet AS m LEFT JOIN transacciones_mov AS t ON m.tran = t.codigo
LEFT JOIN articulo AS a ON m.codigo = a.codigo
LEFT JOIN unidad AS u ON m.unidad = u.descripcion
LEFT JOIN centro_costo AS c ON m.centro_costo = c.codigo
LEFT JOIN ord_fab AS o ON m.ot = o.codigo
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

public function consulta_nav($id,$campo,$tipo)
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
    $statement->bindParam(':tipo',$tipo);
    $statement->execute();
    $result   = $statement->fetch();
    return $result[$campo];
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage();
    }
}





}



 ?>