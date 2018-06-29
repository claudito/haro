<?php 
   
include'../../autoload.php';

$id     =  $_POST['elegido'];

$codigo =  Articulo::consulta($id,'codigo');

$stock  =  Stock::consulta1($codigo,'cantidad','01');

 ?>

<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD</label>
<input type="number" step="any" name="cantidad"  class="form-control" required="" min="0.01" max="<?php echo $stock ?>">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label>STOCK</label>
<input  readonly name="cantidades"  class="form-control" required="" value="<?php echo Stock::consulta1($codigo,'cantidad','01') ;?> ">
</div>
</div>

