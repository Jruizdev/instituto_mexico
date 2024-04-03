<?php
$error = new ErrorMsg ();

if(isset($_GET['error'])) {

	// Obtener código de error
	$codigo_error = $_GET['error'];

	switch ($codigo_error) {
		case '0':
			$error->setMsg('<p class="form-text error m-0">Hubo un error de conexión</p>');
			break;
		case '1':
			$error->setMsg('<p class="form-text mb-3 error m-0">Es necesario ingresar el usuario y la contraseña</p>');
			break;
		case '2':
			$error->setMsg('<p class="form-text error my-3">Usuario no registrado</p>');
			break;
		case '3':
			$error->setMsg ('<p class="form-text error m-0">Este usuario ya está registrado</p>'); 
		break;
		case '4': 
			$error->setMsg ('<p class="form-text error m-0">La contraseña debe tener al menos 8 caracteres alfanuméricos y un caracter especial (#,$,-,_,&,%)</p>');
		break;
		case '5': 
			$error->setMsg ('<p class="form-text error m-0">La edad ingresada no es válida</p>');
		break;
		case '6': 
			$error->setMsg ('<p class="form-text error m-0">Esta no es una opción válida</p>');
		break;
		case '7': 
			$error->setMsg ('<p class="form-text error m-0">Este no es un email válido</p>');
		break;
		case '8': 
			$error->setMsg ('<p class="form-text error m-0">El tipo de usuario no es válido</p>');
		break;
		case '9':
			$error->setMsg('<p class="form-text error m-0">Es necesario llenar este campo</p>');
			break;
		case '10':
			$error->setMsg('<p class="form-text error m-0">No se encontraron registros de pago asociados a este usuario</p>');
			break;
		case '11':
			$error->setMsg('<p class="form-text error m-0">El monto ingresado no es válido</p>');
			break;
		case '12':
			$error->setMsg('<p class="form-text error m-0">Debe ingresar una fecha válida</p>');
			break;
		case '13':
			$error->setMsg('<p class="form-text error m-0">No se encontró ningún usuario con este ID</p>');
			break;
		case '14':
			$error->setMsg('<p class="form-text error m-0">La verificación del usuario mediante ReCaptcha no fue válida</p>');
			break;
	}
}

function comprobarErrorFormulario ($indice_campo) {
	global $error;

	if(!isset($_GET['in'])) return;

	if($_GET['in'] == $indice_campo) {
		$error->getMsg();
	}
}

function comprobarErrorISesion () {
	global $error;

	// Desplegar error
	$error->getMsg();
}

class ErrorMsg 
{
	private $indice = -1;
	private $msg = '';

	function setIndice ($indice) {
		$this->indice = $indice;
	}
	function setMsg ($msg) {
		$this->msg = $msg;
	}
	function getIndice () {
		return $this->indice;
	}
	function getMsg () {
		echo $this->msg;
	}
}

?>