<?php 

include'../../../autoload.php';
include'../../../session.php';

$numero  = $_GET['codigo'];


$material =  new Materiales_utilizados();
$folder  =  "materiales_utilizados";
 ?>

<?php if (count($material->consulta($numero,'numero'))>0): ?>
  
<!-- Botón Registrar -->
<div class="pull-right">
<a data-toggle="modal" href="#newModal" class="btn btn-primary"><i class="fa fa-plus"></i> Agregar Registro</a>
</div>

<?php endif ?>



 <?php if (count($material->lista($numero))>0): ?>

 <div class="panel panel-info">
 	<div class="panel-heading">
 		<h3 class="panel-title">MATERIALES UTILIZADOS</h3>
 	</div>
 	<div class="panel-body">
 	<div class="table-responsive">
 		<table class="table table-condensed table-bordered">
 			<thead>
 				<tr class="info">
          <th>ITEM</th>
          <th>NÙMERO</th> 
 					<th>CÓDIGO</th>
 					<th>DESCRIPCIÓN</th>
 					<th>REQUERIDA</th>
 					<th>UTILIZADA</th>
 					<th>UNIDAD DE MEDIDA</th>
         
 				</tr>
 			</thead>
 			<tbody>
 			<?php foreach ($material->lista($numero) as $key => $value): ?>
			<tr>
			<td><?php echo $item++ ?></td>
      <td><?php echo $value['numero']; ?></td>
			<td><?php echo $value['codigo']; ?></td>
			<td><?php echo $value['descripcion']; ?></td>
			<td><?php echo $value['requerida']; ?></td>
			<td><?php echo $value['utilizada']; ?></td>
	    <td><?php echo $value['unidad_medida']; ?></td>
      
			<td>
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