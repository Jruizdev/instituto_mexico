// Validar captcha al enviar el formulario de registro de usuario
const clave_sitio = '6LeaTZEpAAAAANV5eUXVm58p5M78idG1rt6Ep1eh';
const label = 'registro_im';

$('#form').submit (function(event) {
    event.preventDefault ();
    grecaptcha.ready (function () {
        grecaptcha.execute (clave_sitio, {action: label}).then(function(token) {
            $('#form').prepend('<input type="hidden" name="token" value="' + token + '">');
            $('#form').prepend('<input type="hidden" name="action" value="' + label + '">');
            $('#form').unbind('submit').submit();
        });
    });
});