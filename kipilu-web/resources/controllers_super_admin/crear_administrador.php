<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <title>KIPILU - CRUD ADMINISTRADORES Crear Administradores</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('administradorForm');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await fetch('logic/administradores-controller/viewModel_Crear.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        const errorText = await response.text();
                        throw new Error(`Error en la solicitud: ${response.status} ${response.statusText} - ${errorText}`);
                    }

                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', 'El administrador se creó correctamente.');
                    } else {
                        showAlert('danger', 'Error al crear el administrador.');
                    }
                } catch (error) {
                    console.error('Error en la solicitud:', error);
                    showAlert('danger', `Error en la solicitud: ${error.message}`);
                }
            });

            function showAlert(type, message) {
                const alertDiv = document.createElement('div');
                alertDiv.classList.add('alert', `alert-${type}`, 'mt-3');
                alertDiv.setAttribute('role', 'alert');
                alertDiv.textContent = message;

                form.appendChild(alertDiv);

                setTimeout(() => {
                    alertDiv.remove();
                }, 3000);
            }
        });

        function togglePasswordVisibility() {
            const passwordField = document.getElementById("password");
            const passwordToggleIcon = document.getElementById("password-toggle-icon");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggleIcon.classList.remove("fa-eye");
                passwordToggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                passwordToggleIcon.classList.remove("fa-eye-slash");
                passwordToggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</head>
<body>

<script>
function validateText(input) {
  // Elimina cualquier carácter que no sea letra o letra con tilde
  input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.]/g, '');
}

function validateTextDes(input) {
  // Elimina cualquier carácter que no sea letra, letra con tilde, punto o coma
  input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.,]/g, '');
}

function validateAlphaNumeric(input) {
  // Elimina cualquier carácter que no sea letra o número
  input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
}
</script>

<!--Nav(navegacion)-->
<?php include '../reutilize/manu_controllers_super_admin.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Agregar Nuevo Administrador</h1>
    <div id="notification" class="notification"></div>
    <form id="administradorForm" method="POST" class="custom-form">
        <div class="form-group">
            <label for="ID_Administrador">Cédula:</label>
            <input type="text" name="ID_Administrador" class="form-control" placeholder="Ejp:CC123456789 " required  maxlength="12" oninput="validateAlphaNumeric(this)">
        </div>
        <div class="form-group">
            <label for="P_Nombre">Primer Nombre:</label>
            <input type="text" name="P_Nombre" class="form-control" placeholder="Digite su primer nombre" required maxlength="20" title="Solo se permiten letras." oninput="validateText(this)" >
        </div>
        <div class="form-group">
            <label for="S_Nombre">Segundo Nombre:</label>
            <input type="text" name="S_Nombre" class="form-control" placeholder="Digite su segundo nombre" maxlength="20" oninput="validateText(this)">
        </div>
        <div class="form-group">
            <label for="P_Apellido">Primer Apellido:</label>
            <input type="text" name="P_Apellido" class="form-control" placeholder="Digite su primer apellido" required maxlength="20"  title="Solo se permiten letras." oninput="validateText(this)">
        </div>
        <div class="form-group">
            <label for="S_Apellido">Segundo Apellido:</label>
            <input type="text" name="S_Apellido" class="form-control"  placeholder="Digite su segundo apellido" maxlength="20" oninput="validateText(this)">
        </div>
        <div class="form-group">
            <label for="Contrasena">Contraseña:</label>
            <div class="input-group">
                <input type="password" name="Contrasena" id="password" class="form-control" placeholder="Digite su contraseña" required maxlength="20" oninput="validateAlphaNumeric(this)">
                <button class="btn btn-outline-secondary border-0" type="button" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                                </button>
            </div>
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Crear</button>
            <a href="administradores_controller.php" class="btn btn-primary mb-2 w-20">Volver al inicio</a>
        </div>
    </form>
</div>

</body>
</html>
