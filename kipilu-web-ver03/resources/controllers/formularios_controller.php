<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/icon/logo.ico">
    <title>KIPILÚ - CRUD Formularios</title>
    <!--Eliminar-->
    <script defer src=".../js/Confirmar_Eliminar.js"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">-->
     <!--BOOSTRAP-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/formulario_controller.css">
</head>

<body>
<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container">
    <div class="title">Lista de Formularios</div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="formularios_controller.php" method="GET" class="custom-search-form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por ID de formulario" id="formulario_id" name="formulario_id" maxlength="5">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        <a href="formularios_controller.php" class="btn btn-outline-secondary" type="button">Cerrar búsqueda</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
    
<?php
require_once 'logic/formularios-controller/viewModel_leer_id.php';

$mensaje=null;

if (isset($_GET['formulario_id'])) {
    $formularioId = $_GET['formulario_id'];

    $viewModel = new FormularioSearchViewModel('http://192.168.2.34:3000/api/');
    $formData = $viewModel->fetchForm($formularioId);

    if ($formData) {
        echo '<div class="title">Detalles del formulario</div>';
        echo '<table class="formulario-table">';
        echo '<tr><th>ID</th><th>ID_Formulario</th><th>Adoptante</th><th>Animal</th><th>Validacion_donativo</th><th>Estado_solicitud</th><th>Administrador</th><th>Acciones</th></tr>';
        echo '<tr>';
        echo '<td>' . $formData->ID_Formulario . '</td>';
        echo '<td>' . $formData->Adoptante . '</td>';
        echo '<td>' . $formData->Animal . '</td>';
        echo '<td>' . $formData->Validacion_donativo . '</td>';
        echo '<td>' . $formData->Estado_solicitud . '</td>';
        echo '<td>' . $formData->Administrador . '</td>';
        echo '<td>';
        echo '<a href="editar_formulario.php?id=' . $formData->ID_Formulario . '" class="btn btn-warning mb-2 w-100">Editar</a>';
        echo '<a href="logic/formularios-controller/Eliminar_Formulario.php?formularioId=' . $formData->ID_Formulario . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
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

    
<!--FIN Datos búsqueda-->

<?php
    require_once 'logic/formularios-controller/viewModel_leer.php';

    // Instancia del ViewModel de los formulario
    $viewModel_leer = new FormsViewModel();

    // Obtener los formularios
    $forms = $viewModel_leer->fetchforms();

    // Si hay formularios, puedes mostrarlos en la vista
    if (!empty($forms)) {
        echo '<table class="formulario-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID_Formulario</th>';
        echo '<th>Adoptante</th>';
        echo '<th>Animal</th>';
        echo '<th>Validacion_donativo</th>';
        echo '<th>Estado_solicitud</th>';
        echo '<th>Administrador</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($forms as $form) {
            echo '<tr>';
            echo '<td>' . $form->ID_Formulario . '</td>';
            echo '<td>' . $form->Adoptante . '</td>';
            echo '<td>' . $form->Animal . '</td>';
            echo '<td>' . $form->Validacion_donativo . '</td>';
            echo '<td>' . $form->Estado_solicitud . '</td>';
            echo '<td>' . $form->Administrador . '</td>';
            echo '<td>';
            echo '<a href="editar_formulario.php?id=' . $form->ID_Formulario . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/formularios-controller/Eliminar_Formulario.php?formularioId=' . $form->ID_Formulario . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='text-center'>No se encontraron formularios.</p>";
    }
    ?>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>