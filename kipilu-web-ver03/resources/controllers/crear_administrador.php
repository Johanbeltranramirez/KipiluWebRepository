<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <title>KIPILU - CRUD ADMINISTRADORES Crear Administradores</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Agregar Nuevo Administrador</h1>
    <div id="notification" class="notification"></div>
    <form id="administradorForm" method="POST" class="custom-form">
        <div class="form-group">
            <label for="ID_Administrador">Cedula:</label>
            <input type="text" name="ID_Administrador" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="P_Nombre">Primer Nombre:</label>
            <input type="text" name="P_Nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="S_Nombre">Segundo Nombre:</label>
            <input type="text" name="S_Nombre" class="form-control" >
        </div>
        <div class="form-group">
            <label for="P_Apellido">Primer Apellido:</label>
            <input type="text" name="P_Apellido" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="S_Apellido">Segundo Apellido:</label>
            <input type="text" name="S_Apellido" class="form-control" >
        </div>
        <div class="form-group">
            <label for="Contrasena">Contraseña:</label>
            <input type="password" name="Contrasena" class="form-control" required>
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
