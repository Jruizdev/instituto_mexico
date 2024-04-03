<?php 
include ('php/herramientas/barranav.php');
include ('php/herramientas/sesion.php');
validarSesionIndex ();
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
	<link rel="stylesheet" type="text/css" href="css/personalizado.css">
	<title>Instituto México</title>
</head>
<body>

	<!-- BARRA DE NAVEGACIÓN -->
	<?php mostrarBarraNav('index') ?>

	<!-- CONTENIDO DE LA PÁGINA -->
	<main class="container col-sm-10 col-md-8 col-lg-8 col-xl-6">
		<h2 class="text-center m-4">Instituto México</h2>
		<div>

			<!-- CARRUSEL -->
			<div id="slider" class="carousel slide" data-bs-ride="carousel">
				<div class="carousel-indicators">
					<button class="active" data-bs-target="#slider" data-bs-slide-to="0"></button>
					<button data-bs-target="#slider" data-bs-slide-to="1"></button>
					<button data-bs-target="#slider" data-bs-slide-to="2"></button>
					<button data-bs-target="#slider" data-bs-slide-to="3"></button>
					<button data-bs-target="#slider" data-bs-slide-to="4"></button>
					<button data-bs-target="#slider" data-bs-slide-to="5"></button>
				</div>

				<div class="carousel-inner rounded-4">
					<a class="carousel-item active" href="php/detalles.php?de=fachada">
						<img class="d-block w-100" src="img/fachada.jpg" alt="">
					</a>
					<a class="carousel-item" href="php/detalles.php?de=salones">
						<img class="d-block w-100" src="img/salones.jpeg" alt="">
					</a>
					<a class="carousel-item" href="php/detalles.php?de=gimnasio">
						<img class="d-block w-100" src="img/gimnasio.jpeg" alt="">
					</a>
					<a class="carousel-item" href="php/detalles.php?de=biblioteca">
						<img class="d-block w-100" src="img/biblioteca.jpg" alt="">
					</a>
					<a class="carousel-item" href="php/detalles.php?de=laboratorio">
						<img class="d-block w-100" src="img/laboratorio.jpg" alt="">
					</a>
					<a class="carousel-item" href="php/detalles.php?de=canchas">
						<img class="d-block w-100" src="img/canchas.jpeg" alt="">
					</a>
				</div>

				<button class="carousel-control-prev" data-bs-target="#slider" data-bs-slide="prev">
					<span class="carousel-control-prev-icon"></span>
				</button>
				<button class="carousel-control-next" data-bs-target="#slider" data-bs-slide="next">
					<span class="carousel-control-next-icon"></span>
				</button>
			</div>

			<!-- PRIMERA SECCIÓN -->
			<hr class="hr mt-4" />
			<h3 class="text-muted my-5 text-center">Carreras más solicitadas</h3>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card h-100">
						<img class="card-img-top" src="img/carreras/sistemas.jpg">
						<div class="card-body">
							<h5 class="card-title">Ing. Sistemas Computacionales</h5>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card h-100">
						<img class="card-img-top" src="img/carreras/derecho.jpg">
						<div class="card-body">
							<h5 class="card-title">Licenciatura en Derecho</h5>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card h-100">
						<img class="card-img-top" src="img/carreras/mercadotecnia.jpg">
						<div class="card-body">
							<h5 class="card-title">Licenciatura en Mercadotecnia</h5>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card text-bg-secondary text-center h-100">
						<div class="card-body">
							<h5 class="card-title">Ing. Sistemas Computacionales</h5>
							<h6 class="card-subtitle mb-2 text-body-secondary">Mensualidad</h6>
							<p class="card-text">$1,000.00</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card text-bg-secondary text-center h-100">
						<div class="card-body h-100">
							<h5 class="card-title">Licenciatura en Derecho</h5>
							<h6 class="card-subtitle mb-2 text-body-secondary">Mensualidad</h6>
							<p class="card-text">$900.00</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card text-bg-secondary text-center h-100">
						<div class="card-body">
							<h5 class="card-title">Licenciatura en Mercadotecnia</h5>
							<h6 class="card-subtitle mb-2 text-body-secondary">Mensualidad</h6>
							<p class="card-text">$900.00</p>
						</div>
					</div>
				</div>
			</div>
			<hr class="hr" />

			<!-- SEGUNDA SECCIÓN -->
			<h3 class="text-muted my-5 text-center">Comentarios destacados</h3>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card text-center h-100 shadow border-0">
						<div class="card-body">
							<h5 class="card-title">José Sáinz:</h5>
							<p class="card-text mt-3">
								El Instituto México fue mi segundo hogar durante mis años escolares. ¡Siempre estaré agradecido por los recuerdos y las lecciones que obtuve aquí!
							</p>
						</div>
						<div class="card-footer">
							<small class="text-body-secondary">02/03/2024</small>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card text-center h-100 shadow border-0">
						<div class="card-body">
							<h5 class="card-title">Marco Reséndiz:</h5>
							<p class="card-text mt-3">
								Mi tiempo en el Instituto México no solo me preparó académicamente, sino que también me brindó oportunidades para crecer como líder y como persona.
							</p>
						</div>
						<div>
							<div class="card-footer">
								<small class="text-body-secondary">04/03/2024</small>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-6 col-lg-4 mb-4">
					<div class="card text-center h-100 shadow border-0">
						<div class="card-body">
							<h5 class="card-title">Karla Rodríguez:</h5>
							<p class="card-text mt-3">
								Como exestudiante del Instituto México, puedo decir con seguridad que esta institución me proporcionó una base sólida para alcanzar mis metas académicas y profesionales.
							</p>
						</div>
						<div class="card-footer">
							<small class="text-body-secondary">01/03/2024</small>
						</div>
					</div>
				</div>
			</div>
			<hr class="hr my-4" />

			<h3 class="text-muted">Acerca de nosotros</h3>
			<div class="my-4"><p class="mb-5">El Instituto México es un centro educativo marista que se estableció en Tijuana desde 1965 y que durante estos casi cincuenta años se ha ido consolidando y ampliando los servicios que ofrece.
			<br><br>
			El Modelo Educativo Marista del Instituto México de Baja California (MEMIM) integra los rasgos de la filosofía educativa marista de donde emanan los principios que orientan el trabajo educativo, que integrados a una serie de procesos, metodología y actitudes, se explicita y se realiza el sueño de San Marcelino Champagnat desde hace 200 años de presencia educativa en el mundo.</p></div>
		</div>
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