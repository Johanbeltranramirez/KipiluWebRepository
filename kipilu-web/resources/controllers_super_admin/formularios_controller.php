<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - CRUD Formularios</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>
    <!-- PROPIO -->
    <link rel="stylesheet" href="../css/controllers_styles/formularios_controller.css">
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<!-- Nav(navegacion) -->
<?php include '../reutilize/menu_controllers_super_admin.php'; ?>
<!-- Cierre Nav(navegacion) -->

<div class="container">
    <div class="title">Lista de formularios</div>
    <br>

    <div class="row">
        <div class="col-md-6">
            <form action="formularios_controller.php" method="GET" class="custom-search-form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="formulario_id" name="formulario_id">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        <a href="formularios_controller.php" class="btn btn-outline-secondary" type="button">Cerrar búsqueda</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    require_once 'logic/formularios-controller/viewModel_leer_id.php';

    $message = null;

    if (isset($_GET['formulario_id'])) {
        $formularioId = $_GET['formulario_id'];

        $viewModel = new FormularioSearchViewModel('http://192.168.1.7:3000/api/');
        $formData = $viewModel->fetchFormulario($formularioId);

        // Arrays de mapeo para los nombres
        $estados = [1 => 'Aprobado', 2 => 'No aprobado', 3 => 'Pendiente'];

        if ($formData) {
            echo '<div class="title">Detalles del formulario</div>';
            echo '<table class="formulario-table">';
            echo '<tr>
                    <th>ID_Formulario</th>
                    <th>Adoptante</th>
                    <th>Animal</th>
                    <th>Validación donativo</th>
                    <th>Estado solicitud</th>
                    <th>Administrador</th>
                    <th>Acciones</th>
                  </tr>';
            echo '<tr>';
            echo '<td>' . $formData->ID_Formulario . '</td>';
            echo '<td>' . $formData->ID_Adoptante . '</td>';
            echo '<td>' . $formData->ID_Animal . '</td>';
            echo '<td>' . $formData->Validacion_donativo . '</td>';
            echo '<td>' . $estados[$formData->Estado_solicitud] . '</td>';
            echo '<td>' . $formData->Administrador . '</td>';
            echo '<td>';
            echo '<a href="editar_formulario.php?id=' . $formData->ID_Formulario . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/formularios-controller/viewModel_eliminar.php?formularioId=' . $formData->ID_Formulario . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            $message = [
                'type' => 'danger',
                'text' => 'Lo sentimos, no se encontró ningún formulario con el ID especificado.'
            ];
        }
    }
    ?>

    <?php if (isset($message)): ?>
        <div class="alert alert-<?php echo $message['type']; ?> mt-3" role="alert">
            <?php echo $message['text']; ?>
            <script>
                setTimeout(() => {
                    document.querySelector('.alert').remove();
                }, 3000);
            </script>
        </div>
    <?php endif; ?>

    <!-- FIN Datos búsqueda -->
    <br>
    <?php
    require_once 'logic/formularios-controller/viewModel_leer.php';

    // Instancia del ViewModel de los formularios
    $viewModel_leer = new FormsViewModel();

    // Obtener los formularios
    $forms = $viewModel_leer->fetchforms();

    // Arrays de mapeo para los nombres
    $estados = [1 => 'Aprobado', 2 => 'No aprobado', 3 => 'Pendiente'];

    // Si hay formularios, puedes mostrarlos en la vista
    if (!empty($forms)) {
        echo '<table class="formulario-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID_Formulario</th>';
        echo '<th>Adoptante</th>';
        echo '<th>Animal</th>';
        echo '<th>Validación donativo</th>';
        echo '<th>Estado solicitud</th>';
        echo '<th>Administrador</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($forms as $form) {
            echo '<tr>';
            echo '<td>' . $form->ID_Formulario . '</td>';
            echo '<td>' . $form->ID_Adoptante . '</td>';
            echo '<td>' . $form->ID_Animal . '</td>';
            echo '<td>' . $form->Validacion_donativo . '</td>';
            echo '<td>' . $estados[$form->Estado_solicitud] . '</td>';
            echo '<td>' . $form->Administrador . '</td>';
            echo '<td>';
            echo '<a href="editar_formulario.php?id=' . $form->ID_Formulario . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/formularios-controller/viewModel_eliminar.php?formularioId=' . $form->ID_Formulario . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='text-center'>No se encontraron formularios.</p>";
    }
    ?>

</div>
<br>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

