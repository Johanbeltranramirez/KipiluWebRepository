<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Buscar Adoptante por ID</title>
</head>
<body>


<form action="ejemplo.php" method="GET">
    <label for="adoptante_id">ID del Adoptante:</label>
    <input type="text" id="adoptante_id" name="adoptante_id">
    <button type="submit">Buscar</button>
</form>
<?php
require_once 'logic/adoptantes-controller/viewModel_Leer_id.php';

$message = null;

if (isset($_GET['adoptante_id'])) {
    $adoptanteId = $_GET['adoptante_id'];

    $viewModel = new AdoptanteSearchViewModel('http://192.168.137.1:3000/api/');
    $adoptanteData = $viewModel->fetchAdoptante($adoptanteId);

    if ($adoptanteData) {
        echo '<div>';
        echo '<h2>Detalles del adoptante:</h2>';
        echo '<p>ID: ' . $adoptanteData->ID_Adoptante . '</p>';
        echo '<p>Primer Nombre: ' . $adoptanteData->P_Nombre . '</p>';
        echo '<p>Segundo Nombre: ' . $adoptanteData->S_Nombre . '</p>';
        echo '<p>Primer Apellido: ' . $adoptanteData->P_Apellido . '</p>';
        echo '<p>Segundo Apellido: ' . $adoptanteData->S_Apellido . '</p>';
        echo '<p>Correo: ' . $adoptanteData->Correo . '</p>';
        echo '<p>Dirección: ' . $adoptanteData->Direccion . '</p>';
        echo '<p>Teléfono: ' . $adoptanteData->Telefono . '</p>';
        echo '</div>';
    } else {
        $message = 'No se encontró ningún adoptante con el ID especificado.';
    }
}

if ($message) {
    echo '<p>' . $message . '</p>';
}
?>

</body>
</html>
