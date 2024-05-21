<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ANIMALES Leer Animales</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminarán los datos.');
        }
    </script>
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
    <br>
    <div class="row">
        <div class="col-md-6">
            <form action="animales_controller.php" method="GET" class="custom-search-form">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Buscar por ID" id="animal_id" name="animal_id">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                        <a href="animales_controller.php" class="btn btn-outline-secondary" type="button">Cerrar búsqueda</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php
    require_once 'logic/animales-controller/viewModel_leer_id.php';

    if (isset($_GET['animal_id'])) {
        $animalId = $_GET['animal_id'];

        $viewModel = new AnimalSearchViewModel('http://192.168.128.3:3000/api/');
        $animalData = $viewModel->fetchAnimal($animalId);

            // Arrays de mapeo para los nombres
        $especies = [1 => 'Canino', 2 => 'Felino'];
        $sexos = [1 => 'Hembra', 2 => 'Macho'];
        $estados = [1 => 'Adoptado', 2 => 'No adoptado', 3 => 'En proceso'];

        if ($animalData) {
            echo '<div class="title">Detalles del animal</div>';
            echo '<table class="animal-table">';
            echo '<tr><th>ID</th><th>Nombre</th><th>Raza</th><th>Sexo</th><th>Foto</th><th>Descripción</th><th>Especie</th><th>Estado</th><th>Acciones</th></tr>';
            echo '<tr>';
            echo '<td>' . $animalData->ID_Animal . '</td>';
            echo '<td>' . $animalData->Nombre_Animal . '</td>';
            echo '<td>' . $animalData->Raza . '</td>';
            echo '<td>' . $sexos[$animalData->Sexo]. '</td>';
            echo '<td><img src="' . $animalData->Foto . '" alt="Foto del Animal" style="max-width: 100px; max-height: 100px;"></td>';
            echo '<td class="descripcion-cell">' . $animalData->Descripcion . '</td>';
            echo '<td>' . $especies[$animalData->Especie_Animal] . '</td>';
            echo '<td>' . $estados[$animalData->Estado_Animal] . '</td>';
            echo '<td>';
            echo '<a href="editar_animal.php?id=' . $animalData->ID_Animal . '" class="btn btn-warning mb-2 w-100">Editar</a>';
            echo '<a href="logic/animales-controller/viewModel_eliminar.php?animalId=' . $animalData->ID_Animal . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
            echo '</table>';

        } else {
            // No se encontró ningún animal con el ID especificado
            echo '<div class="alert alert-danger mt-3" role="alert">';
            echo 'Lo sentimos, no se encontró ningún animal con el ID especificado, vuelva a intentar.';
            echo '</div>';
        }
    } 
    
    ?>
    
<!--FIN Datos búsqueda-->
    <br>
    <br>
    
     <div class="botones">
      <a href="crear_animal.php" class="btn btn-success mb-2" >Agregar animal</a>
      <a href="crear_raza.php" class="btn btn-success mb-2" >Agregar raza</a>
     </div>

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
            echo '<td class="descripcion-cell">' . $animal->Descripcion . '</td>';
            echo '<td>' . $especies[$animal->Especie_Animal] . '</td>';
            echo '<td>' . $estados[$animal->Estado_Animal] . '</td>';
            echo '<td>';
            echo '<a href="editar_animal.php?id=' . $animal->ID_Animal . '" class="btn btn-warning mb-2 w-100">Editar</a>';
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
<br>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
