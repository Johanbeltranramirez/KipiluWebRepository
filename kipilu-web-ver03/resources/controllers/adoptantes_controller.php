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

    <h2>Buscar Adoptante:</h2>
    <form method="GET" action="">
        <input type="text" name="busqueda" placeholder="ID Adoptante">
        <input type="submit" value="Buscar">
    </form>
    <br>

    <?php

    require_once 'logic/adoptantes-controller/viewModel_Leer.php';

     // Instancia del ViewModel de los animales
     $viewModel_Leer = new AdoptantesViewModel();

     // Instancia del ViewModel de los adoptantes
    $adoptantes = $viewModel_Leer->fetchAdoptantes();

    if (!empty($adoptantes)) {
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>ID_Adoptante</th>";
    echo "<th>P_Nombre</th>";
    echo "<th>S_Nombre</th>";
    echo "<th>P_Apellido</th>";
    echo "<th>S_Apellido</th>";
    echo "<th>Correo</th>";
    echo "<th>Direccion</th>";
    echo "<th>Telefono</th>";
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
        echo "</tr>";
    }

    echo "</table>";
}

    ?>
</body>
</html>
