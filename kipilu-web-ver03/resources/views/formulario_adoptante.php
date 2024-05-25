<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - Formulario Adopción</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('adoptanteForm');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await fetch('../controllers/logic/formularios-controller/crear_formulario.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Error en la solicitud.');
                    }

                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', 'El adoptante se creó correctamente.');
                    } else {
                        showAlert('danger', 'Error al crear el adoptante.');
                    }
                } catch (error) {
                    showAlert('danger', 'Error en la solicitud.');
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

<div class="container mt-5">
<h2 class="bienvenido">Bienvenid@</h2>
            <p>En este formulario podrá ingresar sus datos para validar su petición para adopción del animal seleccionado...</p>
    <div id="notification" class="notification"></div>
    <form id="adoptanteForm" method="POST" class="custom-form">
    <div class="form-group">
            <label for="P_Nombre">Cedula:</label>
            <input type="text" name="ID_Adoptante" class="form-control" required>
        <div class="form-group">
            <label for="P_Nombre">Primer Nombre:</label>
            <input type="text" name="P_Nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="S_Nombre">Segundo Nombre:</label>
            <input type="text" name="S_Nombre" class="form-control">
        </div>
        <div class="form-group">
            <label for="P_Apellido">Primer Apellido:</label>
            <input type="text" name="P_Apellido" class="form-control">
        </div>
        <div class="form-group">
            <label for="S_Apellido">Segundo Apellido:</label>
            <input type="text" name="S_Apellido" class="form-control">
        </div>
        <div class="form-group">
            <label for="Correo">Correo Electrónico:</label>
            <input type="email" name="Correo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Direccion">Dirección:</label>
            <input type="text" name="Direccion" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono:</label>
            <input type="tel" name="Telefono" class="form-control" required>
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Enviar</button>
            <a href="adoptantes_controller.php" class="btn btn-primary mb-2 w-20">Volver al inicio</a>
        </div>
    </form>
</div>

</body>
</html>