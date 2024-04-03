<?php 
include ('herramientas/barranav.php');
include ('herramientas/validacion.php');
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
	<title>Instituto México - Iniciar sesión</title>
</head>
<body class="d-flex flex-column min-vh-100">
	
	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('no-index') ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<section class="h-100">
		<div class="row d-flex justify-content-center align-items-center h-75">
			<div class="formulario col-10 col-md-8 col-lg-5 col-xl-4 m-5 py-5 p-md-5 rounded">
				<form method="POST" action="inicio.php">
					<h1 class="h3 text-center text-md-start mb-3 fw-normal">Iniciar sesión</h1>
					<div class="form-floating my-3">
						<input class="form-control" id="usuario" name="usuario" type="text" placeholder="ID Usuario">
						<label for="usuario">ID Usuario</label>
					</div>
					<div class="form-floating my-3">
						<input class="form-control" id="pass" name="pass" type="password" placeholder="Constraseña">
						<label for="pass">Contraseña</label>
					</div>
					<?php comprobarErrorISesion () ?>
					<button class="btn btn-primary w-100" id="submit">Siguiente</button>
				</form>
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