<!-- Modal -->
  <div class="modal fade" id="newModal2" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post"  id="agregar2" autocomplete="off">

<div class="row">
<div class="col-md-6">
<div class="form-group">

<label>CATEGORIA</label>
<input type="text" name="categoria" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<div class="col-md-6">
<div class="form-group">
<label>NOMBRE</label>
<input type="text" name="nombre" id="" value="" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
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