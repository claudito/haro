<?php 

class Movalmcab
{

protected $numero;
protected $alm;
protected $tran;
protected $id_usuario;
protected $fecha_inicio;
protected $comentario;
protected $centro_costo;
protected $area;
protected $tipo;
protected $moneda;



function __construct($numero='',$alm='',$tran='',$id_usuario='',$fecha_inicio='',$comentario='',$centro_costo='',$area='',$tipo='',$moneda='')
{
   $this->numero        =  $numero;
   $this->alm           =  $alm;
   $this->tran          =  $tran;
   $this->id_usuario    =  $id_usuario;
   $this->fecha_inicio  =  $fecha_inicio;
   $this->comentario    =  $comentario;
   $this->centro_costo  =  $centro_costo;
   $this->area          =  $area;
   $this->tipo          =  $tipo;
   $this->moneda        =  $moneda;
   
}

public function agregar()
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "SELECT * FROM movalmcab WHERE numero=:numero AND tipo=:tipo";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->execute();
    $result   = $statement->fetchAll();
    
    if (count($result) >0)
    {
     return "existe";
    } 
    else 
    {
     $query     = "INSERT INTO movalmcab(numero,alm,tran,id_usuario,fecha_inicio,comentario,centro_costo,area,tipo,moneda) 
     VALUES (:numero,:alm,:tran,:id_usuario,:fecha_inicio,:comentario,:centro_costo,:area,:tipo,:moneda)";
    
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':alm',$this->alm);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':moneda',$this->moneda);
    
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
       
   }
    catch (Exception $e) 
   {
      echo "ERROR: " . $e->getMessage();
   
   }
}




public function eliminar_cab($numero)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM movalmcab WHERE numero=:numero";
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$numero);
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

public function eliminar_det($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM movalmdet WHERE numero=:id AND tipo='NS'";
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


public function eliminar_det_stock($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM stock WHERE numero=:id AND tipo='NS'";
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
    $query     = "UPDATE  movalmcab  SET  tran=:tran,fecha_inicio=:fecha_inicio,comentario=:comentario,centro_costo=:centro_costo,area=:area,moneda=:moneda WHERE  numero=:id AND tipo=:tipo";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':moneda',$this->moneda);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':tipo',$this->tipo);
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
function lista($tipo)
{
   
  try {

  $modelo    = new Conexion(); 
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT m.moneda,m.id, m.numero, m.alm, t.codigo as tipo_transaccion, t.descripcion as transaccion, 
concat(u.nombres,' ',u.apellidos) as usuario, m.fecha_inicio,
m.comentario, c.codigo as codigo_cc, c.descripcion as centro_costo, a.id as id_area, a.codigo as codigo_area, a.descripcion as area, m.tipo, m.estado
from movalmcab as m
left join transacciones_mov as t on m.tran = t.codigo
left join usuario as u on m.id_usuario = u.id
left join centro_costo as c on m.centro_costo = c.codigo
left join area as a on m.area = a.id WHERE m.tipo = :tipo";
  $statement = $conexion->prepare($query);
  $statement->bindParam(':tipo',$tipo);
  $statement->execute();
  $result = $statement->fetchAll();
  return $result;
  } catch (Exception $e) {
  echo "ERROR: " . $e->getMessage();
  }


}

public function consulta($id,$campo,$tipo)
{
    try {
        
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
    $query     = "
SELECT m.doc_oc,m.moneda,m.id, m.numero, m.alm, t.codigo as tipo_transaccion, t.descripcion as transaccion,
concat(u.nombres,' ',u.apellidos) as usuario, p.id as id_proveedor, p.contacto as proveedor, m.fecha_inicio,
m.comentario, c.codigo as codigo_cc, c.descripcion as centro_costo,  a.id as id_area, a.codigo as codigo_area, a.descripcion as area, m.tipo, m.estado
from movalmcab as m
left join transacciones_mov as t on m.tran = t.codigo
left join usuario as u on m.id_usuario = u.id
left join proveedor as p on m.id_proveedor = p.id
left join centro_costo as c on m.centro_costo = c.codigo
left join area as a on m.area = a.id  WHERE m.numero=:id AND m.tipo=:tipo";
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