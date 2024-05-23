<?php
require_once 'logic/formularios-controller/viewModel_editar.php';

$viewModel = new FormularioUpdateViewModel();
$formulario = null; // Inicializamos la variable $formulario
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formularioData = [
        'Adoptante' => $_POST['Adoptante'],
        'Animal' => $_POST['Animal'],
        'Validacion_donativo' => $_POST['Validacion_donativo'],
        'Estado_solicitud' => $_POST['Estado_solicitud'],
        'Administrador' => $_POST['Administrador']
    ];

    $success = $viewModel->updateFormulario($formularioId, $formData); // Pasar $formularioId como argumento
    if ($success) {
        $message = ['type' => 'success', 'text' => 'El formulario se actualizó correctamente.'];
        $formulario = $viewModel->getFormularioById($formularioId); // Pasar $formularioId como argumento
    } else {
        $message = ['type' => 'danger', 'text' => 'Error al actualizar el formulario.'];
    }
} elseif (isset($_GET['id'])) {
    $formularioId = $_GET['id'];
    $formulario = $viewModel->getFormularioById($formularioId);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD FORMULARIOS Editar Formulario</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Editar Formulario</h1>
    <div id="notification" class="notification"></div>
<?php if ($formulario && isset($formulario['data'])): ?>
    <form id="formularioForm" method="POST" class="custom-form">
        <div class="form-group">
            <label for="formulario">formulario:</label>
            <input type="text" name="formulario" class="form-control" value="<?php echo isset($formulario['data']['formulario']) ? $formulario['data']['formulario'] : ''; ?>" maxlength="20">
        </div>
        <div class="form-group">
            <label for="Animal">Animal:</label>
            <input type="text" name="Animal" class="form-control" value="<?php echo isset($formulario['data']['Animal']) ? $formulario['data']['Animal'] : ''; ?>" required maxlength="20">
        </div>
        <div class="form-group">
            <label for="Adoptante">Adoptante:</label>
            <input type="text" name="Adoptante" class="form-control" value="<?php echo isset($formulario['data']['Adoptante']) ? $formulario['data']['Adoptante'] : ''; ?>" required maxlength="20">
        </div>
        <div class="form-group">
            <label for="Validacion_donativo">Validacion_donativo:</label>
            <input type="text" name="Validacion_donativo" class="form-control" value="<?php echo isset($formulario['data']['Validacion_donativo']) ? $formulario['data']['Validacion_donativo'] : ''; ?>">
            <select name="Validacion_donativo" class="form-control" required>
                    <option>Selecciona la validación del donativo</option>
                    <option value="1" <?php echo ($formulario['data']['Validacion_donativo'] == 1) ? 'selected' : ''; ?>>SI</option>
                    <option value="2" <?php echo ($formulario['data']['Validacion_donativo'] == 2) ? 'selected' : ''; ?>>NO</option>
                    <option value="3" <?php echo ($formulario['data']['Validacion_donativo'] == 3) ? 'selected' : ''; ?>>N/A</option>
        </div>
        <div class="form-group">
            <label for="Estado_solicitud">Estado_solicitud:</label>
            <input type="text" name="Estado_solicitud" class="form-control" value="<?php echo isset($formulario['data']['Estado_solicitud']) ? $formulario['data']['Estado_solicitud'] : ''; ?>">
            <select name="Estado_solicitud" class="form-control" required>
                    <option>Selecciona el estado de la solicitud</option>
                    <option value="1" <?php echo ($formulario['data']['Estado_solicitud'] == 1) ? 'selected' : ''; ?>>Rechazada</option>
                    <option value="2" <?php echo ($formulario['data']['Estado_solicitud'] == 2) ? 'selected' : ''; ?>>Aceptada</option>
                    <option value="3" <?php echo ($formulario['data']['Estado_solicitud'] == 3) ? 'selected' : ''; ?>>En proceso</option>
        </div>
        
        <div class="form-group">
            <label for="Administrador">Administrador:</label>
            <input type="text" name="Administrador" class="form-control" value="<?php echo isset($formulario['data']['Administrador']) ? $formulario['data']['Administrador'] : ''; ?>" required>
        </div>

        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Actualizar</button>
            <a href="formularios_controller.php" class="btn btn btn-secondary mb-2 w-20">Cancelar</a>
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
        No se encontró un formulario para editar.
    </div>
<?php endif; ?>

</div>

</body>
</html>
