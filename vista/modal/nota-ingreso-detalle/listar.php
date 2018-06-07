<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];

$movalmcab_salida =  new Movalmcab_salida();
$movalmdet_salida =  new Movalmdet_salida();
$folder  =  "nota-ingreso-detalle";
 ?>

<?php if (count($movalmcab_salida->consulta($numero,'numero','NI'))>0): ?>
  


<!-- Botón Registrar -->
<div class="pull-right">



<a data-toggle="modal" href="#modal-importar" class="btn btn-warning"><i class="fa fa-plus"></i>Importar detalle O/C</a>
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro</a>

</div>

<?php endif ?>



 <?php if (count($movalmdet_salida->lista($numero,'NI'))>0): ?>

 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">DETALLE</h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 		<table class="table table-condensed table-bordered">
 			<thead>
 				<tr class="info">
          <th>ITEM</th>
      
 					<th>CÓDIGO</th>
 					<th>DESCRIPCIÓN</th>
 					<th>UNIDAD</th>
 					<th>CANTIDAD</th>
 					<th>COSTO</th>
          <th>FECHA</th>
       
        
 					<th style="text-align: center;">ACCIONES</th>
 				</tr>
 			</thead>
 			<tbody>
 			<?php foreach ($movalmdet_salida->lista($numero,'NI') as $key => $value): ?>
			<tr>
			<td><?php echo $value['item']; ?></td>
  
			<td><?php echo $value['codigo_articulo']; ?></td>
			<td><?php echo $value['descripcion_articulo']; ?></td>
			<td><?php echo $value['unidad']; ?></td>
			<td><?php echo round($value['cantidad'],2); ?></td>
			<td><?php echo round($value['costo']); ?></td>
      <td><?php echo date_format(date_create($value['fecha_inicio']),'Y/m/d'); ?></td>

	
      
			<td style="text-align: center;">
			 <a data-id="<?php echo $value['id'];?>"  class="btn btn-edit btn-sm btn-info"><i class="glyphicon glyphicon-edit"></i></a>
		<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#dataDelete" data-id="<?php echo $value['id']; ?>"><i class="glyphicon glyphicon-trash"></i></button>
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