<?php 
include ('herramientas/barranav.php'); 
include ('herramientas/sesion.php'); 
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
	<script src="../js/modal.js"></script>
	<title>Instituto México</title>
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('usuario') ?>
	<?php comprobarValidacionNuevoUsuario () ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<main class="container text-center my-5">
		<h1>¡<?php obtenerBienvenida() ?> 
			<?php obtenerNombre() ?> 
			<?php obtenerApellidoPaterno() ?> 
			<?php obtenerApellidoMaterno() ?>!</h1>
		<h3 class="mt-5">¡Has ingresado como <?php obtenerTipoUsuario() ?>!</h3>
	</main>

</body>

<!-- FOOTER -->
<?php mostrarFooter() ?>
<script 
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
	crossorigin="anonymous">
</script>
</html>