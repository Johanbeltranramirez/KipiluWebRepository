<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ANIMALES Editar Animal</title>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
<form method="post" enctype="multipart/form-data">
            <input type="hidden" name="ID_Animal" value="<?php echo $animalActual['ID_Animal']; ?>">
            
            <div class="form-group">
                <label for="Nombre_Animal">Nombre del Animal:</label>
                <input type="text" name="Nombre_Animal" class="form-control" value="<?php echo $animalActual['Nombre_Animal']; ?>">
            </div>

            <div class="form-group">
                <label for="Razas">Raza:</label>
                <select name="Razas" class="form-control">
                <?php
                require_once 'logic/animales-controller/viewModel_leer.php';
                $viewModel = new AnimalsViewModel('http://192.168.128.3:3000/api');
                $razas = $viewModel->fetchRazas();
                foreach ($razas as $raza) {
                    echo '<option value="' . $raza['ID_Raza'] . '">' . $raza['Nombre_Raza'] . '</option>';
                }
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="Sexo">Sexo del Animal:</label>
                <select name="Sexo" class="form-control">
                    <option value="1" <?php echo ($animalActual['Sexo'] == 1) ? "selected" : ""; ?>>Hembra</option>
                    <option value="2" <?php echo ($animalActual['Sexo'] == 2) ? "selected" : ""; ?>>Macho</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Foto">Foto del Animal:</label>
                <input type="text" name="Foto" class="form-control" value="<?php echo $animalActual['Foto']; ?>">
                <img src="<?php echo $animalActual['Foto']; ?>" alt="Foto actual" width="100" height="100">
            </div>

            <div class="form-group">
                <label for="Descripcion">Descripción:</label>
                <textarea name="Descripcion" class="form-control" rows="3"  maxlength="300"><?php echo $animalActual['Descripcion']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="Especie_Animal">Especie del Animal:</label>
                <select name="Especie_Animal" class="form-control">
                    <option value="1" <?php echo ($animalActual['Especie_Animal'] == 1) ? "selected" : ""; ?>>Canino</option>
                    <option value="2" <?php echo ($animalActual['Especie_Animal'] == 2) ? "selected" : ""; ?>>Felino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Estado_Animal">Estado del Animal:</label>
                <select name="Estado_Animal" class="form-control">
                    <option value="1" <?php echo ($animalActual['Estado_Animal'] == 1) ? "selected" : ""; ?>>Adoptado</option>
                    <option value="2" <?php echo ($animalActual['Estado_Animal'] == 2) ? "selected" : ""; ?>>No adoptado</option>
                    <option value="3" <?php echo ($animalActual['Estado_Animal'] == 3) ? "selected" : ""; ?>>En proceso</option>
                </select>
            </div>
            </div>

</body>
</html>
