<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ADOPTANTES Leer Adoptantes</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/adoptantes_controller.css">
     <link rel="icon" href="../../assets/icon/admin_icon.png">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container">
    <div class="title">Lista de adoptantes</div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="adoptantes_controller.php" method="GET" class="custom-search-form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="adoptante_id" name="adoptante_id">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        <a href="adoptantes_controller.php" class="btn btn-outline-secondary" type="button">Cerrar búsqueda</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
require_once 'logic/adoptantes-controller/viewModel_Leer_id.php';

$message = null;

if (isset($_GET['adoptante_id'])) {
    $adoptanteId = $_GET['adoptante_id'];

    $viewModel = new AdoptanteSearchViewModel('http://192.168.10.16:3000/api/');
    $adoptanteData = $viewModel->fetchAdoptante($adoptanteId);

    if ($adoptanteData) {
        echo '<div class="title">Detalles del adoptante</div>';
        echo '<table class="adoptantes-table">';
        echo '<tr><th>ID</th><th>Primer Nombre</th><th>Segundo Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Correo</th><th>Dirección</th><th>Teléfono</th><th>Acciones</th></tr>';
        echo '<tr>';
        echo '<td>' . $adoptanteData->ID_Adoptante . '</td>';
        echo '<td>' . $adoptanteData->P_Nombre . '</td>';
        echo '<td>' . $adoptanteData->S_Nombre . '</td>';
        echo '<td>' . $adoptanteData->P_Apellido . '</td>';
        echo '<td>' . $adoptanteData->S_Apellido . '</td>';
        echo '<td>' . $adoptanteData->Correo . '</td>';
        echo '<td>' . $adoptanteData->Direccion . '</td>';
        echo '<td>' . $adoptanteData->Telefono . '</td>';
        echo '<td>';
        echo '<a href="editar_adoptantes.php?id=' . $adoptanteData->ID_Adoptante . '" class="btn btn-warning mb-2 w-100">Editar</a>';
        echo '<a href="logic/adoptantes-controller/viewModel_Eliminar.php?adoptanteId=' . $adoptanteData->ID_Adoptante . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
        echo '</td>';
        echo '</tr>';
        echo '</table>';
    } else {
        $message = [
            'type' => 'danger',
            'text' => 'Lo sentimos, no se encontró ningún adoptante con el ID especificado o hubo un error al procesar la solicitud.'
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
<br>


<?php
require_once 'logic/adoptantes-controller/viewModel_Leer.php';

// Instancia del ViewModel de los adoptantes
$viewModel_Leer = new AdoptantesViewModel();

// Obtener los adoptantes
$adoptantes = $viewModel_Leer->fetchAdoptantes();

// Si hay adoptantes, mostrarlos en la vista
if (!empty($adoptantes)) {
    echo '<table class="adoptantes-table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Primer Nombre</th>';
    echo '<th>Segundo Nombre</th>';
    echo '<th>Primer Apellido</th>';
    echo '<th>Segundo Apellido</th>';
    echo '<th>Correo</th>';
    echo '<th>Dirección</th>';
    echo '<th>Teléfono</th>';
    echo '<th>Acciones</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($adoptantes as $adoptante) {
        echo '<tr>';
        echo '<td>' . $adoptante->ID_Adoptante . '</td>';
        echo '<td>' . $adoptante->P_Nombre . '</td>';
        echo '<td>' . $adoptante->S_Nombre . '</td>';
        echo '<td>' . $adoptante->P_Apellido . '</td>';
        echo '<td>' . $adoptante->S_Apellido . '</td>';
        echo '<td>' . $adoptante->Correo . '</td>';
        echo '<td>' . $adoptante->Direccion . '</td>';
        echo '<td>' . $adoptante->Telefono . '</td>';
        echo '<td>';
        echo '<a href="editar_adoptantes.php?id=' . $adoptante->ID_Adoptante . '" class="btn btn-warning mb-2 w-100">Editar</a>';
        echo '<a href="logic/adoptantes-controller/viewModel_Eliminar.php?adoptanteId=' . $adoptante->ID_Adoptante . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
        echo '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo "<p class='text-center'>No se encontraron adoptantes.</p>";
}
?>

</div>
<br>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
