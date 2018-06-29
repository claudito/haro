
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>


<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>

<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">

</head>
<body>
	


<table id="consulta" class="table table-condensed">
		<thead>
			<tr>
				<th>CÓDIGO</th>
				<th>DESCRIPCIÓN</th>
				
			</tr>
		</thead>
		<tbody>
		<tr>
			<td>01</td>
			<td>luis</td>
		</tr>
		<tr>
			<td>02</td>
			<td>omar</td>
		</tr>
		<tr>
			<td>03</td>
			<td>denis</td>
		</tr>
		<tr>
			<td>04</td>
			<td>lizet</td>
		</tr>
		<tr>
			<td>05</td>
			<td>adrian</td>
		</tr>
		</tbody>
	</table>


<script>
$(document).ready(function() {
  $('#consulta').DataTable( {
    dom: 'Bfrtip',
    buttons: [
      /*'copyHtml5',*/
      'excelHtml5',
      /*'csvHtml5',*/
      'pdfHtml5'
    ]
  } );
} );
</script>




</body>
</html>







