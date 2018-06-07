<?php 

include'../../autoload.php';
include'../../session.php';
$puesto = $_POST['elegido'];

 ?>


 


<script>
$(document).ready(function() {
// Parametros para el combo
$("#id_detalle").change(function () {
$("#id_detalle option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/actualizar_saldo.php", { elegido: elegido }, function(data){
$("#id_saldo").html(data);
});     
});
});    
});

</script>
  



<div class="col-md-4">
<div class="form-group">
<label>DETALLE</label>
<select name="numero_detalle"  id="id_detalle"  class="form-control" required>
<option value="">[Seleccionar]</option>
<?php foreach (Comovd::concepto($puesto) as $key => $value): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion'].' - '.round($value['cantidad'],2).' - '.$value['unidad']; ?></option>
<?php endforeach ?>
</select>
</div>
</div>

<div id="id_saldo"></div>






