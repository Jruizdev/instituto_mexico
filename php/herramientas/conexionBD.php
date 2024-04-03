<?php

// Establecer una nueva conexión con la base de datos
$bd = new Conexion ();

function validarCredenciales ($usuario, $pass) {
	global $bd;

	// Validar credenciales de inicio se sesión
	$bd->validarUsuario ($usuario, $pass);
}

function existeUsuario ($usuario) {
	global $bd;

	// Comprobar si existe el usuario en la base de datos
	return $bd->existeRegistroUsuario ($usuario);
}

function nuevoUsuario ($datos) {
	global $bd;

	// Registrar usuario en la base de datos
	$bd->registrarUsuario ($datos);
}

function pagos ($id_usuario) {
	global $bd;

	// Consultar los pagos registrados con el ID usuario
	return $bd->consultarPagos ($id_usuario);
}

function consultarFolioPago ($folio) {
	global $bd;

	// Consultar información del folio de pago
	return $bd->folioPago ($folio);
}

function registrarPago ($datos) {
	global $bd;

	// Actualizar o registrar pago
	$bd->registrarPago ($datos);
}

function eliminarPago ($folio) {
	global $bd;

	// Eliminar pago de la base de datos
	return $bd->eliminarRegistroPago ($folio);
}

class Conexion
{
	// Propiedades de conexión con la base de datos
	private $conexion = null;
	private $host = 'localhost';
	private $bd = 'institutomexico_joro';
	private $usuario = 'root';
	private $pass = '';

	function __construct () {
		$this->conectar ();
	}

	function conectar () {

		global $conexion, $host, $bd, $usuario, $pass;

		try {

			// Establecer nueva conexión con PDO
			$conexion = new PDO('mysql:host='.$this->host.';dbname='.$this->bd, $this->usuario, $this->pass);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch (PDOException) {

			// Error de conexión
			echo "<p><b>Error:</b> No se pudo establecer conexión con el servidor.</p>";
		}
	}

	function validarUsuario ($usuario, $pass) {

		global $conexion;

		// Consultar si existe algún registro que coincida con las credenciales
		$sql = $conexion->prepare ('SELECT COUNT(*), TipoUsuario,Nombre,ApellidoPaterno,ApellidoMaterno,Sexo FROM 
									Usuarios WHERE IDUsuario=:usuario AND PASSWORD=:pass');

		$sql->execute (array('usuario' => $usuario, 'pass' => $pass));

		$resultado = $sql->fetch (PDO::FETCH_ASSOC);
		
		if(intval($resultado['COUNT(*)']) > 0) {

			// Se encontró al usuario en la base de datos,
			// Almacenar datos del usuario en la sesión
			$_SESSION['usuario'] = $usuario;
			$_SESSION['tipo'] = $resultado['TipoUsuario'];
			$_SESSION['nombre'] = $resultado['Nombre'];
			$_SESSION['ap_paterno'] = $resultado['ApellidoPaterno'];
			$_SESSION['ap_materno'] = $resultado['ApellidoMaterno'];
			$_SESSION['sexo'] = $resultado['Sexo'];
			session_write_close();
		}
		else {

			// No se encontró al usuario en la base de datos
			header('Location: ../php/login.php?error=2');
		}
	}

	function existeRegistroUsuario ($usuario) {
		global $conexion;

		// Consultar si existe el registro en la tabla
		$sql = $conexion->prepare('SELECT COUNT(*) FROM Usuarios WHERE IDUsuario = :usuario');
		$sql->execute (array('usuario' => $usuario));

		try {
			$resultado = $sql->fetch(PDO::FETCH_ASSOC);

			// Si existe el registro
			if(intval($resultado['COUNT(*)']) > 0) return true;

			// No existe el registro
			return false;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function registrarUsuario ($datos) {
		global $conexion;

		// Registrar en la tabla de usuarios
		$sql = $conexion->prepare('INSERT INTO Usuarios VALUES (
			:IDU,:nombre,:ap_paterno,:ap_materno,:edad,:sexo,:email,:tipo,:pass)');

		try {
			$sql->execute(array(
				'IDU' => $datos['IDU'],
				'nombre' => $datos['nombre'],
				'ap_paterno' => $datos['ap_paterno'],
				'ap_materno' => $datos['ap_materno'],
				'edad' => $datos['edad'],
				'sexo' => $datos['sexo'],
				'email' => $datos['email'],
				'tipo' => $datos['tipo'],
				'pass' => $datos['pass']
			));
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function consultarPagos ($id_usuario) {
		global $conexion;

		// Consultar los pagos asociados al usuario en la tabla "Pagos"
		$sql = $conexion->prepare('SELECT * FROM Pagos INNER JOIN Usuarios ON 
								  Pagos.IDUsuario=Usuarios.IDUsuario WHERE
								  Pagos.IDUsuario=:usuario');
		try {
			$sql->execute(array('usuario' => $id_usuario));

			$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $resultado;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function folioPago ($folio) {
		global $conexion;

		// Consultar los datos referentes al folio de pago
		$sql = $conexion->prepare ('SELECT * FROM Pagos WHERE FolioPago=:folio_pago');

		try {
			$sql->execute(array('folio_pago' => $folio));
			
			$resultado = $sql->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	function registrarPago ($datos) {
		global $conexion;

		// Insertar nuevo registro, o actualizar si ya existe el folio de pago
		$sql = $conexion->prepare ('
			INSERT INTO Pagos VALUES (:folio,:IDU,:concepto,:mes,:monto,:fecha)
			ON DUPLICATE KEY UPDATE 
			FolioPago=:folio,
			IDUsuario=:IDU,
			Concepto=:concepto,
			MesPagado=:mes,
			Monto=:monto,
			FechaPago=:fecha
		');

		try {
			$sql->execute(array(
				'folio' => $datos['FolioPago'],
				'IDU' => $datos['IDUsuario'],
				'concepto' => $datos['Concepto'],
				'mes' => $datos['MesPagado'],
				'monto' => $datos['Monto'],
				'fecha' => $datos['FechaPago']
			));
			
			$resultado = $sql->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function eliminarRegistroPago ($folio) {
		global $conexion;

		// Eliminar registro de pago que coincida con el folio
		$sql = $conexion->prepare('DELETE FROM Pagos WHERE FolioPago=:folio');

		try {
			$sql->execute (array(
				'folio' => $folio
			));
			$resultado = $sql->fetch(PDO::FETCH_ASSOC);
			return $resultado;
		}
		catch (PDOException $e) {
			return $e-getMessage();
		}
	}
}

?>