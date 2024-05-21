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
            <div class="col-md-4">
                <!-- Campo de búsqueda -->
                <input type="text" class="form-control" placeholder="Buscar por ID" id="inputBusqueda">
            </div>
            <div class="col-md-4">
                <!-- Botón de búsqueda -->
                <button class="btn btn-primary btn-buscar btn-block">Buscar</button>
            </div>
        </div>
        <?php
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        require_once 'logic/animales-controller/viewModel_leer_id.php';
        // Instancia del ViewModel de los animales
        $viewModel_Leer_ID = new AnimalsViewModel();

        // Obtener el animal por su ID
        $animal = $viewModel_Leer_ID->fetchAnimalById($_GET['id']);

        // Arrays de mapeo para los nombres
        $especies = [1 => 'Canino', 2 => 'Felino'];
        $sexos = [1 => 'Hembra', 2 => 'Macho'];
        $estados = [1 => 'Adoptado', 2 => 'No adoptado', 3 => 'En proceso'];

        // Si se encontró el animal, mostrar los detalles
        if ($animal) {
            ?>
            <div class="animal-details">
                <div class="animal-info">
                    <strong>ID_Animal:</strong> <?php echo $animal->ID_Animal; ?><br>
                    <strong>Nombre del Animal:</strong> <?php echo $animal->Nombre_Animal; ?><br>
                    <strong>Raza:</strong> <?php echo $animal->Raza; ?><br>
                    <strong>Sexo:</strong> <?php echo $sexos[$animal->Sexo]; ?><br>
                    <strong>Foto:</strong> <img src="<?php echo $animal->Foto; ?>" alt="Foto de <?php echo $animal->Nombre_Animal; ?>" style="max-width: 100px;"><br>
                    <strong>Descripción:</strong> <?php echo $animal->Descripcion; ?><br>
                    <strong>Especie del Animal:</strong> <?php echo $especies[$animal->Especie_Animal]; ?><br>
                    <strong>Estado del Animal:</strong> <?php echo $estados[$animal->Estado_Animal]; ?><br>
                </div>
                <div class="animal-actions">
                    <a href="editar_animal.php?id=<?php echo $animal->ID_Animal; ?>" class="btn btn-warning mb-2 w-100">Editar</a>
                    <a href="logic/animales-controller/viewModel_eliminar.php?animalId=<?php echo $animal->ID_Animal; ?>" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>
                </div>
            </div>
            <?php
        } else {
            echo "<p class='text-center'>No se encontró ningún animal con el ID proporcionado.</p>";
        }
    }
    ?>
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
