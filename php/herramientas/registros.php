<?php
require_once('conexionBD.php');
$registro = new DatosConsulta ();

function comprobarConfirmacion () {
	if (isset($_GET['confirmar'])) {
		$accion = $_GET['confirmar'];
	
		switch ($accion) {

			// Se ha solicitado confirmación para eliminar un registro de pago
			case 'eliminar_pago': confirmarEliminacionPago (); break;
		}
	}
}

function confirmarEliminacionPago () {
	if(!isset($_GET['folio'])) return;

	// Obtener folio de pago
	$folio = $_GET['folio'];

	echo '
	<form class="text-center" method="POST" action="herramientas/validacion.php">

		<input type="hidden" name="tipo" value="eliminar_pago">
		<input type="hidden" name="folio" value="'.$folio.'">

		<h3>¿Desea eliminar el registro de pago '.$folio.'?</h3>
		<div class="d-flex row justify-content-center">
			<input class="btn btn-primary col-4 m-3" type="submit" value="Si" >
			<input class="btn btn-secondary col-4 m-3" type="button" value="No" onclick="history.back()">
		</div>

	</form>
	';

	// Limpiar datos
	unset($_GET['confirmar']);
	unset($_GET['folio']);
}

function mostrarConsulta ($tipo) {
	global $registro;

	switch ($tipo) {

		// Consulta de pagos PDC
		case 'pagos-PDC': $registro->tablaPagosPDC (); break;

		// Consulta de pagos PF
		case 'pagos-PF': $registro->tablaPagosPF (); break;
	}
}

function obtenerNombreConsulta () {
	global $registro;
	$registro->nombreCompleto ();
}

function obtenerUsuarioConsulta () {
	global $registro;
	$registro->usuario ();
}

function obtenerResultadoPago () {
	global $registro;
	$registro->operacionRealizadaPago ();
}

class DatosConsulta {
	private $datos;

	function __construct()
	{
		if(isset($_SESSION['datos-consulta'])) {
			// Recuperar datos de consulta almacenados previamente en la sesión
			$this->datos = $_SESSION['datos-consulta'];
		}
		else {
			// No hay datos de consulta
			header('Location: inicio.php');
			die();
		}
	}

	public function operacionRealizadaPago () {
		if(!isset($this->datos['operacion_pago'])) return;

		// Obtener folio del registro de pago
		$folio = $this->datos['folio_pago'];

		switch ($this->datos['operacion_pago']) {

			// Se ha ingresado o acualizado un registro de pago
			case 'actualizado': $this->mostrarMensajeActualizacionPago ($folio); break;

			// Se ha eliminado un registro de pago
			case 'eliminado': $this->mostrarMensajeEliminacionPago ($folio); break;
		}
	}

	public function usuario () {
		if($this->datos == null) return;

		// Imprimir ID del usuario (recuperado en la consulta)
		echo $this->datos[0]['IDUsuario'];
	}

	public function nombreCompleto () {
		if($this->datos == null) return;

		// Imprimir nombre completo (recuperado de la consulta)
		echo $this->datos[0]['Nombre'].' '.
			 $this->datos[0]['ApellidoPaterno'].' '.
			 $this->datos[0]['ApellidoMaterno'];
	}

	public function mostrarMensajeActualizacionPago ($folio) {
		echo '
		<form class="text-center py-4" method="POST" action="inicio.php">
			<h3>Se ha actualizado el pago con folio:</h3>
			<h2 class="my-2">'.$folio.'</h2>
			<button class="btn btn-primary my-3 w-100" type="submit">Aceptar</button>
		</form>
		';

		unset($_SESSION['datos-consulta']);
	}
	
	public function mostrarMensajeEliminacionPago ($folio) {
		echo '
		<form class="text-center py-4" method="POST" action="inicio.php">
			<h3>Se ha eliminado el pago con el folio:</h3>
			<h2 class="my-2">'.$folio.'</h2>
			<button class="btn btn-primary my-3 w-100" type="submit">Aceptar</button>
		</form>
		';

		unset($_SESSION['datos-consulta']);
	}

	public function tablaPagosPF () {
		if($this->datos == 'No hay registro' || !isset($this->datos)) {
			echo '
			<h4 class="text-center my-5 mx-3">No se encontraron registros de pago</h4>
			';
			return;
		}

		// Imprimir tabla con los registros de pago (Padre de Familia)
		$tabla = '
			<table class="table table-hover table-bordered table-responsive">
				<thead class="text-center table-dark">
					<tr>
						<th scope="col">Folio</th>
						<th scope="col">Concepto</th>
						<th scope="col">Mes</th>
						<th scope="col">Monto</th>
						<th scope="col">Fecha</th>
					</tr>
				</thead>
				<tbody class="text-center">
		';
		foreach ($this->datos as $fila => $datos) {
			$tabla .= '
			<tr>
				<td>'.$datos['FolioPago'].'</td>
				<td>'.$datos['Concepto'].'</td>
				<td>'.$datos['MesPagado'].'</td>
				<td>'.$datos['Monto'].'</td>
				<td>'.$datos['FechaPago'].'</td>
			</tr>';
		}

		$tabla .= '
			</tbody>
			</table>
		';
		echo $tabla;
	}

	public function tablaPagosPDC () {
		
		// Imprimir tabla con los registros de pago (Personal del Departamento de Cobranza)
		$tabla = '
			<table class="table table-hover table-bordered table-responsive">
				<thead class="text-center table-dark">
					<tr>
						<th scope="col">Folio</th>
						<th scope="col">Concepto</th>
						<th scope="col">Mes</th>
						<th scope="col">Monto</th>
						<th scope="col">Fecha</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody class="text-center">
		';
		foreach ($this->datos as $fila => $datos) {
			$tabla .= '
			<tr>
				<td>'.$datos['FolioPago'].'</td>
				<td>'.$datos['Concepto'].'</td>
				<td>'.$datos['MesPagado'].'</td>
				<td>'.$datos['Monto'].'</td>
				<td>'.$datos['FechaPago'].'</td>
				<td><a class="btn btn-secondary" href="herramientas/validacion.php?tipo=editar_pago&folio='.
				$datos['FolioPago'].'">Editar</a></td>
				<td><a class="btn btn-danger" href="resultado.php?confirmar=eliminar_pago&folio='.
				$datos['FolioPago'].'">Eliminar</a></td>
			</tr>';
		}

		$tabla .= '
			</tbody>
			</table>
		';
		echo $tabla;
	}
}

?>