
<?php 

include'../../autoload.php';
include'../../session.php';
$puesto = $_POST['elegido'];


 ?>


  
<?php if (count(Comovd::lista4($puesto))>0): ?>

<div class="col-md-4">
<div class="form-group">
<label>SALDO</label>
<!--<input type="number" step="any" name="saldo" id="saldo" class="form-control">-->
<input type="number" step="any" name="saldo" id="saldo"  required="" class="form-control" 
 value="<?php echo round(Comovd::lista3($puesto,'saldo'),2) ?>">

</div>
</div>

<input type="hidden" step="any" name="saldo2" id="saldo2"  required="" class="form-control" 
 value="<?php echo Comovd::lista3($puesto,'saldo') ?>">

 <?php else: ?>
 	<div class="col-md-4">
<div class="form-group">
<p class="alert alert-warning" class="form-control">El saldo esta en 0 Busque otra Opción</p>
</div>
</div>
<?php endif ?>