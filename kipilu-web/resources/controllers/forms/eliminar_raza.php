<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Eliminar Raza</title>
    <!-- Estilos -->
    <link rel="stylesheet" href="../../css/controllers_styles/formulario_crear.css">
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById('eliminarRazaForm');
            const selectRaza = document.getElementById('selectRaza');

            // Cargar las razas disponibles al cargar la página
            fetchRazas();

            form.addEventListener('submit', async function(event) {
                event.preventDefault();

                const razaId = selectRaza.value;

                try {
                    const response = await fetch(`https://kipilubackendrepository-3.onrender.com/api/razas/${razaId}`, {
                        method: 'DELETE'
                    });

                    if (!response.ok) {
                        throw new Error('Error al eliminar la raza.');
                    }

                    const data = await response.json();

                    if (data.success) {
                        showAlert('success', 'Raza eliminada correctamente.');
                        // Actualizar las razas disponibles después de eliminar
                        fetchRazas();
                    } else {
                        showAlert('danger', 'Error al eliminar la raza.');
                    }
                } catch (error) {
                    showAlert('danger', 'Error al eliminar la raza.');
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

            async function fetchRazas() {
                try {
                    const response = await fetch('https://kipilubackendrepository-3.onrender.com/api/razas');
                    const data = await response.json();

                    if (data.success) {
                        populateRazasDropdown(data.data);
                    } else {
                        throw new Error('Error al obtener las razas.');
                    }
                } catch (error) {
                    showAlert('danger', 'Error al obtener las razas.');
                }
            }

            function populateRazasDropdown(razas) {
                selectRaza.innerHTML = ''; // Limpiar opciones anteriores

                // Agregar opción vacía
                const emptyOption = document.createElement('option');
                selectRaza.appendChild(emptyOption);

                razas.forEach(raza => {
                    const option = document.createElement('option');
                    option.value = raza.ID_Raza;
                    option.textContent = raza.Nombre_Raza;
                    selectRaza.appendChild(option);
                });
            }
        });
    </script>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Eliminar Raza</h1>
    <form id="eliminarRazaForm" action="#" method="POST" class="custom-form">
        <div class="form-group">
            <label for="selectRaza">Selecciona una raza:</label>
            <select id="selectRaza" name="selectRaza" class="form-select" required>
            </select>
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-danger mb-2 w-20">Eliminar Raza</button>
            <a href="../animales_controller.php" class="btn btn-primary mb-2 w-20">Volver</a>
        </div>
    </form>
</div>

</body>
</html>
