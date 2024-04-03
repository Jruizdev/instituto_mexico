<?php

function mostrarBarraNav ($tipo) {

	// Crear nueva instancia
	$barra = new BarraNav ();

	if(!isset($tipo)) return;

	switch ($tipo) {

		// Barra pre-inicio de sesión
		case 'index': $barra->inicio_index (); break;
		case 'no-index': $barra->inicio(); break;

		// Barra post-inicio de sesión
		case 'usuario': comprobarTipoUsuario ($barra); break;
	}
}

function comprobarTipoUsuario ($barra) {
	if(isset($_SESSION['tipo'])) {
		$tipo = $_SESSION['tipo'];

		switch($tipo) {

			// Es un usuario del personal de cobranzas
			case 'PDC': $barra->PDC(); break;

			// Es un usuario padre de familia
			case 'PF': $barra->PF(); break;
		}
	}
}

function mostrarFooter () {

	// Footer del sitio web
	echo '
	<footer class="d-flex mt-auto justify-content-center align-items-center text-white py-4">
		<p>Jonathan Ruiz Olvera | ES202100495</p>
	</footer>
	';
}

/*	CLASE BARRA DE NAVEGACIÓN	*/
class BarraNav
{
	function inicio () {

		// BARRA DE NAVGACIÓN PRE-INICIO DE SESIÓN
		echo '
		<nav class="navbar sticky-top navbar-dark navbar-expand-lg">
			<div class="container-fluid">
				<a class="navbar-brand mb-2 h1" href="../index.php">Instituto México</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="../index.php">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="registrarse.php">Registrarse</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="login.php">Iniciar sesión</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		';
	}
	function inicio_index () {

		// BARRA DE NAVEGACIÓN PRE-INICIO DE SESIÓN -> PÁGINA INDEX
		echo '
		<nav class="navbar sticky-top navbar-dark navbar-expand-lg px-3">
			<div class="container-fluid">
				<a class="navbar-brand mb-2 h1" href="index.php">Instituto México</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="index.php">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="php/registrarse.php">Registrarse</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="php/login.php">Iniciar sesión</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		';
	}

	function PDC () {

		// BARRA DE NAVEGACIÓN PERSONAL DEL DEPARTAMENTO DE COBRANZA
		echo '
		<nav class="navbar sticky-top navbar-dark navbar-expand-lg">
			<div class="container-fluid">
				<a class="navbar-brand mb-2 h1" href="../index.php">Instituto México</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="inicio.php">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="consultar_pagos.php">Consultar pagos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="registrar_pago.php">Registrar pagos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="herramientas/sesion.php?cerrar_sesion=1">Cerrar sesión</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		';
	}

	function PF () {

		// BARRA DE NAVEGACIÓN PADRE DE FAMILIA
		echo '
		<nav class="navbar sticky-top navbar-dark navbar-expand-lg">
			<div class="container-fluid">
				<a class="navbar-brand mb-2 h1" href="../index.php">Instituto México</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
					<div class="offcanvas-header">
						<h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
						<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
					</div>
					<div class="offcanvas-body">
						<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="inicio.php">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="herramientas/validacion.php?tipo=consultar_pagos">Consultar pagos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link ps-3" aria-current="page" href="herramientas/sesion.php?cerrar_sesion=1">Cerrar sesión</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		';
	}
}

?>