<?php 

include'../../autoload.php';
include'../../session.php';



 $id     =  $_POST['elegido'];

 $codigo =  Requisd::consulta($id,'saldo','RS');


 ?>
 
<?php if (count(Comovd::lista_validar($id,'RS'))>0): ?>
<div class="col-md-2">
<div class="form-group">
<label>CANTIDAD</label>

<input type="number" step="any" name="cantidad" id="cantidad"  required="" class="form-control" 
 max="<?php echo $codigo ?>" min="0.01">

</div>
</div>

<div class="col-md-2">
<div class="form-group">
<label>C. MAX</label>

<input type="number" step="any" name="cantidad2" id="saldo"  readonly class="form-control" 
value="<?php echo round($codigo) ?>" "
 >

</div>
</div>

 <?php else: ?>
 	<div class="col-md-4">
<div class="form-group">
<p class="alert alert-warning" class="form-control">El saldo esta en 0 Busque otra Opción</p>
</div>
</div>
<?php endif ?>

