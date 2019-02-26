<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];
$numero   =  $_GET['numero'];
$requisd  =  new Requisd();
$carpeta  =  "rq-detalle";


?>

<form id="actualizar" autocomplete="off">
 	
<div class="row">
<div class="col-md-4">
 <div class="form-group">
<input type="text" name="codigo" class="form-control" value="<?php echo $requisd->consulta($id,'codigo_articulo','RQ'); ?>" readonly>
</div>
 
</div>
<div class="col-md-8">
 <div class="form-group">
<input type="text" class="form-control" value="<?php echo $requisd->consulta($id,'descripcion_articulo','RQ'); ?>" readonly>
</div>
 
</div>
</div>








<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="centro_costo" id="" class="form-control" required="">
<option value="<?php echo $requisd->consulta($id,'codigo_cc','RQ') ?>"><?php echo $requisd->consulta($id,'centro_costo','RQ') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($requisd->consulta($id,'centro_costo','RQ')!==$value['id']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($requisd->consulta($id,'cantidad','RQ'),2); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario"  rows="4" class="form-control" required=""><?php echo $requisd->consulta($id,'comentario','RQ'); ?></textarea>
</div>


<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">


<button type="submit" class="btn btn-primary">Actualizar</button>


 </form>

<script>
$("#actualizar").submit(function(e){

parametros  = $(this).serialize();

$.ajax({

url:"../controlador/rq-detalle/actualizar.php",
type:"POST",
data:parametros,
beforeSend:function()
{

$("#mensaje").html("Mensaje: Cargando...");

},
success:function(datos)
{

$("#mensaje").html(datos);
$('body').removeClass('modal-open');
$("body").removeAttr("style");
$('.modal-backdrop').remove();
loadTabla(1,<?= $numero ?>);



}




});


e.preventDefault();     
});
</script>