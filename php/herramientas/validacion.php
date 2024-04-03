<?php
require_once('errores.php');
require_once('conexionBD.php');
require_once('mes.php');
if(session_id() === "") session_start();
/*
	ERRORES DE:

	[INICIO DE SESIÓN]:

	0) No se pudo establecer conexión con la base de datos
	1) No se ingresó el usuario y la contraseña
	2) El usuario o la contraseña son incorrectos

	[VALIDACIÓN DE DATOS DE REGISTRO]:

	3) Ya existe el usuario en la base de datos
	4) La contraseña no es válida
	5) La edad ingresada no es válida
	6) La opción seleccionada no se encuentra en las opciones
	7) Formato de email no válido
	8) Tipo de usuario no válido
	9) No se llenó el campo
	10) No hay registros de pago asociados al usuario
	11) El monto ingresado no es válido
	12) El formato de la fecha no es válido
	13) No hay un usuario registrado con el ID
*/

function recuperarCampo ($campo) {

	if(isset($_SESSION['post-data'][$campo])) {

		// Recuperar campo del formulario enviado
		echo $_SESSION['post-data'][$campo];
	}
}

function recuperarSeleccion ($campo, $valor) {
	if(isset($_SESSION['post-data'][$campo])) {
		if($_SESSION['post-data'][$campo] == $valor)
			echo "selected";
		else 
			echo "";
	}
}

function comprobarSoloLectura ($campo) {
	if(isset($_SESSION['post-data']['no-editable']) && 
		$_SESSION['post-data']['no-editable'] == $campo) 

		// El campo corresponde a un campo de solo lectura
		echo 'readonly="readonly"';
}

// Se envió formulario para validación
if(isset($_GET['tipo']) || isset($_POST['tipo'])) {

	if(isset($_GET['tipo'])) $tipo = $_GET['tipo'];
	if(isset($_POST['tipo'])) $tipo = $_POST['tipo'];
	
	switch ($tipo) {

		// Formulario de nuevo registro
		case 'nuevo_reg': validarFormularioRegistro (); break;

		// Formulario de registro de pago
		case 'nuevo_pago': validarFormularioPago (); break;

		// Consultar pagos Personal del Departamento de Cobranza
		case 'consultar_pagos_PDC': consultarPagosPDC (); break;

		// Consultar pagos Personal de Padre de Familia
		case 'consultar_pagos': echo consultarPagosPF (); break;

		// Editar datos de registro de pago
		case 'editar_pago': editarRegistroPago (); break;

		// Eliminar registro de pago
		case 'eliminar_pago': eliminarRegistroPago (); break;

		// reCaptcha validado
		case 'captcha_valido': agregarUsuarioBD (); break;
	}
}

// Limpiar datos de registro almacenados 
else unset($_SESSION['post-data']);

function agregarUsuarioBD () {
	if(!isset($_SESSION['datos-registro'])) return;

	// Almacenar registro en la base de datos
	nuevoUsuario ($_SESSION['datos-registro']);

	// Iniciar sesión con el nuevo usuario
	$_SESSION ['usuario'] = $_SESSION ['datos-registro']['IDU'];
	$_SESSION ['tipo'] = $_SESSION ['datos-registro']['tipo'];
	$_SESSION ['nombre'] = $_SESSION ['datos-registro']['nombre'];
	$_SESSION ['ap_paterno'] = $_SESSION ['datos-registro']['ap_paterno'];
	$_SESSION ['ap_materno'] = $_SESSION ['datos-registro']['ap_materno'];
	$_SESSION ['sexo'] = $_SESSION ['datos-registro']['sexo'];
	$_SESSION ['creacion_usuario'] = 'success';
	session_write_close ();
	
	header('Location: ../inicio.php');
	die();
}


function eliminarRegistroPago () {
	if(!isset($_POST['folio'])) return;

	// Obtener folio de pago
	$folio = $_POST['folio'];

	// Eliminar pago
	$resultado = eliminarPago ($folio);

	if($resultado == '') {

		// El pago se ha eliminado correctamente
		$_SESSION['datos-consulta']['operacion_pago'] = 'eliminado';
		$_SESSION['datos-consulta']['folio_pago'] = $folio;
		header('Location: ../resultado.php');
		die ();
	}
}

