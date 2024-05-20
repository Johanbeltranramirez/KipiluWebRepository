<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
    <title>KIPILU - CRUD Animales</title>
=======
    <title>KIPILU - CRUD ANIMALES Leer Animales</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>
>>>>>>> c971c2572b5f56a1be9e518fd548bfb42afd5250
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/animal_controller.css">
    <link rel="icon" href="../../assets/icon/logo.ico">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container">
    <div class="title">Lista de animales</div>

    <?php
    require_once 'logic/animales-controller/viewModel_leer.php';

    // Instancia del ViewModel de los animales
    $viewModel_Leer = new AnimalsViewModel();

    // Obtener los animales
    $animals = $viewModel_Leer->fetchAnimals();

    // Arrays de mapeo para los nombres
    $especies = [1 => 'Canino', 2 => 'Felino'];
    $sexos = [1 => 'Hembra', 2 => 'Macho'];
    $estados = [1 => 'Adoptado', 2 => 'No adoptado', 3 => 'En proceso'];

    // Si hay animales, puedes mostrarlos en la vista
    if (!empty($animals)) {
        echo '<table class="animal-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>ID_Animal</th>';
        echo '<th>Nombre del Animal</th>';
        echo '<th>Raza</th>';
        echo '<th>Sexo</th>';
        echo '<th>Foto</th>';
        echo '<th>Descripción</th>';
        echo '<th>Especie del Animal</th>';
        echo '<th>Estado del Animal</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($animals as $animal) {
            echo '<tr>';
            echo '<td>' . $animal->ID_Animal . '</td>';
            echo '<td>' . $animal->Nombre_Animal . '</td>';
            echo '<td>' . $animal->Raza . '</td>';
            echo '<td>' . $sexos[$animal->Sexo] . '</td>';
            echo '<td><img src="' . $animal->Foto . '" alt="Foto de ' . $animal->Nombre_Animal . '" style="max-width: 100px;"></td>';
            echo '<td>' . $animal->Descripcion . '</td>';
            echo '<td>' . $especies[$animal->Especie_Animal] . '</td>';
            echo '<td>' . $estados[$animal->Estado_Animal] . '</td>';
            echo '<td>';
            echo '<a href="editar.php?id=' . $animal->ID_Animal . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/animales-controller/viewModel_eliminar.php?animalId=' . $animal->ID_Animal . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='text-center'>No se encontraron animales.</p>";
    }
    ?>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
