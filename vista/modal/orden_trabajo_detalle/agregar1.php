<!-- Modal -->
  <div class="modal fade" id="newModal1" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form"   id="agregar1" autocomplete="off">





<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CÓDIGO</label>
<select name="codigo" required="" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php
$codigo_art = new Articulo();
foreach ($codigo_art->lista_ubicacion() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion'];?></option>
<?php endforeach ?>
</select>
</div>
</div>


<div class="col-md-6">
<div class="form-group">
<label>DESCRIPCIÓN</label>
<textarea name="descripcion" id="" rows="3" class="form-control" onchange="Mayusculas(this)"></textarea>
</div>

</div>
</div>



<div class="row">
<div class="col-md-4">
<div class="form-group">

<label>CANT. REQUERIDA</label>
<input type="number" step="any" name="requerida" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>CANT. UTILIZADA</label>
<input type="number" step="any" name="utilizada" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<div class="col-md-4">
<div class="form-group">
<label>ÚNIDAD DE MEDIDA</label>
<select name="unidad" required="" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php
$codigo_art = new Unidad();
foreach ($codigo_art->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['descripcion'];?></option>
<?php endforeach ?>
</select>
</div>
</div>
</div>





<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $_GET['codigo']; ?>">


<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->