<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar</h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">




<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>CODIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="11" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc" id=""  required="" class="form-control" maxlength="11" onchange="Mayusculas(this)">
</div>
</div>

<div class="col-md-4">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id=""  required="" class="form-control" maxlength="8" onchange="Mayusculas(this)">
</div>
</div>
</div>







<div class="row">
<div class="col-md-12">
<div class="form-group">
<label>RAZON SOCIAL</label>
<input type="text" name="razon_social" id=""  required="" class="form-control" 
 onchange="Mayusculas(this)">
</div>
</div>

</div>




<div class="form-group">
<label>DIRECCIÓN 1</label>
<input type="text" name="direccion1" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>DIRECCIÓN 2</label>
<input type="text" name="direccion2" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="form-group">
<label>REPRESENTANTE</label>
<input type="text" name="contacto" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id=""  required="" class="form-control" maxlength="9" onchange="Mayusculas(this)">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="text" name="correo" id=""  required="" class="form-control" maxlength="40" >
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CUENTA SOLES</label>
<input type="number" name="cuenta_soles" min="0" id="" required="" class="form-control">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CUENTA DOLARES</label>
<input type="number" name="cuenta_dolares" min="0" id="" required="" class="form-control">
</div>
</div>
</div>

<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" class="form-control" rows="3" required="" maxlength="60" onchange="Mayusculas(this)"></textarea>
</div>






  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->