function editarRegistroPago() {
	if(isset($_GET['folio'])) {

		// Obtener folio del registro por editar
		$folio = $_GET['folio'];

		$datos = consultarFolioPago ($folio);

		if(is_array($datos)) {

			// Se encontró el registro de pago del fólio
			$_SESSION['post-data'] = $datos;
			$_SESSION['post-data']['no-editable'] = 'FolioPago';
			header('Location: ../registrar_pago.php?tipo=editar_pago?folio='
					.$_SESSION['post-data']['FolioPago']);
			die();
		}

		// No se encontró el registro de pago del folio
		header('Location: ../registrar_pago.php');
	}
}

function consultarPagosPDC () {
	$resultado = consultarPagos();

	if(is_array($resultado[0])) {

		// Se encontraron registros de pago para el usuario
		header('Location: ../pagos_usuario.php');
	} else {
		
		// No se encontraron registros de pago
		header('Location: ../consultar_pagos.php?error=10');
	}
}

function consultarPagosPF () {
	$resultado = consultarPagos ();

	// Enviar resultados a la página de consulta de pagos
	header('Location: ../pagos.php');
	die();
}

function consultarPagos () {

	$ID = null;

	if(isset($_GET['IDU_consulta'])) $ID = $_GET['IDU_consulta'];
	else if (isset($_SESSION['usuario'])) $ID = $_SESSION['usuario'];

	if(!isset($ID)) return;	// No se ha encontrado ningún ID para consultar

	if($ID == '') {

		// No se ha introducido ningún dato en el campo
		header('Location: ../consultar_pagos.php?error=9');
		die();
	}

	// Consultar los pagos realizados por el usuario en la Base de Datos
	$registro = pagos ($ID);

	if(is_array($registro[0])) {

		// Almacenar registros de pago, en caso de que se hayan encontrado
		$_SESSION['datos-consulta'] = $registro;
	}
	else {
		$_SESSION['datos-consulta'] = 'No hay registro';
	}
	return $registro;
}

function validarFormularioPago () {

	foreach ($_POST as &$campo) {

		// Evitar la inserción de posibles etiquetas HTML en los campos
		$campo = filter_var ($campo, FILTER_SANITIZE_STRING);
	}

	if(count($_POST) != 6) {
		return;	// No se recibieron todos los parámetros
	}

	// Almacenar temporalmente los datos enviados en la sesión
	$_SESSION ['post-data'] = $_POST;
	$folio = $_SESSION ['post-data']['FolioPago'];

	// Realizar la validación de los campos
	if($_POST['FolioPago'] == '') {
		header('Location: ../registrar_pago.php?tipo=nuevo_pago&error=9&in=1'); return;
	}
	if(!usuarioRegistrado ($_POST['IDUsuario'])) {
		header('Location: ../registrar_pago.php?tipo=nuevo_pago&error=13&in=2'); return;
	}
	if($_POST['Concepto'] == '') {
		header('Location: ../registrar_pago.php?tipo=nuevo_pago&error=9&in=3'); return;
	}
	if(!mesValido($_POST['MesPagado'])) {
		header('Location: ../registrar_pago.php?tipo=nuevo_pago&error=6&in=4'); return;
	}
	if(!montoValido($_POST['Monto'])) {
		header('Location: ../registrar_pago.php?tipo=nuevo_pago&error=11&in=5'); return;
	}
	if(!fechaValida($_POST['FechaPago'])) {
		header('Location: ../registrar_pago.php?tipo=nuevo_pago&error=12&in=6'); return;
	}

	$_SESSION['datos-registro'] = $_POST;
	
	// Actualizar o registar pago
	registrarPago ($_SESSION['datos-registro']);

	// Limpiar datos almacenados en la sesión
	unset($_POST);
	unset($_SESSION['post-data']);
	unset($_SESSION['datos-registro']);

	// Almacenar datos de la operación realizada
	unset($_SESSION['datos-consulta']);
	$_SESSION['datos-consulta']['operacion_pago'] = 'actualizado';
	$_SESSION['datos-consulta']['folio_pago'] = $folio;

	// Pago eliminado de forma correcta
	header('Location: ../resultado.php');
	die ();
}

