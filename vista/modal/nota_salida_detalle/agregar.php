<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idcodigo").change(function () {
$("#idcodigo option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/select/cant_stock.php", { elegido: elegido }, function(data){
$("#cant_stock").html(data);
});     
});
});    
});
</script>

<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">




<div class="row">
<div class="col-md-3">
<div class="form-group">
<label>ALMACÉN</label>
<input type="text" name="alm" id="" value="01" class="form-control" readonly="" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<!--

<div class="col-md-9">
<div class="form-group">
<label>CÓDIGO</label>
<select name="codigo" id="idcodigo" class="demo-default" required="" >
<option value="">[Seleccionar]</option>
<?php /*
$articulo  =  new Articulo();
foreach ($articulo->lista() as $key => $value): ?>
<?php if ($value['codigotipo']!=='S'): ?>
  <option value="<?php echo $value['id']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach */ ?>
</select>
 <script >
$('#idcodigo').selectize({
maxItems: 1
});
</script>
</div>
</div>
-->


<div class="col-md-9">
<div class="form-group">
<label>CÓDIGO</label>
<select name="codigo" id="idcodigo" class="demo-default" required="" >
<option value="">[Seleccionar]</option>
<?php 
$articulo  =  new Stock();
foreach ($articulo->lista() as $key => $value): ?>
<?php if ($value['id']): ?>
  <option value="<?php echo $value['id']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endif ?>
<?php endforeach  ?>
</select>
 <script >
$('#idcodigo').selectize({
maxItems: 1
});
</script>
</div>
</div>


</div>









<div class="row">
<div id="cant_stock"></div>


</div>



<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $_GET['codigo']; ?>">


<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->