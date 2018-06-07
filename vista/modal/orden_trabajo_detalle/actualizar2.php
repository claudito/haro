<?php 
  
include'../../../autoload.php';
include'../../../session.php';

$id                 =  $_GET['id'];
$objeto             =  new Personal_trabajos();
$carpeta            =  "orden_trabajo_detalle";

?>

<form id="actualizar" autocomplete="off">
 



<div class="row">
<div class="col-md-6">
<div class="form-group">

<label>CATEGORIA</label>
<input type="text"  name="categoria" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'categoria'); ?>">
</div>
</div>


<div class="col-md-6">
<div class="form-group">

<label>NOMBRE</label>
<input type="text"  name="nombre" id=""  required="" class="form-control" maxlength="100" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'nombre'); ?>">
</div>
</div>
</div>



<input type="hidden"  name="idnumero"  id="idnumero"  value="<?php echo $id; ?>">


<button type="submit" class="btn btn-primary">Actualizar</button>


 </form>

 <script>
    $("#actualizar").submit(function(e){
    e.preventDefault();
    var parametros = $(this).serialize();
     $.ajax({
          type: "POST",
          url: "../controlador/<?php echo $carpeta; ?>/actualizar2.php",
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
          loadTabla(1,<?php echo $objeto->consulta($id,'numero'); ?>);
          }
      });
  });
</script>