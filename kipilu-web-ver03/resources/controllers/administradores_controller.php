<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ADMINISTRADORES Leer Administradores</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/administrador_controller.css">
     <img rel="icon" href="../../assets/icon/admin_icon.png">
    <!--BOOTSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container">
    <div class="title">Lista de administradores</div>
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="administradores_controller.php" method="GET" class="custom-search-form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="administrador_id" name="administrador_id">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        <a href="administradores_controller.php" class="btn btn-outline-secondary" type="button">Cerrar búsqueda</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    require_once 'logic/administradores-controller/viewModel_leer_id.php';

    $message = null;

    if (isset($_GET['administrador_id'])) {
        $administradorId = $_GET['administrador_id'];

        $viewModel = new AdministradorSearchViewModel('http://192.168.10.14:3000/api/');
        $administradorData = $viewModel->fetchAdministrador($administradorId);

        if ($administradorData) {
            echo '<div class="title">Detalles del administrador</div>';
            echo '<table class="administrador-table">'; // Aquí se cambió la clase a "administrador-table"
            echo '<tr><th>ID Administrador</th><th>Primer Nombre</th><th>Segundo Nombre</th><th>Primer Apellido</th><th>Segundo Apellido</th><th>Acciones</th></tr>';
            echo '<tr>';
            echo '<td>' . $administradorData->ID_Administrador . '</td>';
            echo '<td>' . $administradorData->P_Nombre . '</td>';
            echo '<td>' . $administradorData->S_Nombre . '</td>';
            echo '<td>' . $administradorData->P_Apellido . '</td>';
            echo '<td>' . $administradorData->S_Apellido . '</td>';
            echo '<td>';
            echo '<a href="editar_administrador.php?id=' . $administradorData->ID_Administrador . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/administradores-controller/viewModel_eliminar.php?administradorId=' . $administradorData->ID_Administrador . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';
        } else {
            $message = [
                'type' => 'danger',
                'text' => 'Lo sentimos, no se encontró ningún administrador con el ID especificado o hubo un error al procesar la solicitud.'
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

    <br>
    <br>
    
    <div class="botones">
        <a href="crear_administrador.php" class="btn btn-success mb-2">Agregar administrador</a>
    </div>

    <?php
    require_once 'logic/administradores-controller/viewModel_leer.php';

    // Instancia del ViewModel de los administradores
    $viewModel_Leer = new AdministradorViewModel();

    // Obtener los administradores
    $administradores = $viewModel_Leer->fetchAdministradores();

    // Si hay administradores, puedes mostrarlos en la vista
    if (!empty($administradores)) {
        echo '<table class="administrador-table">'; // Aquí se cambió la clase a "administrador-table"
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID_Administrador</th>';
        echo '<th>Primer Nombre</th>';
        echo '<th>Segundo Nombre</th>';
        echo '<th>Primer Apellido</th>';
        echo '<th>Segundo Apellido</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($administradores as $administrador) {
            echo '<tr>';
            echo '<td>' . $administrador->ID_Administrador . '</td>';
            echo '<td>' . $administrador->P_Nombre . '</td>';
            echo '<td>' . $administrador->S_Nombre . '</td>';
            echo '<td>' . $administrador->P_Apellido . '</td>';
            echo '<td>' . $administrador->S_Apellido . '</td>';
            echo '<td>';
            echo '<a href="editar_administrador.php?id=' . $administrador->ID_Administrador . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/administradores-controller/viewModel_eliminar.php?administradorId=' . $administrador->ID_Administrador . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='text-center'>No se encontraron administradores.</p>";
    }
    ?>

</div>
<br>
</body>
</html>

