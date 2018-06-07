
function actualiza_contenido()
{
$('#correlativo').load('../ajax/realtime/php/ot-correlativo.php');
}

setInterval('actualiza_contenido()', 1000 );