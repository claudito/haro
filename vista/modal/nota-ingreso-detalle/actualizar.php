<?php 

include'../../../autoload.php';
include'../../../session.php';

$id                 =  $_GET['id'];
$movalmdet_salida   =  new Movalmdet_salida();
$carpeta            =  "nota-ingreso-detalle";

?>

<form id="actualizar" autocomplete="off">
 
<div class="row">


<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad" id="" class="form-control"  required="" min="0.00" 
 value="<?php echo round($movalmdet_salida->consulta($id,'cantidad','NI'),2); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>PRECIO</label>
<input type="number" step="any" name="costo" id="" class="form-control" required="" min="0.00" 
 value="<?php echo round($movalmdet_salida->consulta($id,'costo','NI'),2); ?>">
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
          loadTabla(1,<?php echo $movalmdet_salida->consulta($id,'numero'); ?>);
          }
      });
  });
</script>