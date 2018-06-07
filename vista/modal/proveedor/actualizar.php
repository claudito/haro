<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];   

$objeto   =  new Proveedor();

$carpeta  =  "proveedor";

 ?>

<?php if (count($objeto->consulta($id,'id'))>0): ?>

<form role="form" id="actualizar" autocomplete="off">

<input type="hidden" name="id" value="<?php echo $id; ?>">

<div class="row">
<div class="col-md-4">
<div class="form-group">
<label>CÓDIGO</label>
<input type="text" name="codigo" id=""  required="" class="form-control" maxlength="20" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'codigo'); ?>" readonly>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>RUC</label>
<input type="text" name="ruc" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'ruc'); ?>">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label>DNI</label>
<input type="text" name="dni" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'dni'); ?>">
</div>
</div>
</div>






<div class="form-group">
<label>RAZÓN SOCIAL</label>
<input type="text" name="razon_social" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'razon_social'); ?>">
</div>


<div class="form-group">
<label>CONTACTO</label>
<input type="text" name="contacto" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'contacto'); ?>">
</div>



<div class="form-group">
<label>DIRECCIÓN 1</label>
<input type="text" name="direccion1" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'direccion1'); ?>">
</div>

<div class="form-group">
<label>DIRECCIÓN 2</label>
<input type="text" name="direccion2" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'direccion2'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TELÉFONO</label>
<input type="text" name="telefono" id=""  required="" class="form-control" maxlength="100" 
 onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'telefono'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CORREO</label>
<input type="text" name="correo" id=""  required="" class="form-control" maxlength="300" 
  value="<?php echo $objeto->consulta($id,'correo'); ?>">
</div>
</div>
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>CUENTA SOLES</label>
<input type="number" name="cuenta_soles" id="" class="form-control" required="" value="<?php echo $objeto->consulta($id,'cuenta_soles'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>CUENTA DÓLARES</label>
<input type="number" name="cuenta_dolares" id="" class="form-control" required="" value="<?php echo $objeto->consulta($id,'cuenta_dolares'); ?>">
</div>
</div>
</div>


<div class="form-group">
<label>COMENTARIO</label>
<textarea name="comentario" id="" class="form-control" rows="3" required="" onchange="Mayusculas(this)">
  <?php echo $objeto->consulta($id,'comentario') ?>
</textarea>
</div>







<button class="btn btn-primary">Actualizar</button>

</form>

<script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#mensaje").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#mensaje").html(datos);
         //$("#actualizar")[0].reset();  //resetear inputs
          $('#editModal').modal('hide'); //ocultar modal
          $('body').removeClass('modal-open');
          $("body").removeAttr("style");
          $('.modal-backdrop').remove();
          loadTabla(1);
          }
      });
  });
</script>


<?php else: ?>
<p class="alert alert-warning">No hay información disponible.</p>
<?php endif ?>