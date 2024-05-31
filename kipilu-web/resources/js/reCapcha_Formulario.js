function validarFormulario() {
    var response = grecaptcha.getResponse();
    if (response.length === 0) {

        alert("Por favor, marque la casilla de reCAPTCHA antes de enviar el formulario.");
        return false;
    }
    return true;
}