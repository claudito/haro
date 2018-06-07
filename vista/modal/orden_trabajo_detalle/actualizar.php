<?php 

include'../../../autoload.php';
include'../../../session.php';

$id                 =  $_GET['id'];
$objeto             =  new Tareas_ejecutar();
$carpeta            =  "orden_trabajo_detalle";

?>

<form id="actualizar" autocomplete="off">
 

<div class="form-group">
<label>DESCRIPCION</label>
<textarea name="descripcion" rows="4" class="form-control" required="" onchange="Mayusculas(this)">
  <?php echo $objeto->consulta($id,'descripcion'); ?></textarea>
</div>



<div class="row">




<div class="col-md-6">
<div class="form-group">
<label>TIEMPO ESTIMADO</label>
<input type="time" name="estimado" class="form-control"  step="any" required="" value="<?php echo $objeto->consulta($id,'estimado'); ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>TIEMPO REAL</label>
<input type="time" name="t_real" class="form-control" step="any" min="0" required=""

value="<?php echo $objeto->consulta($id,'t_real'); ?>">
</div>
</div>
</div>

<div class="form-group">
  <label>SOLUCIONADO</label><br>
  <?php 

  switch ($objeto->consulta($id,'solucionado')) {
    case 'no':
     echo '<label class="radio-inline">
          <input type="radio" name="solucionado" id="inlineRadio1" value="SI" checked> SI
          </label>
          <label class="radio-inline">
          <input type="radio" name="solucionado" id="inlineRadio2" value="NO" checked> NO
          </label>';
 break;
 case 'si':
     echo '<label class="radio-inline">
          <input type="radio" name="solucionado" id="inlineRadio1" value="SI" checked> SI
          </label>
          <label class="radio-inline">
          <input type="radio" name="solucionado" id="inlineRadio2" value="NO" > NO
          </label>';
 break;
 
    
    default:
echo "no existe";
      break;
  }

   ?>
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
          loadTabla(1,<?php echo $objeto->consulta($id,'numero'); ?>);
          }
      });
  });
</script>