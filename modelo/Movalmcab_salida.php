<?php 

class Movalmcab_salida
{

protected $numero;
protected $alm;
protected $tran;
protected $doc_ref;
protected $num_ref;
protected $doc_oc;
protected $id_usuario;
protected $id_proveedor;
protected $fecha_inicio;
protected $fecha_fin;
protected $comentario;
protected $centro_costo;
protected $ot;
protected $area;
protected $tipo;
protected $estado;
protected $moneda;


function __construct($numero='',$alm='',$tran='',$doc_ref='',$num_ref='',$doc_oc='',$id_usuario='',$id_proveedor='',$fecha_inicio='',$fecha_fin='',$comentario='',$centro_costo='',$ot='',$area='',$tipo='',$estado='',$moneda='')
{
   $this->numero            =  $numero;
   $this->alm               =  $alm;
   $this->tran              =  $tran;
   $this->doc_ref           =  $doc_ref;
   $this->num_ref           =  $num_ref;
   $this->doc_oc            =  $doc_oc;
   $this->id_usuario        =  $id_usuario;
   $this->id_proveedor      =  $id_proveedor;
   $this->fecha_inicio      =  $fecha_inicio;
   $this->fecha_fin         =  $fecha_fin;
   $this->comentario        =  $comentario;
   $this->centro_costo      =  $centro_costo;
   $this->ot                =  $ot;
   $this->area              =  $area;
   $this->tipo              =  $tipo;
   $this->estado            =  $estado;
   $this->moneda            =  $moneda;
   
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
     $query     = "INSERT INTO movalmcab(numero,alm,tran,doc_ref,num_ref,doc_oc,id_usuario,id_proveedor,fecha_inicio,comentario,centro_costo,area,tipo,moneda) 
     VALUES (:numero,:alm,:tran,:doc_ref,:num_ref,:doc_oc,:id_usuario,:id_proveedor,:fecha_inicio,:comentario,:centro_costo,:area,:tipo,:moneda)";
    
    $statement = $conexion->prepare($query);
    $statement->bindParam(':numero',$this->numero);
    $statement->bindParam(':alm',$this->alm);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':doc_ref',$this->doc_ref);
    $statement->bindParam(':num_ref',$this->num_ref);
    $statement->bindParam(':doc_oc',$this->doc_oc);
    $statement->bindParam(':id_usuario',$this->id_usuario);
    $statement->bindParam(':id_proveedor',$this->id_proveedor);
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

public function eliminar($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM movalmcab WHERE numero=:id";
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

public function eliminar_det($id)
{
   try {
    $modelo    = new Conexion();
    $conexion  = $modelo->get_conexion();
     $query     = "DELETE FROM movalmdet WHERE numero=:id AND tipo='NI'";
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
     $query     = "DELETE FROM stock WHERE numero=:id AND tipo='NI'";
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
    $query     = "UPDATE  movalmcab  SET  tran=:tran,doc_ref=:doc_ref,num_ref=:num_ref,id_proveedor=:id_proveedor,fecha_inicio=:fecha_inicio,comentario=:comentario,centro_costo=:centro_costo,area=:area,estado=:estado,moneda=:moneda WHERE  numero=:id AND tipo=:tipo";

    $statement = $conexion->prepare($query);
    $statement->bindParam(':tran',$this->tran);
    $statement->bindParam(':doc_ref',$this->doc_ref);
    $statement->bindParam(':num_ref',$this->num_ref);
    $statement->bindParam(':id_proveedor',$this->id_proveedor);
    $statement->bindParam(':fecha_inicio',$this->fecha_inicio);
  
    $statement->bindParam(':comentario',$this->comentario);
    $statement->bindParam(':centro_costo',$this->centro_costo);
   
    $statement->bindParam(':area',$this->area);
    $statement->bindParam(':tipo',$this->tipo);
    $statement->bindParam(':estado',$this->estado);
    $statement->bindParam(':moneda',$this->moneda);
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





function lista($tipo)
{
   
  try {

  $modelo    = new Conexion(); 
  $conexion  = $modelo->get_conexion();
  $query     = "SELECT m.moneda,m.id, m.numero, m.alm, t.codigo as tipo_transaccion, t.descripcion as transaccion, d.codigo as tipo_documento, d.descripcion as documento, m.num_ref,
concat(u.nombres,' ',u.apellidos) as usuario, p.id as id_proveedor, p.contacto as proveedor, m.fecha_inicio, m.fecha_fin,
m.comentario, c.codigo as codigo_cc, c.descripcion as centro_costo, o.codigo as codigo_ot, a.id as id_area, a.codigo as codigo_area, a.descripcion as area, m.tipo, m.estado
from movalmcab as m
left join transacciones_mov as t on m.tran = t.codigo
left join tipo_doc as d on m.doc_ref = d.codigo
left join usuario as u on m.id_usuario = u.id
left join proveedor as p on m.id_proveedor = p.id
left join centro_costo as c on m.centro_costo = c.codigo
left join ord_fab as o on m.ot = o.codigo
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
    $query     = "SELECT m.doc_oc,m.moneda,m.id, m.numero, m.alm, t.codigo as tipo_transaccion, t.descripcion as transaccion, d.codigo as tipo_documento, d.descripcion as documento, m.num_ref,
concat(u.nombres,' ',u.apellidos) as usuario, p.id as id_proveedor, p.contacto as proveedor, m.fecha_inicio, m.fecha_fin,
m.comentario, c.codigo as codigo_cc, c.descripcion as centro_costo, o.codigo as codigo_ot, a.id as id_area, a.codigo as codigo_area, a.descripcion as area, m.tipo, m.estado
from movalmcab as m
left join transacciones_mov as t on m.tran = t.codigo
left join tipo_doc as d on m.doc_ref = d.codigo
left join usuario as u on m.id_usuario = u.id
left join proveedor as p on m.id_proveedor = p.id
left join centro_costo as c on m.centro_costo = c.codigo
left join ord_fab as o on m.ot = o.codigo
left join area as a on m.area = a.id WHERE m.numero=:id AND m.tipo=:tipo";
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