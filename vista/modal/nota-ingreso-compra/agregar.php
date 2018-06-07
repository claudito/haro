
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title" id="correlativo">Cargando...</h3>
  </div>
  <div class="panel-body">


<div class="form-inline">
<div class="form-group">
<select  id="id_oc" class="form-control" required>
<option value="">[ Seleccionar]</option>
<?php 
$comovc = new Comovc();
foreach ($comovc->lista_nav('OC') as $key => $value): ?>
<option value="<?php echo $value['numero']; ?>">#<?php echo $value['numero'].' - '.$value['centro_costo'] ?></option> 
<?php endforeach ?>
</select>
</div>
</div>


  </div>
</div>
