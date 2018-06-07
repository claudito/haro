
<!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" role="dialog" aria-labelledby="newModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="correlativo"></h4>
        </div>
        <div class="modal-body">
<form role="form" method="post" id="agregar" autocomplete="off">

<input type="hidden" name="id_usuario" id="" value="<?php echo $_SESSION[KEY.ID] ?>">

<input type="hidden" name="tipo" id="" class="form-control" value="OT">

<div class="form-group">
<label>MÁQUINA</label>
<select name="codigo_maquina" id="" class="form-control">
<option value="">[Seleccionar]</option>
<?php 
$maquina = new Maquina();
foreach ($maquina->lista() as $key => $value): ?>
<option value="<?php echo $value['codigo'] ?>"><?php echo $value['codigo'].' - '.$value['descripcion']; ?></option>  
<?php endforeach ?>
</select>
</div>

<div class="form-group">
<label>USUARIO</label>
<input type="text" name="usuario" value="<?php echo $_SESSION[KEY.NOMBRES].' '.$_SESSION[KEY.APELLIDOS]; ?>" id="" class="form-control" readonly>
</div>

<div class="form-group">
<label>OBSERVACIONES</label>
<textarea name="observaciones" id="" class="form-control" rows="3" onchange="Mayusculas(this)"></textarea>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>FECHA FINALIZACIÓN</label>
<input type="date" name="fecha_finalizacion" class="form-control" value="" step="any">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>HORA FINALIZACIÓN</label>
<input type="time" name="hora_finalizacion" class="form-control" value="" step="any" min="0" >
</div>
</div>
</div>

<div class="form-group">
<label>DESCRIPCIÓN</label>
<textarea name="descripcion" id="" class="form-control" rows="3" onchange="Mayusculas(this)"></textarea>
</div>


<div class="form-group">
<label>RESPONABLE FINALIZACION</label>
<input type="text" name="responsable_finalizacion" id="" class="form-control" onchange="Mayusculas(this)">
</div>


  <button type="submit" class="btn btn-primary">Agregar</button>
</form>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->