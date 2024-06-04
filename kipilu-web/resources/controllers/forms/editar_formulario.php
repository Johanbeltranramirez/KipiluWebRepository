<?php
require_once '../logic/formularios-controller/viewModel_editar.php';

$viewModel = new FormularioUpdateViewModel();
$formulario = null; // Inicializamos la variable $formulario
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Definir las variables $IdForm y $FormData a partir de la entrada del formulario
    $IdForm = isset($_POST['formulario']) ? $_POST['formulario'] : null;
    $FormData = [
        'Adoptante' => $_POST['ID_Adoptante'],
        'Animal' => $_POST['ID_Animal'],
        'Validacion_donativo' => $_POST['Validacion_donativo'],
        'Estado_solicitud' => $_POST['Estado_solicitud'],
        'Administrador' => $_POST['Administrador']
    ];

    $success = $viewModel->updateFormulario($IdForm, $FormData); // Pasar $IdForm y $FormData como argumentos
    if ($success) {
        $message = ['type' => 'success', 'text' => 'El formulario se actualizó correctamente.'];
        $formulario = $viewModel->getFormularioById($IdForm); // Pasar $IdForm como argumento
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
    <link rel="icon" href="../../assets/icon/admin_icon.png">
    <title>KIPILU - CRUD FORMULARIOS Editar Formulario</title>
    <link rel="stylesheet" href="../../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<script>
function validateNumber(input) {
  // Elimina cualquier carácter que no sea número
  input.value = input.value.replace(/[^0-9]/g, '');
}
</script>

<div class="container mt-5">
    <h1 class="text-center">Editar Formulario</h1>
    <div id="notification" class="notification"></div>
<?php if ($formulario && isset($formulario['data'])): ?>
    <form id="formularioForm" method="POST" class="custom-form">
        <div class="form-group">
            <label for="formulario">ID_Formulario:</label>
            <input type="text" name="formulario" class="form-control" value="<?php echo isset($formulario['data']['ID_Formulario']) ? $formulario['data']['ID_Formulario'] : ''; ?>" maxlength="20" readonly>
        </div>
        <div class="form-group">
            <label for="ID_Animal">Animal:</label>
            <input type="text" name="ID_Animal" class="form-control" value="<?php echo isset($formulario['data']['ID_Animal']) ? $formulario['data']['ID_Animal'] : ''; ?>" required maxlength="20" readonly>
        </div>
        <div class="form-group">
            <label for="ID_Adoptante">Adoptante:</label>
            <input type="text" name="ID_Adoptante" class="form-control" value="<?php echo isset($formulario['data']['ID_Adoptante']) ? $formulario['data']['ID_Adoptante'] : ''; ?>" required maxlength="20" readonly>
        </div>
        <div class="form-group">
    <label for="Validacion_donativo">Validación_donativo:</label>
    <select name="Validacion_donativo" class="form-control" required>
        <option value="NA" <?php echo ($formulario['data']['Validacion_donativo'] == 'NA') ? 'selected' : ''; ?>>NA</option>
        <option value="NO" <?php echo ($formulario['data']['Validacion_donativo'] == 'NO') ? 'selected' : ''; ?>>NO</option>
        <option value="SI" <?php echo ($formulario['data']['Validacion_donativo'] == 'SI') ? 'selected' : ''; ?>>SI</option>
    </select>
</div>

        <div class="form-group">
            <label for="Estado_solicitud">Estado_solicitud:</label>
            <select name="Estado_solicitud" class="form-control" required>
                <option value="1" <?php echo ($formulario['data']['Estado_solicitud'] == 1) ? 'selected' : ''; ?>>Aprobado</option>
                <option value="2" <?php echo ($formulario['data']['Estado_solicitud'] == 2) ? 'selected' : ''; ?>>No aprobado</option>
                <option value="3" <?php echo ($formulario['data']['Estado_solicitud'] == 3) ? 'selected' : ''; ?>>Pendiente</option>
            </select>
        </div>
        <div class="form-group">
            <label for="Administrador">Administrador:</label>
            <input type="text" name="Administrador" class="form-control" value="<?php echo isset($formulario['data']['Administrador']) ? $formulario['data']['Administrador'] : ''; ?>" required maxlength="12" oninput="validateNumber(this)">
        </div>
        <br>
        <div class="mb-4">
            <button type="submit" class="btn btn-success mb-2 w-20">Actualizar</button>
            <a href="../formularios_controller.php" class="btn btn-secondary mb-2 w-20">Volver</a>
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

