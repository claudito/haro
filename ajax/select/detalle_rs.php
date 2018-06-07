<?php 

include'../../autoload.php';
include'../../session.php';
$puesto = $_POST['elegido'];

 ?>



<div class="col-md-6">
<div class="form-group">
<label>DETALLE</label>
<select name="id_detalle"  id="id_detalle"  class="form-control" required>
<option value="">[Seleccionar]</option>
<?php foreach (Comovd::detalle_rq($puesto,'RS') as $key => $value): ?>
<option value="<?php echo $value['id']; ?>"><?php echo $value['descripcion'].' - '.$value['unidad'].' - '.round($value['cantidad'],2); ?></option>
<?php endforeach ?>
</select>
</div>
</div>