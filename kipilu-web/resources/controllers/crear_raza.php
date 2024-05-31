<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ANIMALES Crear Raza</title>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('razaForm');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await fetch('logic/animales-controller/viewModel_crear_raza.php', {
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Error en la solicitud.');
                    }

                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', 'La raza se creó correctamente.');
                    } else {
                        showAlert('danger', 'Error al crear la raza.');
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

        function validateText(input) {
         // Elimina cualquier carácter que no sea letra o letra con tilde
         input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.]/g, '').replace(/\s+/g, '');
    }
    </script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Agregar Nueva Raza</h1>
    <form id="razaForm" action="logic/animales-controller/viewModel_crear_raza.php" method="POST" class="custom-form">
        <div class="form-group">
            <label for="nombreRaza">Nombre de la raza:</label>
            <input type="text" name="nombreRaza" class="form-control" required maxlength="20" oninput="validateText(this)">
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Crear Raza</button>
            <a href="animales_controller.php" class="btn btn-primary mb-2 w-20">Volver al inicio</a>
        </div>
    </form>
</div>

</body>
</html>
