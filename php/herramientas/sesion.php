<?php
require_once('conexionBD.php');
if(session_id() === "") session_start();


if(isset($_GET['cerrar_sesion'])) {

	// Comprobar si el usuario ha cerrado sesión
	if($_GET['cerrar_sesion'] == '1') {
		session_destroy ();
		header('Location: ../../index.php');
	}
}

function comprobarValidacionNuevoUsuario () {
	if(isset($_SESSION['creacion_usuario']) && $_SESSION['creacion_usuario'] == 'success') {

		// Se realizó la creación de un nuevo usuario
		echo '
		<div class="modal" id="modal" tabindex="-1" aria-labelledby="titulo-modal" role="dialog">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="titulo-modal">Verificación correcta</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="48" fill="green" class="bi bi-check2-circle mb-3" viewBox="0 0 16 16">
					<path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0"/>
					<path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
				</svg>
				<p class="text-center">Se verificó correctamente la creacíon del usuario utilizando el sistema de ReCaptcha.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary m-auto w-50" data-bs-dismiss="modal">Aceptar</button>
			</div>
			</div>
		</div>
		</div>
		';

		// No volver a mostrar mensaje de verificación al usuario
		unset ($_SESSION['creacion_usuario']);
	}
}

function validarTipoUsuario ($tipo) {
	if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != $tipo) {
		header('Location: inicio.php');
	}
}

function validarInicioSesion () {

	if(isset($_SESSION['usuario'])) return;	// Ya hay una sesión activa

	// Se recibió formulario con las credenciales de inicio de sesión
	if(isset($_POST['usuario']) && isset($_POST['pass']) &&
	   $_POST['usuario'] != '' && $_POST['pass'] != '') {
		
		// Comprobar si el usuario y la contraseña son correctos
		validarCredenciales ($_POST['usuario'], $_POST['pass']);
	}
	else {
		//No se ingresaron todas las credenciales (usuario y contraseña)
		header('Location: login.php?error=1');
	}
}

function validarSesionIndex () {

	if(isset($_SESSION['usuario'])) {

		// Redireccionar a página de inicio si hay una sesión activa
		header('Location: php/inicio.php');
	}
}

function obtenerRegistroPagos () {
	if(isset($_SESSION['usuario'])) {

		// Obtener el registro de los pagos realizados por el usuario
		header('Location: herramientas/validacion.php?tipo=consultar_pagos_PF&IDU_consulta='.$_SESSION['usuario']);
	}
}

function obtenerUsuario () {
	if (isset($_SESSION['usuario'])) echo $_SESSION['usuario'];
}

function obtenerNombre () {
	if (isset($_SESSION['nombre'])) echo $_SESSION['nombre'];
}

function obtenerApellidoPaterno () {
	if (isset($_SESSION['ap_paterno'])) echo $_SESSION['ap_paterno'];
}

function obtenerApellidoMaterno () {
	if (isset($_SESSION['ap_materno'])) echo $_SESSION['ap_materno'];
}

function obtenerTipoUsuario () {
	if (isset($_SESSION['tipo'])) {
		switch ($_SESSION['tipo']) {
			case 'PF': echo "Padre de Familia"; break;
			case 'PDC': echo "Personal del Departamento de Cobranza"; break;
		}
	}
}

function obtenerBienvenida () {
	if(isset($_SESSION['sexo'])) {
		if($_SESSION['sexo'] == 'M' || $_SESSION['sexo'] == 'Masculino') echo "Bienvenido ";
		else echo "Bienvenida ";
	}
}

?>