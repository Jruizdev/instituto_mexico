<?php 
include ('herramientas/barranav.php'); 
include ('herramientas/sesion.php');
include ('herramientas/registros.php');
validarInicioSesion ();
validarTipoUsuario ('PDC');
?>
<!DOCTYPE html>
<html class="h-100">
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
	<title>Pago registrado</title>
</head>
<body class="d-flex flex-column min-vh-100">
	<img class="fondo" src="../img/colegio.jpg" alt="Intituto México">

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('usuario') ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<section class="h-100 overflow-x-hidden">
		<div class="row d-flex justify-content-center align-items-center h-75">
			<div class="formulario-light col-10 col-md-8 col-lg-5 col-xl-4 m-5 py-5 p-md-5 rounded shadow">
				<?php comprobarConfirmacion(); ?>
				<?php obtenerResultadoPago (); ?>
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