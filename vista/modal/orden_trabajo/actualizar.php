<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   


$objeto   =  new Orden_trabajo();

$carpeta  =  "orden_trabajo";

 ?>

<?php if (count($objeto->consulta($id,'numero'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">




<div class="form-group">
<label>MAQUINA</label>
<select name="codigo_maquina" id="" class="form-control">
<option value="<?php echo $objeto->consulta($id,'codigo') ?>"><?php echo $objeto->consulta($id,'codigo') .' '.$objeto->consulta($id,'nombre')?></option>
<?php 
$area = new Maquina();
foreach ($area->lista() as $key => $value): ?>
<?php if ($objeto->consulta($id,'codigo')!==$value['codigo']): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo']. '-' .$value['descripcion'] ?></option>
<?php endif ?> 
<?php endforeach ?>
</select>
</div>


<div class="form-group">
<label>OBSERVACIONES</label>
<textarea name="observaciones"  rows="4" class="form-control" onchange="Mayusculas(this)" ><?php echo Orden_trabajo::consulta($id,'observaciones'); ?></textarea>
</div>

 

<div class="form-group">
<label>DESCIPCION</label>
<textarea name="descripcion"  rows="4" class="form-control" onchange="Mayusculas(this)" ><?php echo Orden_trabajo::consulta($id,'descripcion'); ?></textarea>
</div>


<div class="form-group">
<label>REAPONSABLE FINLIZACIÓN</label>
<input type="text" name="responsable_finalizacion" id="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'responsable_finalizacion'); ?>">
</div>


<button class="btn btn-primary">Actualizar</button>

</form>
<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/orden_trabajo/actualizar.php",
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