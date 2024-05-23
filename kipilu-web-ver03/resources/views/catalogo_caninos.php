<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Catálogo de Caninos</title>
    <link rel="icon" href="img/logo.ico">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="css/men_fot.css">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/catalogo_caninos.css">
    <!--LLAMAR ICONOS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu.php'; ?>
<!--Cierre Nav(navegacion)-->
<main>

<!--PORTADA-->
<div class="portadac">
        <div class="contenido">
            <div class="texto">
                <h1>Bienvenido al Catálogo de Caninos</h1>
                <p>Explora nuestra selección de perros en busca de un hogar.</p>
            </div>
            <div class="opciones">
                <h2>Características:</h2>
                <ul>
                    <li>Perros de diferentes razas disponibles</li>
                    <li>Información detallada sobre cada perro</li>
                    <li>Opciones de adopción</li>
                </ul>
            </div>
        </div>
    </div>
<!--FIN DE PORTADA-->

<!--LINEA-->
<section class="separador">
    <hr class="linea-roja">
    <h2 class="titulo-adoptar">ADOPTA, NO COMPRES</h2>
    <p class="texto-pequeno">Busca a tu amigo peludo que está en búsqueda de un hogar</p>
</section>
<!--FIN DE LINEA-->

<!--CATALOGO-->
<section class="catalogo">
    <?php
    // Especifica la especie deseada
    $especieId = 1; // 1 para Caninos

    // Cargar el ViewModel
    require_once '../controllers/logic/animales-controller/viewModel_leer_especie.php';

    // Crear una instancia del ViewModel
    $viewModel = new AnimalSearchViewModel('http://10.175.81.39:3000');

    // Arrays de mapeo para los nombres
    $sexos = [1 => 'Hembra', 2 => 'Macho'];
    $estados = [1 => 'Adoptado', 2 => 'No adoptado', 3 => 'En proceso'];

    // Obtener los animales por especie
    $animales = $viewModel->fetchAnimalsBySpecies($especieId);

    if ($animales) {
        echo '<div class="container mt-5">';
        echo '<div class="row">';
        foreach ($animales as $animal) {
            echo '<div class="col-md-4 mb-4">';
            echo '<div class="card">';
            echo '<div class="img-container">';
            echo '<img src="' . $animal->Foto . '" class="card-img-top" alt="' . $animal->Nombre_Animal . '">';
            echo '</div>';
            echo '<div class="card-body">';
            echo '<h5 class="card-title"><strong>' . $animal->Nombre_Animal . '</strong></h5>';
            echo '<p class="card-title"><strong>Raza:</strong> ' . $animal->Raza . '</p>';
            echo '<p class="card-title"><strong>Sexo:</strong> ' . $sexos[$animal->Sexo] . '</p>';
            echo '<p class="card-title"><strong>Estado:</strong> ' . $estados[$animal->Estado_Animal]  . '</p>';
            echo '<button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" data-descripcion="' . $animal->Descripcion . '">Saber más</button>';
            // Verificar el estado del animal y mostrar el botón correspondiente
            if ($animal->Estado_Animal === 3) {
                echo '<button type="button" class="btn btn-warning btn-sm w-100 mt-2 disabled">En proceso de adopción</button>';
            } elseif ($animal->Estado_Animal === 2) {
                echo '<a href="../views/formulario_adoptante.php" class="btn btn-primary btn-sm w-100 mt-2">Formulario de Adopción</a>';
            }
    
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</div>';
    } else {
        echo '<p class="col">No se encontraron animales de esta especie.</p>';
    }
    ?>
</section>
<!--FIN DE CATALOGO-->
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Descripción de tu nuevo compañero</h5>
      </div>
      <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
        <div id="descripcionAnimal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


</main>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>

<!--Footer(pie de pag)-->
<?php include '../reutilize/footer.php'; ?>
<!--FIN DE Footer(pie de pag)-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Fin Footer(pie de pag)-->
<!-- Script para manejar el modal -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    var myModal = document.getElementById('staticBackdrop');
    myModal.addEventListener('show.bs.modal', function (event) {
      var button = event.relatedTarget;
      var descripcion = button.getAttribute('data-descripcion');

      var modalContent = document.getElementById('descripcionAnimal');
      modalContent.innerHTML = descripcion;
    });
  });
</script>
</body>
</html>