function validarFormularioRegistro () {
	foreach ($_POST as &$campo) {

		// Evitar la inserción de posibles etiquetas HTML en los campos
		$campo = filter_var ($campo, FILTER_SANITIZE_STRING);
	}

	if(count($_POST) < 9 || 
	   !isset($_POST['token']) || 
	   !isset($_POST['action'])) return;	// No se recibieron todos los parámetros necesarios

	// Almacenar temporalmente los datos enviados en la sesión
	$_SESSION ['post-data'] = $_POST;

	// Realizar la validación de los campos
	if ($_POST['IDU'] == '') {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=9&in=1'); return;
	}
	if (!IDUValido ($_POST['IDU'])) {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=3&in=1'); return;
	}
	if (!passValido ($_POST['pass'])) {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=4&in=2'); return;
	}
	if ($_POST['nombre'] == '') {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=9&in=3'); return;
	}
	if ($_POST['ap_paterno'] == '') {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=9&in=4'); return;
	}
	if ($_POST['ap_materno'] == '') {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=9&in=5'); return;
	}
	if (!edadValida ($_POST['edad'])) {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=5&in=6'); return;
	}
	if (!sexoValido ($_POST['sexo'])) {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=6&in=7'); return;
	}
	if (!emailValido ($_POST['email'])) {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=7&in=8'); return;
	}
	if (!tipoUsuarioValido ($_POST['tipo_usuario'])) {
		header('Location: ../registrarse.php?tipo=nuevo_reg&error=6&in=9'); return;
	}

	session_unset();
	$_SESSION ['datos-registro'] = $_POST;
	$_SESSION ['datos-registro']['tipo'] = 'PF';
	$_SESSION ['post-data']['token'] = $_POST ['token'];
	$_SESSION ['post-data']['action'] = $_POST ['action'];

	// Validar formulario con reCaptcha v3
	header('Location: captcha-post.php');
}


function tipoUsuarioValido ($campo) {

	// Únicamente se permite el registro de usuario como padre de familia
	if($campo != 'Padre de Familia') return false;
	return true;
}

function emailValido ($campo) {

	// Validar estructura de correo electrínico
	if(!filter_var($campo, FILTER_VALIDATE_EMAIL)) return false;
	return true;
}

function sexoValido ($campo) {

	// Sexo masculino o femenino
	if($campo != 'Masculino' && $campo != 'Femenino') return false;

	if($campo == 'Masculino') $_POST['sexo'] = 'M';
	else if($campo == 'Femenino') $_POST['sexo'] = 'F';

	return true;
}

function edadValida ($campo) {

	// Edad entre 1 y 100 años
	if(!preg_match('/^(?:[1-9][0-9]?|100)$/', $campo)) return false;
	return true;
}

function passValido ($campo) {

	// Contraseña de al menos 8 caracteres alfanuméticos, con al menos 1 caracter especial (#$\-_&%)
	if(!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[#$\-_&%])[A-Za-z\d#$\-_&%]{8,}$/', $campo)) return false;
	return true;
}

function usuarioRegistrado ($IDU) {

	// Comprobar que el usuario exista en la base de datos
	if(!existeUsuario ($IDU)) return false;
	return true;
}

function IDUValido ($campo) {

	if($campo == '' || existeUsuario ($campo)) return false;
	return true;
}

function mesValido ($campo) {

	// El campo corresponde con un mes del año
	return esMes($campo);
}

function fechaValida ($campo) {

	// El formato de la fecha ingresada no es válido
	return (strtotime($campo) !== false);
}

function montoValido ($campo) {

	// El formato del monto es correcto
	if(!preg_match('/^(\d+|\d+\.\d+)$/', $campo)) return false;
	return true;
}

?>