<?php 
include ('herramientas/barranav.php'); 
include ('herramientas/validacion.php');
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

	<!-- CDN JQuery -->
	<script
	src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
	integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
	crossorigin="anonymous"
	></script>

	<!-- Librería reCaptcha -->
	<script src="https://www.google.com/recaptcha/api.js?render=6LeaTZEpAAAAANV5eUXVm58p5M78idG1rt6Ep1eh"></script>

	<title>Instituto México - Registrarse</title>
</head>
<body class="d-flex flex-column min-vh-100">

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('no-index') ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<section class="m-auto h-100 text-center">
		<div class="w-75 my-3 mx-auto formulario rounded p-3 p-md-4">
			<form id="form" method="post" action="herramientas/validacion.php?tipo=nuevo_reg">
						
				<div class="row w-100 m-0">
					<div class="col-12">
						<h1 class="h3 text-center text-md-start mb-3 fw-normal">Registrar nuevo usuario</h1>
					</div>
				</div>
				<div class="row w-100 m-0">
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="IDU" type="text" placeholder="ID de usuario" 
						data-bs-toggle="tooltip" data-bs-title="ID compuesto por caracteres alfanuméricos"
						value=<?php recuperarCampo ('IDU') ?>>
						<?php comprobarErrorFormulario('1'); ?>
						<label class="mx-3" for="IDU">ID Usuario</label>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="pass"type="password" placeholder="Contraseña" 
						data-bs-toggle="tooltip" 
						data-bs-title="Longitud mínima de 8 posiciones, con letras y números y por lo menos un carácter especial (#,$,-,_,&,%)"
						value=<?php recuperarCampo ('pass') ?>>
						<label class="mx-3" for="pass">Contraseña</label>
						<?php comprobarErrorFormulario('2'); ?>
					</div>
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="nombre" type="text" placeholder="Nombre"
						data-bs-toggle="tooltip"  
						data-bs-title="Nombres o nombres del usuario"
						value=<?php recuperarCampo ('nombre') ?>>
						<label class="mx-3" for="nombre">Nombre</label>
						<?php comprobarErrorFormulario('3'); ?>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="ap_paterno" type="text" placeholder="Apellido paterno" 
						data-bs-toggle="tooltip"  
						data-bs-title="Primer apellido"
						value=<?php recuperarCampo ('ap_paterno') ?>>
						<label class="mx-3" for="ap_paterno">Apellido paterno</label>
						<?php comprobarErrorFormulario('4'); ?>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="ap_materno" type="text" placeholder="Apellido materno" 
						data-bs-toggle="tooltip"  
						data-bs-title="Segundo apellido"
						value=<?php recuperarCampo ('ap_materno') ?>>
						<label class="mx-3" for="ap_materno">Apellido materno</label>
						<?php comprobarErrorFormulario('5'); ?>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="edad" type="number" placeholder="Edad" 
						data-bs-toggle="tooltip"  
						data-bs-title="Edad válida entre 1 y 100 años" 
						value=<?php recuperarCampo ('edad') ?>>
						<label class="mx-3" for="edad">Edad</label>
						<?php comprobarErrorFormulario('6'); ?>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<select class="form-control" name="sexo"
						data-bs-toggle="tooltip"  
						data-bs-title="Selecciona el sexo">
							<option <?php recuperarSeleccion('sexo','Masculino') ?>>Masculino</option>
							<option <?php recuperarSeleccion('sexo','Femenino') ?>>Femenino</option>
						</select>
						<label class="mx-3" for="sexo">Sexo</label>
						<?php comprobarErrorFormulario('7'); ?>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<input class="form-control" name="email" type="text" placeholder="Email" 
						data-bs-toggle="tooltip"  
						data-bs-title="Ingresa el email que será utilizado para la plataforma" 
						value=<?php recuperarCampo ('email') ?>>
						<label class="mx-3" for="email">Email</label>
						<?php comprobarErrorFormulario('8'); ?>
					</div>
	
					<div class="col-12 col-md-6 col-lg-4 form-floating my-3">
						<select class="form-control" name="tipo_usuario"
						data-bs-toggle="tooltip"  
						data-bs-title="Usuario por defecto" >
							<option>Padre de Familia</option>
						</select>
						<label class="mx-3" for="tipo_usuario">Tipo de usuario</label>
						<?php comprobarErrorFormulario('9'); ?>
					</div>
	
				</div>
				<div class="row m-0 justify-content-center">
					<div class="col-12 col-lg-4">
						<?php comprobarErrorFormulario('10'); ?>
						<button class="btn btn-primary w-100 mt-3" type="submit">Registrar</button>
					</div>
				</div>
			</form>
		</div>
	</section>

	<!-- Validación reCaptcha -->
	<script src="../js/captcha.js"></script>

</body>

<!-- FOOTER -->
<?php mostrarFooter() ?>
<script 
	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
	integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" 
	crossorigin="anonymous">
</script>
<script src="../js/activartooltip.js"></script>
</html>