<?php
define("RECAPTCHA_V3_SECRET_KEY","6LeaTZEpAAAAAHVtWRm8dYcf-JHIM5WZLsCpOUHS");
session_start();

$token = $_SESSION ['post-data']['token'];
$action = $_SESSION ['post-data']['action'];

$ch = curl_init ();
curl_setopt ($ch, CURLOPT_URL,'https://www.google.com/recaptcha/api/siteverify');
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch, CURLOPT_POSTFIELDS, http_build_query (array ('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec ($ch);
curl_close ($ch);
$arrResponse = json_decode ($response, true);

// Verificar respuesta
if($arrResponse ["success"] == '1' && 
   $arrResponse ["action"] == $action && 
   $arrResponse ["score"] >= 0.5) {
    
    // Test aprobado
    header('Location: validacion.php?tipo=captcha_valido');
    die ();
}
else {

    // Test no aprobado
    header ('Location: ../registrarse.php?tipo=nuevo_reg&error=14&in=10');
    die ();
}
?>