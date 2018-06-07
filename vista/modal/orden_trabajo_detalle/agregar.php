<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post"  id="agregar" autocomplete="off">


<div class="form-group">
<label>DESCRIPCIÓN</label>
<textarea name="descripcion" id="" rows="3" class="form-control" onchange="Mayusculas(this)"></textarea>
</div>





<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIEMPO ESTIMADO</label>
<input type="time" name="estimado" class="form-control" value="" step="any" required="">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>TIEMPO REAL</label>
<input type="time" name="t_real" class="form-control" value="" step="any" min="0" required="">
</div>
</div>
</div>

<div class="form-group">
<label>SOLUCIONADO</label><br>
 
<label class="radio-inline">
  <input type="radio" name="solucionado" id="inlineRadio1" onchange="Mayusculas(this)" value="SI"> SI
</label>
<label class="radio-inline">
  <input type="radio" name="solucionado" id="inlineRadio2" onchange="Mayusculas(this)" value="NO"> NO
</label>

 
</div>


<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $_GET['codigo']; ?>">


<button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->