<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - Formulario Adopción</title>
    <!-- STYLE -->
    <link rel="stylesheet" href="../css/formulario_adopcion.css">
    <link rel="icon" href="../../assets/icon/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google ReCAPTCHA -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('adoptanteForm');
            const recaptchaError = document.getElementById('recaptchaError');

            // Obtener el parámetro id_animal de la URL
            const urlParams = new URLSearchParams(window.location.search);
            const idAnimal = urlParams.get('id_animal');

            // Si hay un ID de animal, completar el campo oculto en el formulario
            if (idAnimal) {
                const idAnimalField = document.querySelector('input[name="ID_Animal"]');
                idAnimalField.value = idAnimal;
            }

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                // Verificar si el reCAPTCHA se ha completado
                if (!grecaptcha.getResponse()) {
                    recaptchaError.textContent = 'Por favor, marque la casilla de reCAPTCHA antes de enviar el formulario.';
                    return;
                } else {
                    recaptchaError.textContent = '';
                }

                const formData = new FormData(form);

                try {
                    const responseAdoptante = await fetch('../controllers/logic/adoptantes-controller/viewModel_Crear.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (!responseAdoptante.ok) {
                        throw new Error('Error en la solicitud de envío.');
                    }

                    const adoptanteData = await responseAdoptante.json();

                    if (!adoptanteData.success) {
                        throw new Error('Error al enviar sus datos.');
                    }

                    showAlert('success', 'Sus datos han sido registrados correctamente, por favor estar pendiente a su correo.');

                    // Limpiar el formulario después de crear el adoptante
                    form.reset();
                } catch (error) {
                    showAlert('danger', error.message || 'Error en la solicitud.');
                }
            });

            function showAlert(type, message) {
                const alertDiv = document.createElement('div');
                alertDiv.classList.add('alert', `alert-${type}`, 'mt-3');
                alertDiv.setAttribute('role', 'alert');
                alertDiv.textContent = message;

                form.appendChild(alertDiv);
            }
        });
    </script>
</head>
<body>

<script>
function validateText(input) {
  input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.]/g, '');
}

function validateNumber(input) {
  input.value = input.value.replace(/[^0-9]/g, '');
}
</script>

    <h2 class="bienvenido">Bienvenid@</h2>
    <p>En este formulario podrá ingresar sus datos para validar su petición para adopción del animal seleccionado...</p>    

    <div class="container">   
        <img src="../../assets/img/formulario_adopcion/gato_agarrando1.png" alt="image1">
        <div id="notification" class="notification"></div>       
 
        <form id="adoptanteForm" method="POST" class="custom-form">
            <!-- Campo oculto para el ID del animal -->
            <input type="hidden" name="ID_Animal" class="form-control" required>

            <div class="form-group">
                <label for="P_Nombre">Primer Nombre🐾</label>
                <input type="text" name="P_Nombre" class="form-control" placeholder="Digite su primer nombre" required maxlength="20" oninput="validateText(this)">
            </div>
            <div class="form-group">
                <label for="S_Nombre">Segundo Nombre</label>
                <input type="text" name="S_Nombre" class="form-control" placeholder="Digite en caso de tener más nombres" maxlength="20" oninput="validateText(this)">
            </div>
            <div class="form-group">
                <label for="P_Apellido">Primer Apellido🐾</label>
                <input type="text" name="P_Apellido" class="form-control" placeholder="Digite su primer apellido" required maxlength="20" oninput="validateText(this)">
            </div>
            <div class="form-group">
                <label for="S_Apellido">Segundo Apellido</label>
                <input type="text" name="S_Apellido" class="form-control" placeholder="Digite su segundo apellido (opcional)" maxlength="20" oninput="validateText(this)">
            </div>
            <div class="form-group">
                <label for="ID_Adoptante">Número de Identificación (Cédula de Ciudadanía o extranjera)🐾</label>
                <input type="text" name="ID_Adoptante" class="form-control" placeholder="Digite su número de identidad" required maxlength="10" oninput="validateNumber(this)">
            </div>
            <div class="form-group">
                <label for="Correo">Correo electrónico personal o de contacto🐾</label>
                <input type="email" name="Correo" class="form-control" placeholder="Digite su correo electrónico para contactarlo" required maxlength="40">
            </div>
            <div class="form-group">
                <label for="Direccion">Dirección de residencia actual🐾</label>
                <input type="text" name="Direccion" class="form-control" placeholder="Digite la dirección exacta de su vivienda actual" required maxlength="30">
            </div>
            <div class="form-group">
                <label for="Telefono">Número telefónico móvil o fijo (Para contacto)🐾</label>
                <input type="tel" name="Telefono" class="form-control" placeholder="Ingrese el número de teléfono para contactarlo" required maxlength="12" oninput="validateNumber(this)">
            </div>
            <div class="g-recaptcha" data-sitekey="6LfRwaspAAAAAAD_Xm2bIqfEdzWMRw2FCFbcMf_h"></div>
            <div id="recaptchaError" class="text-danger"></div>
            <br>
            <div class="mb-4">
                <button type="submit" class="custom-button">Enviar</button>
                <a href="../views/Tips.php" class="custom-button2">Volver al inicio</a>
            </div>
        </form>
        <img src="../../assets/img/formulario_adopcion/gatito_perrito.png" alt="image2">
    </div>

</body>
</html>
