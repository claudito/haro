<?php 
  
include'../../../autoload.php';
include'../../../session.php';

$id                 =  $_GET['id'];
$objeto             =  new Materiales_utilizados();
$carpeta            =  "orden_trabajo_detalle";

?>

<form id="actualizar" autocomplete="off">
 
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CODIGO</label>
<select name="codigo" id="" class="form-control">
<option value="<?php echo $objeto->consulta($id,'codigo') ?>"><?php echo $objeto->consulta($id,'codigo')?></option>
<?php 
$material = new Articulo();
foreach ($material->lista_ubicacion() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo']. '-' .$value['descripcion'] ?></option>
<?php endif ?> 
<?php endforeach ?>
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>DESCRIPCION</label>
<textarea name="descripcion" rows="4" class="form-control" required="" onchange="Mayusculas(this)">
  <?php echo $objeto->consulta($id,'descripcion'); ?></textarea>

</div>
</div>
</div>


<div class="row">
<div class="col-md-4">
<div class="form-group">

<label>CANT. REQUERIDA</label>
<input type="number" step="any" name="requerida" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo round($objeto->consulta($id,'requerida'),2); ?>">
</div>
</div>

<div class="col-md-4">
<div class="form-group">

<label>CANT. UTILIZADA</label>
<input type="number" step="any" name="utilizada" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo round($objeto->consulta($id,'utilizada'),2); ?>">
</div>
</div>




<div class="col-md-4">
<div class="form-group">
<label>UNIDAD DE MEDIDA</label>
<select name="unidad" id="" class="form-control" required="">
<option value="<?php echo $objeto->consulta($id,'unidad_medida'); ?>"><?php echo $objeto->consulta($id,'unidad_medida') ?></option>
<?php 
$codigo = new Unidad();
foreach ($codigo->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'unidad_medida')!==$value['unidad_medida']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>


</div>
<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">


<button type="submit" class="btn btn-primary">Actualizar</button>


 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar1.php",
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
          loadTabla(1,<?php echo $objeto->consulta($id,'numero'); ?>);
          }
      });
  });
</script>