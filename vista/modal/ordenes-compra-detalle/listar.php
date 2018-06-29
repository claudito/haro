<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$movalmcab_salida =  new Comovc();
$movalmdet_salida =  new Comovd();
$folder  =  "ordenes-compra-detalle";
 ?>

<?php if (count($movalmcab_salida->consulta($numero,'numero','OC'))>0): ?>




<!-- Botón Registrar -->
<div class="pull-right">


<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro Desde Requerimientos</a>

</div>

<?php endif ?>



 <?php if (count($movalmdet_salida->lista($numero,'OC'))>0): ?>

 <div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">DETALLE</h3>
  </div>
  <div class="panel-body">
  <div class="table-responsive">
   <table id="consulta1" class="table table-condensed table-bordered">
      <thead> 
        <tr class="info">
          <th style="text-align: center;">ITEM</th>   
          <th style="text-align: center;">REQUERIMIENTO</th>
          <th style="text-align: center;">CÓDIGO</th>
          <th style="text-align: center;">DESCRIPCIÓN</th>
          <th style="text-align: center;">UNIDAD</th>
          <th style="text-align: center;">CANTIDAD</th>
          <th style="text-align: center;">SALDO</th>
          <th style="text-align: center;">C.C.</th>
          <th style="text-align: center;">PRECIO</th>
  
          <th style="text-align: center;">ACCIONES</th>
        </tr>
      </thead>
      <tbody>
        
      <?php 
      $item=1;
      foreach ($movalmdet_salida->lista($numero,'OC') as $key => $value): 
       
        ?>

      <tr>
        <td><?php echo $item++; ?></td>
      
      <td style="text-align: center;"><?php echo $value['numero_rq']; ?></td>
      <td style="text-align: center;"><?php echo $value['codigo']; ?></td>
      <td style="text-align: center;"><?php echo $value['descripcion']; ?></td>
      <td style="text-align: center;"><?php echo $value['unidad']; ?></td>
      <td style="text-align: center;"><?php echo round($value['cantidad'],2); ?></td>
      <td style="text-align: center;"><?php echo round($value['saldo'],2); ?></td>
      <td style="text-align: center;"><?php echo round($value['centro_costo'],2); ?></td>
      <td style="text-align: center;"><?php echo round($value['precio'],2); ?></td>
      <td style="text-align: center;">
       <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
    
      </td>
      </tr>
      <?php endforeach ?>
      </tbody>
    </table>
  </div>
  </div>
 </div>
   <!-- Modal  Actualizar-->
  <script>
    $(".btn-edit").click(function(){
      id = $(this).data("id");
      $.get("../vista/modal/<?php echo $folder; ?>/actualizar.php","id="+id,function(data){
        $("#form-edit").html(data);
      });
      $('#editModal').modal('show');
    });
  </script>
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Actualizar</h4>
        </div>
        <div class="modal-body">
        <div id="form-edit"></div>
        </div>

      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal  Actualizar-->
 <?php else: ?>
 <p class="alert alert-warning">No hay registros Disponibles.</p>
 <?php endif ?>
 <script>
$(document).ready(function() {
  $('#consulta1').DataTable( {
    dom: 'Bfrtip',
    buttons: [
      /*'copyHtml5',*/
      'excelHtml5',
      /*'csvHtml5',*/
      //'pdfHtml5'
    ]
  } );
} );
</script>