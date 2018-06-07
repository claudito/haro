<!-- Modal -->
  <div class="modal fade" id="modal-importar" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar desde Orden de Compra</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar1" autocomplete="off">

<div class="row">
<div class="col-md-4">
<div class="form-group">
  <label >N° ORDEN DE COMPRA</label>
<select name="numero_oc" id="id_orden" class="form-control" required="">
<option value="">[ Seleccionar ]</option>
<?php foreach (Comovd::lista_ordenes_cab('RQ') as $key => $value): ?>
<option value="<?php echo $value['numero'];?>"><?php echo $value['numero'] ?></option>
<?php endforeach ?>
</select>

 
</div>
</div>
<div id="id_concepto_pago"></div>
</div>




<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $_GET['codigo']; ?>">


<button  type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->