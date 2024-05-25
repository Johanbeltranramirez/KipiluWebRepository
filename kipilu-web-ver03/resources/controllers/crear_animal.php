<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ANIMALES Crear Animal</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('animalForm');

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const formData = new FormData(form);

                try {
                    const response = await fetch('logic/animales-controller/viewModel_crear.php', { // Corregido: Nombre de archivo ViewModel corregido
                        method: 'POST',
                        body: formData
                    });

                    if (!response.ok) {
                        throw new Error('Error en la solicitud.');
                    }

                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', 'El animal se creó correctamente.');
                    } else {
                        showAlert('danger', 'Error al crear el animal.');
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

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Agregar Nuevo Animal</h1>
    <div id="notification" class="notification"></div>
    <form id="animalForm" method="POST" class="custom-form">
        <div class="form-group">
            <label for="Nombre_Animal">Nombre del Animal:</label>
            <input type="text" name="Nombre_Animal" class="form-control" required maxlength="20">
        </div>
        <div class="form-group">
            <label for="Razas">Raza:</label>
            <select name="Razas" class="form-control" required>
                <option>Selecciona una raza</option>
                <?php
                require_once 'logic/animales-controller/viewModel_leer.php';
                $viewModel = new AnimalsViewModel('http://192.168.1.7:3000/api');
                $razas = $viewModel->fetchRazas();
                foreach ($razas as $raza) {
                    echo '<option value="' . $raza['ID_Raza'] . '">' . $raza['Nombre_Raza'] . '</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Sexo">Sexo:</label>
            <select name="Sexo" class="form-control" required>
            <option>Selecciona un sexo</option>
                    <option value="1">Hembra</option>
                    <option value="2">Macho</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Foto">Foto del Animal (URL de firebase):</label>
            <input type="text" name="Foto" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Descripcion">Descripción:</label>
            <textarea name="Descripcion" class="form-control" rows="3" maxlength="300" required></textarea>
        </div>
        <div class="form-group">
            <label for="Especie_Animal">Especie del Animal:</label>
            <select name="Especie_Animal" class="form-control" required>
            <option>Selecciona una especie</option>
                    <option value="1">Canino</option>
                    <option value="2">Felino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Estado_Animal">Estado del Animal:</label>
            <select name="Estado_Animal" class="form-control" required>
            <option>Selecciona un estado</option>
                    <option value="1">Adoptado</option>
                    <option value="2">No adoptado</option>
                    <option value="3">En proceso</option>
            </select>
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Crear</button>
            <a href="animales_controller.php" class="btn btn-primary mb-2 w-20">Volver al inicio</a>
        </div>
    </form>
</div>

</body>
</html>
