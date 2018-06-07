<?php 
  
include'../../../autoload.php';
include'../../../session.php';

$id                 =  $_GET['id'];
$objeto             =  new Control_ot();
$carpeta            =  "orden_trabajo_detalle";

?>

<form id="actualizar" autocomplete="off">
 



<div class="row">
<div class="col-md-6">
<div class="form-group">


<label>KILOMETRAJE</label>
<input type="number" step="any" min="0" name="kilometraje" id="" value="<?php echo round($objeto->consulta($id,'kilometraje'),2); ?>" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">
</div>
</div>



<div class="col-md-6">
<div class="form-group">
<label>HOROMETRO</label>
<input type="number" step="any" min="0" name="horometro" id="" value="<?php echo round($objeto->consulta($id,'horometro'),2); ?>" required="" class="form-control" maxlength="100" onchange="Mayusculas(this)">


</div>
</div>
</div>



<div class="form-group">
  <label>TIPO</label><br>
  <?php 

  switch ($objeto->consulta($id,'tipo')) {
    case 'inicio':
     echo '<label class="radio-inline">
          <input type="radio" name="tipo" id="inlineRadio1" value="inicio" checked> INICIO
          </label>
          <label class="radio-inline">
          <input type="radio" name="tipo" id="inlineRadio2" value="fin"> FIN
          </label>
         ';
 break;
 case 'fin':
     echo '<label class="radio-inline">
          <input type="radio" name="tipo" id="inlineRadio1" value="inicio"> INICIO
          </label>
          <label class="radio-inline">
          <input type="radio" name="tipo" id="inlineRadio2" value="fin" checked> FIN
          </label>
          ';
 break;
 
    
    default:
echo "no existe";
      break;
  }

   ?>
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
          url: "../controlador/<?php echo $carpeta; ?>/actualizar3.php",
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