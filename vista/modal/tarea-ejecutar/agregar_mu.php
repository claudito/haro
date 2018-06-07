<!-- Modal -->
  <div class="modal fade" id="newModal1" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar1" autocomplete="off">


<div class="form-group">
<label>CÓDIGO DE ARTICULO</label>
<select name="codigo_articulo" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$articulo = new Articulo();
foreach ($articulo->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>
<?php endforeach ?>
</select>
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD REQUERIDA</label>
<input type="number" name="c_requerida" id="" class="form-control" min="0" step="any" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CANTIDAD UTILIZADA</label>
<input type="number" name="c_utilizada" id="" class="form-control" min="0" step="any" required="">
</div>
</div>
</div>

<div class="form-group">
<label>CÓDIGO DE UNIDAD</label>
<select name="codigo_unidad" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$unidad = new Unidad();
foreach ($unidad->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo']; ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option> 
<?php endforeach ?>
</select>
</div>


<button type="submit" class="btn btn-primary">Agregar</button>
</form>
</div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->