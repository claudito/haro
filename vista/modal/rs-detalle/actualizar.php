<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];
$requisd  =  new Requisd();
$carpeta  =  "rq-detalle";

?>

<form id="actualizar">
 	
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" class="form-control" value="<?php echo $requisd->consulta($id,'codigo_articulo','RS'); ?>" readonly>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($requisd->consulta($id,'cantidad','RS'),2); ?>">
</div>
</div>

</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CENTRO DE COSTO</label>
<select name="centro_costo" id="" class="form-control" required="">
<option value="<?php echo $requisd->consulta($id,'codigo_cc','RS') ?>"><?php echo $requisd->consulta($id,'centro_costo','RS') ?></option>
<?php 
$centro_costo = new Centro_costo();
foreach ($centro_costo->lista() as $key => $value): ?>
<?php if ($requisd->consulta($id,'centro_costo','RS')!==$value['id']): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach ?>
</select>
</div>
</div>


</div>





<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario"  rows="5" class="form-control" onchange="Mayusculas(this)" ><?php echo Requisd::consulta($id,'comentario','RS'); ?></textarea>
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
          loadTabla(1,<?php echo $requisd->consulta($id,'numero'); ?>);
          }
      });
  });
</script>