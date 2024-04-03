<?php
$meses = array(
	'Enero',
	'Febrero',
	'Marzo',
	'Abril',
	'Mayo',
	'Junio',
	'Julio',
	'Agosto',
	'Septiembre',
	'Octubre',
	'Noviembre',
	'Diciembre'
);

function esMes ($dato) {
	global $meses;
	
	// Validar si el dato recibido es un mes del año
	foreach ($meses as $mes => $valor) {
		if($dato == $valor) return true;
	}

	return false;
}
?>