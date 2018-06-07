<!-- Modal -->
  <div class="modal fade" id="newModal3" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post"  id="agregar3" autocomplete="off">

<div class="row">
<div class="col-md-6">
<div class="form-group">

<label>KILOMETRAJE</label>
<input type="number" step="any" min="0" name="kilometraje" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<div class="col-md-6">
<div class="form-group">
<label>HOROMETRO</label>
<input type="number" step="any" min="0" name="horometro" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">

</div>
</div>
</div>



<div class="row">
<div class="col-md-6">
<div class="form-group">

<label>FECHA</label>
<input type="date" name="fecha" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<div class="col-md-6">
<div class="form-group">
<label>TIPO</label><br>
 
<label class="radio-inline">
  <input type="radio" name="tipo" id="inlineRadio1" onchange="Mayusculas(this)" value="inicio"> INICIO
</label>
<label class="radio-inline">
  <input type="radio" name="tipo" id="inlineRadio2" onchange="Mayusculas(this)" value="fin"> FIN
</label>

 
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