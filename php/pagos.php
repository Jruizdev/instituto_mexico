<?php 
include ('herramientas/barranav.php'); 
include ('herramientas/sesion.php'); 
include ('herramientas/registros.php'); 
validarInicioSesion ();
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
	<title>Pagos Realizados</title>
</head>
<body class="d-flex flex-column min-vh-100">

	<img class="fondo img-fluid min-vh-100" src="../img/colegio.jpg" alt="Instituto México">

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav ('usuario') ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<section class="h-100 overflow-x-hidden">
		<div class="row d-flex justify-content-center h-75">
			<div class="formulario col-10 col-md-8 m-5 py-5 p-md-5 rounded shadow overflow-x-auto">
				<div class="row">
					<div class="col-12 col-md-6">
						<h4><b>Padre de familia:</b> <?php obtenerUsuario() ?></h4>
					</div>
					<div class="col-12 col-md-6">
						<h4><b>Nombre:</b> 
						<?php obtenerNombre() ?> 
						<?php obtenerApellidoPaterno() ?> 
						<?php obtenerApellidoMaterno() ?></h4>
					</div>
				</div>
				
				<h4 class="my-4">PAGOS REALIZADOS</h4>
				<?php mostrarConsulta ('pagos-PF')?>
			</div>
		</div>

		<div class="row d-flex justify-content-center align-items-center w-100">
			<div class="col-8 text-center mb-5">
				<small class="leyenda">Nota. Imagen de fondo cortesía de Wikimedia Commons (2020) bajo licencia Creative Commons. Haz clic <a href="https://commons.wikimedia.org/wiki/File:Fachada-Primaria-y-Bachillerato-scaled.jpg">aquí</a> para ver la fuente original y los términos y condiciones.</small>
			</div>
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