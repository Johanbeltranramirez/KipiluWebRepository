<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KIPILU - CRUD ADOPTS Listado</title>
    <!-- BOOSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- MENU -->
    <link rel="stylesheet" href="styles.css">
     <!--PROPIO-->
     <link rel="stylesheet" href="../css/controllers_styles/adoptantes_controller.css">
    <link rel="icon" href="../../assets/icon/logo.ico">

</head>

<body>
    <!--Nav(navegacion)-->
 <!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

</section>
<br>

<div class="container">
    <div class="title">Lista de adoptantes</div>
    <br>
    <div class="row">
        <div class="col-md-6">
        <form action="adoptantes_controller.php" method="GET" class="custom-search-form">
          <div class="input-group mb-3">
           <input type="text" class="form-control" placeholder="Buscar por ID" id="adoptante_id" name="adoptante_id" maxlength="10">
             <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            <a href="adoptantes_controller.php" class="btn btn-outline-secondary" type="button">Cerrar búsqueda</a>
        </div>
    </div>
</form>

<?php
require_once 'logic/adoptantes-controller/viewModel_Leer_id.php';

$message = null;

if (isset($_GET['adoptante_id'])) {
    $adoptanteId = $_GET['adoptante_id'];

    $viewModel = new AdoptanteSearchViewModel('http://192.168.10.14:3000/api/');
    $adoptanteData = $viewModel->fetchAdoptante($adoptanteId);

    

    if ($adoptanteData) {
        echo '<h2>Detalles del adoptante:</h2>';
        echo '<table class="adoptantes-table">';
        echo "<tr>";
        echo "<th>ID_Adoptante</th>";
        echo "<th>P_Nombre</th>";
        echo "<th>S_Nombre</th>";
        echo "<th>P_Apellido</th>";
        echo "<th>S_Apellido</th>";
        echo "<th>Correo</th>";
        echo "<th>Direccion</th>";
        echo "<th>Telefono</th>";
        echo "<th>Acciones</th>";
        echo "</tr>";
        echo '<td>' . $adoptanteData->ID_Adoptante . '</td>';
        echo '<td>' . $adoptanteData->P_Nombre . '</td>';
        echo '<td>' . $adoptanteData->S_Nombre . '</td>';
        echo '<td>' . $adoptanteData->P_Apellido . '</td>';
        echo '<td>' . $adoptanteData->S_Apellido . '</td>';
        echo '<td>' . $adoptanteData->Correo . '</td>';
        echo '<td>' . $adoptanteData->Direccion . '</td>';
        echo '<td>' . $adoptanteData->Telefono . '</td>';
        echo '<td>';
        echo "<a href='editar_adoptantes.php?id=" .  $adoptanteData->ID_Adoptante . "' class='btn btn-warning mb-2 w-100'>Editar</a>";
        echo "<a href='logic/adoptantes-controller/viewModel_Eliminar.php?adoptanteId=" .  $adoptanteData->ID_Adoptante . "' class='btn btn-danger mb-2 w-100' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este adoptante?\")'>Eliminar</a></td>";
        echo '</td>';
        echo '</td>';
        echo '</tr>';
        echo '</table>';
        echo '<br>';
        echo '<br>';
    } else {
        $message = 'No se encontró ningún adoptante con el ID especificado.';
    }
}

if ($message) {
    echo '<p>' . $message . '</p>';
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

<script>
    function confirmar() {
        return confirm('¿Estás seguro de que deseas eliminar este adoptante?');
    }
</script>

  <!-- Botón para crear nuevo adoptante -->
  <div class="botones">
     <a href="crear_adoptantes.php" class="btn btn-success mb-2">Crear Nuevo Adoptante</a>
     </div>


    <?php

    require_once 'logic/adoptantes-controller/viewModel_Leer.php';

     // Instancia del ViewModel de los animales
     $viewModel_Leer = new AdoptantesViewModel();

     // Instancia del ViewModel de los adoptantes
    $adoptantes = $viewModel_Leer->fetchAdoptantes();

    if (!empty($adoptantes)) {
    echo '<table class="adoptantes-table">';
    echo "<tr>";
    echo "<th>ID_Adoptante</th>";
    echo "<th>P_Nombre</th>";
    echo "<th>S_Nombre</th>";
    echo "<th>P_Apellido</th>";
    echo "<th>S_Apellido</th>";
    echo "<th>Correo</th>";
    echo "<th>Direccion</th>";
    echo "<th>Telefono</th>";
    echo "<th>Acciones</th>";
    echo "</tr>";

    foreach ($adoptantes as $adoptante) {
        echo "<tr>";
        echo "<td>" . $adoptante->ID_Adoptante . "</td>";
        echo "<td>" . $adoptante->P_Nombre . "</td>";
        echo "<td>" . $adoptante->S_Nombre . "</td>";
        echo "<td>" . $adoptante->P_Apellido . "</td>";
        echo "<td>" . $adoptante->S_Apellido . "</td>";
        echo "<td>" . $adoptante->Correo . "</td>";
        echo "<td>" . $adoptante->Direccion . "</td>";
        echo "<td>" . $adoptante->Telefono . "</td>";
        echo "<td>";
        echo "<a href='editar_adoptantes.php?id=" . $adoptante->ID_Adoptante . "' class='btn btn-warning mb-2 w-100'>Editar</a>";
        echo "<a href='logic/adoptantes-controller/viewModel_Eliminar.php?adoptanteId=" . $adoptante->ID_Adoptante . "' class='btn btn-danger mb-2 w-100' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este adoptante?\")'>Eliminar</a></td>";
        echo "</tr>";
    }

    echo "</table>";
}

    ?>
</body>
</html>
