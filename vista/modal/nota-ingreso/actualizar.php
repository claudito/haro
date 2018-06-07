<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   


$objeto   =  new Movalmcab_salida();

$carpeta  =  "nota-ingreso";

 ?>

<?php if (count($objeto->consulta($id,'id','NI'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="tipo" value="<?php echo $objeto->consulta($id,'tipo','NI'); ?>">

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIPO DE TRANSACCIÓN</label>
<select name="tipo_transaccion" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'tipo_transaccion','NI'); ?>"><?php echo $objeto->consulta($id,'tipo_transaccion','NI').' - '.$objeto->consulta($id,'transaccion','NI') ?></option>
<?php 
$transaccion_tipo = new Transaccion_tipo();
foreach ($transaccion_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'tipo_transaccion','NI')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>TIPO DE DOCUMENTO</label>
<select name="tipo_documento" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'tipo_documento','NI') ?>"><?php echo $objeto->consulta($id,'tipo_documento','NI').' - '.$objeto->consulta($id,'documento','NI') ?></option>
<?php 
$documento_tipo = new Documento_tipo();
foreach ($documento_tipo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'tipo_documento','NI')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'] ?></option>
  
<?php endif ?>
  
<?php endforeach ?>
</select>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>NUMERO DE REFERENCIA</label>
<input type="text" name="num_ref" id=""  class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'num_ref','NI'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>PROVEEDOR</label>
<select name="proveedor" id="" class="form-control" >
<option value="<?php echo $objeto->consulta($id,'id_proveedor','NI') ?>"><?php echo $objeto->consulta($id,'proveedor','NI') ?></option>
<?php 
$proveedor = new Proveedor();
foreach ($proveedor->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_proveedor','NI')!== $value['id']): ?>
<option value="<?php echo $value['id'] ?>"><?php echo $value['contacto'] ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

</div>

<div class="row">

 <div class="col-md-6">
 <div class="form-group">
<label>FECHA DE SALIDA</label>
<input type="date" name="fecha_inicio" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'fecha_inicio','NI'); ?>">
</div> 
</div> 
<div class="col-md-6">
 <div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="codigo_cc" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'codigo_cc','NI'); ?>"><?php echo $objeto->consulta($id,'codigo_cc','NI').' - '.$objeto->consulta($id,'centro_costo','NI') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo_cc','NI')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div> 
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>ÁREA</label>
<select name="area" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'id_area','NI'); ?>"><?php echo $objeto->consulta($id,'codigo_area','NI').' - '.$objeto->consulta($id,'area','NI') ?></option>
<?php 
$area = new Area();
foreach ($area->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'id_area','NI')!==$value['id']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>MONEDA</label>
<select name="moneda" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'moneda','NI'); ?>"><?php echo $objeto->consulta($id,'moneda','NI') ?></option>
<option value="MN">MONEDA NACIONAL</option>
<option value="ME">MONEDA EXTRANJERA</option>
</select>
</div>
</div>
</div>



<div class="form-group">
<label>COMENTARIO</label>
<input type="text" name="comentario" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'comentario','NI'); ?>">
</div>


<div class="form-group">
<label>ESTADO</label><br>
<?php if ($objeto->consulta($id,'estado','NI')=='V'): ?>
   <label class="radio-inline">
    <input type="radio" name="estado"  value="V" checked> ACTIVO
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="F"> INACTIVO
</label> 
<?php else: ?>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="V" > ACTIVO
  </label>
  <label class="radio-inline">
    <input type="radio" name="estado"  value="F" checked> INACTIVO
  </label>
<?php endif ?>
</div>

</div>

<button class="btn btn-primary">Actualizar</button>

</form>
<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>