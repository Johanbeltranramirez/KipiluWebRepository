<?php
require_once 'logic/adoptantes-controller/viewModel_Editar.php';

$viewModel = new AdoptanteUpdateViewModel();
$adoptante = null; // Inicializamos la variable $adoptante
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adoptanteData = [
        'P_Nombre' => $_POST['P_Nombre'],
        'S_Nombre' => $_POST['S_Nombre'],
        'P_Apellido' => $_POST['P_Apellido'],
        'S_Apellido' => $_POST['S_Apellido'],
        'Correo' => $_POST['Correo'],
        'Direccion' => $_POST['Direccion'],
        'Telefono' => $_POST['Telefono']
    ];

    $success = $viewModel->updateAdoptante($adoptanteId, $adoptanteData); // Pasar $adoptanteId como argumento
    if ($success) {
        $message = ['type' => 'success', 'text' => 'El adoptante se actualizó correctamente.'];
        $adoptante = $viewModel->getAdoptanteById($adoptanteId); // Pasar $adoptanteId como argumento
    } else {
        $message = ['type' => 'danger', 'text' => 'Error al actualizar el adoptante.'];
    }
} elseif (isset($_GET['id'])) {
    $adoptanteId = $_GET['id'];
    $adoptante = $viewModel->getAdoptanteById($adoptanteId);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ADOPTS Editar Adoptante</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Editar Adoptante</h1>
    <div id="notification" class="notification"></div>
<?php if ($adoptante && isset($adoptante['data'])): ?>
    <form id="adoptanteForm" method="POST" class="custom-form">
        <div class="form-group">
            <label for="P_Nombre">Primer Nombre:</label>
            <input type="text" name="P_Nombre" class="form-control" value="<?php echo isset($adoptante['data']['P_Nombre']) ? $adoptante['data']['P_Nombre'] : ''; ?>" required maxlength="20">
        </div>
        <div class="form-group">
            <label for="S_Nombre">Segundo Nombre:</label>
            <input type="text" name="S_Nombre" class="form-control" value="<?php echo isset($adoptante['data']['S_Nombre']) ? $adoptante['data']['S_Nombre'] : ''; ?>" maxlength="20">
        </div>
        <div class="form-group">
            <label for="P_Apellido">Primer Apellido:</label>
            <input type="text" name="P_Apellido" class="form-control" value="<?php echo isset($adoptante['data']['P_Apellido']) ? $adoptante['data']['P_Apellido'] : ''; ?>" required maxlength="20">
        </div>
        <div class="form-group">
            <label for="S_Apellido">Segundo Apellido:</label>
            <input type="text" name="S_Apellido" class="form-control" value="<?php echo isset($adoptante['data']['S_Apellido']) ? $adoptante['data']['S_Apellido'] : ''; ?>" maxlength="20">
        </div>
        <div class="form-group">
            <label for="Correo">Correo Electrónico:</label>
            <input type="email" name="Correo" class="form-control" value="<?php echo isset($adoptante['data']['Correo']) ? $adoptante['data']['Correo'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="Direccion">Dirección:</label>
            <input type="text" name="Direccion" class="form-control" value="<?php echo isset($adoptante['data']['Direccion']) ? $adoptante['data']['Direccion'] : ''; ?>" required>
        </div>
        <div class="form-group">
            <label for="Telefono">Teléfono:</label>
            <input type="tel" name="Telefono" class="form-control" value="<?php echo isset($adoptante['data']['Telefono']) ? $adoptante['data']['Telefono'] : ''; ?>" required>
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Actualizar</button>
            <a href="adoptantes_controller.php" class="btn btn btn-secondary mb-2 w-20">Cancelar</a>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-<?php echo $message['type']; ?> mt-3" role="alert">
                <?php echo $message['text']; ?>
                <script>
                    setTimeout(() => {
                        document.querySelector('.alert').remove();
                    }, 3000);
                </script>
            </div>
        <?php endif; ?>
    </form>
<?php else: ?>
    <div class="alert alert-danger mt-3" role="alert">
        No se encontró el adoptante para editar.
    </div>
<?php endif; ?>

</div>

</body>
</html>
