<?php 

include'../../../autoload.php';
include'../../../session.php';

$id       =  $_GET['id'];
$objeto   =  new Tarea_ejecutar();

$carpeta  =  "tarea-ejecutar";

?>

<form id="actualizar" autocomplete="off">

<input type="hidden" name="id" " value="<?php echo $id; ?>"> 

<div class="form-group">
<label>DESCRIPCIÓN</label>
<input type="text" name="descripcion" id="" class="form-control" required="" onchange="Mayusculas(this)" value="<?php echo $objeto->consulta($id,'descripcion'); ?>">
</div>

<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>TIEMPO ESTIMADO</label>
<input type="time" name="tiempo_estimado" id="" class="form-control" required="" value="<?php echo date_format(date_create($objeto->consulta($id,'t_estimado')),'H:i'); ?>">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>TIEMPO REAL</label>
<input type="time" name="tiempo_real" id="" class="form-control" required="" value="<?php echo date_format(date_create($objeto->consulta($id,'t_real')),'H:i'); ?>">
</div>
</div>
</div>

<div class="form-group">
<label>SOLUCIONADO</label><br>
<?php 
switch ($objeto->consulta($id,'solucion')) {
  case 'S':
    echo '<label class="radio-inline">
          <input type="radio" name="solucion" id="inlineRadio1" value="S" checked> SI
          </label>
          <label class="radio-inline">
          <input type="radio" name="solucion" id="inlineRadio2" value="N"> NO
          </label>';
    break;

    case 'N':
      echo '<label class="radio-inline">
          <input type="radio" name="solucion" id="inlineRadio1" value="S"> SI
          </label>
          <label class="radio-inline">
          <input type="radio" name="solucion" id="inlineRadio2" value="N" checked> NO
          </label>';
    break;

  default:
      echo "no existe";
    break;
}
?>
</div>

<input type="hidden"  name="id"  id="id"  value="<?php echo $id; ?>">

<button type="submit" class="btn btn-primary">Actualizar</button>


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
          loadTabla(1,<?php echo $objeto->consulta($id,'id'); ?>);
          }
      });
  });
</script>