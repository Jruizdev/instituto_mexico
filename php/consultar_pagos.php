<?php 
include ('herramientas/barranav.php'); 
include ('herramientas/sesion.php'); 
include ('herramientas/errores.php');
validarInicioSesion ();
validarTipoUsuario ('PDC');
?>
<!DOCTYPE html>
<html>
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
	<title>Consultar pagos</title>
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('usuario') ?>

	<img class="fondo" src="../img/colegio.jpg" alt="Intituto México">

	<!-- CONTENIDO DE LA PÁGINA -->
	<section class="h-100">
		<div class="row d-flex justify-content-center align-items-center">
			<div class="formulario-dark col-10 col-md-8 col-lg-5 col-xl-4 m-5 py-5 p-md-5 rounded shadow">
				<form class="dark" method="GET" action="herramientas/validacion.php">

					<input type="hidden" name="tipo" value="consultar_pagos_PDC" data-bs-toggle="tooltip"
					data-bs-title="Ingrese el ID del usuario">
					<h3 class="h3 text-center text-md-start mb-5 fw-normal">Consultar Pagos</h3>

					<div class="form-floating my-3">
						<input class="form-control" type="text" name="IDU_consulta" placeholder="ID de usuario">
						<label for="IDU">Usuario a consultar</label>
						<?php comprobarErrorISesion() ?>
					</div>
					
					<button class="btn btn-primary w-100 mt-3" type="submit">Consultar</button>
				</form>
			</div>
			<div class="row justify-content-center">
			<p class="leyenda text-center col-xl-5 col-8 form-text">Nota. Imagen de fondo cortesía de Wikimedia Commons (2020) bajo licencia Creative Commons. Haz clic <a href="https://commons.wikimedia.org/wiki/File:Fachada-Primaria-y-Bachillerato-scaled.jpg">aquí</a> para ver la fuente original y los términos y condiciones.</p>
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