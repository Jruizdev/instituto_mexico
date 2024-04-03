<?php 
include ('herramientas/barranav.php'); 
include ('herramientas/sesion.php');
include ('herramientas/validacion.php');
validarInicioSesion ();
validarTipoUsuario ('PDC');
?>
<!DOCTYPE html>
<html class="min-vh-100">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link 
		href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" 
		rel="stylesheet" 
		integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" 
		crossorigin="anonymous"
	>
	<link rel="stylesheet" type="text/css" href="../css/personalizado.css">
	<title>Registrar pago</title>
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('usuario') ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<section class="m-auto h-100 text-center">
		<div class="w-75 my-3 mx-auto formulario rounded p-3 p-md-4">
			<form method="POST" action="herramientas/validacion.php?tipo=nuevo_pago">

				<div class="row w-100 m-0">
					<div class="col-12">
						<h1 class="h3 text-center text-md-start mb-3 fw-normal">Registrar / Actualizar Pago</h1>
					</div>
				</div>
				<div class="row w-100 m-0">
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" type="text" name="FolioPago" placeholder="Folio de pago"
						<?php comprobarSoloLectura ('FolioPago')?> value=<?php recuperarCampo ('FolioPago') ?>>
						<?php comprobarErrorFormulario('1'); ?>
						<label class="mx-3" for="FolioPago">Folio de pago</label>
					</div>

					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" type="text" name="IDUsuario" placeholder="ID del usuario" 
						value=<?php recuperarCampo ('IDUsuario') ?>>
						<?php comprobarErrorFormulario('2'); ?>
						<label class="mx-3" for="IDUsuario">ID del usuario</label>
					</div>	

					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<textarea class="form-control" name="Concepto" placeholder="Concepto"><?php recuperarCampo ('Concepto') ?></textarea><?php comprobarErrorFormulario('3'); ?>
						<label class="mx-3" for="Concepto">Concepto</label>
					</div>

					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<select class="form-control" name="MesPagado">
							<option <?php recuperarSeleccion('MesPagado','Enero') ?>>Enero</option>
							<option <?php recuperarSeleccion('MesPagado','Febrero') ?>>Febrero</option>
							<option <?php recuperarSeleccion('MesPagado','Marzo') ?>>Marzo</option>
							<option <?php recuperarSeleccion('MesPagado','Abril') ?>>Abril</option>
							<option <?php recuperarSeleccion('MesPagado','Mayo') ?>>Mayo</option>
							<option <?php recuperarSeleccion('MesPagado','Junio') ?>>Junio</option>
							<option <?php recuperarSeleccion('MesPagado','Julio') ?>>Julio</option>
							<option <?php recuperarSeleccion('MesPagado','Agosto') ?>>Agosto</option>
							<option <?php recuperarSeleccion('MesPagado','Septiembre') ?>>Septiembre</option>
							<option <?php recuperarSeleccion('MesPagado','Octubre') ?>>Octubre</option>
							<option <?php recuperarSeleccion('MesPagado','Noviembre') ?>>Noviembre</option>
							<option <?php recuperarSeleccion('MesPagado','Diciembre') ?>>Diciembre</option>
						</select>
						<label class="mx-3" for="MesPagado">Mes pagado</label>
						<?php comprobarErrorFormulario('4'); ?>
					</div>

					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" type="number" name="Monto" min="1" step="any" placeholder="$"
						value=<?php recuperarCampo ('Monto') ?>>
						<label class="mx-3" for="Monto">Monto pagado</label>
						<?php comprobarErrorFormulario('5'); ?>
					</div>
					
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" type="date" name="FechaPago" 
						value=<?php recuperarCampo ('FechaPago') ?>>
						<?php comprobarErrorFormulario('6'); ?>
						<label class="mx-3" for="FechaPago">Fecha de pago</label>
					</div>
				</div>

				<div class="row m-0 justify-content-center">
					<div class="col-12 col-lg-4">
						<button class="btn btn-primary w-100">Enviar</button>
					</div>
				</div>
				
			</form>
		</div>
	</section>
	
</body>

<!-- FOOTER -->
<?php mostrarFooter() ?>
<script 
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
	crossorigin="anonymous">
</script>
</html>