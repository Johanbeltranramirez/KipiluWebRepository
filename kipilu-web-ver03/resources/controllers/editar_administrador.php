<?php
require_once 'logic/administradores-controller/viewModel_editar.php';

$viewModel = new AdministradorUpdateViewModel();
$administrador = null; // Inicializamos la variable $administrador
$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $administradorData = [
        'ID_Administrador' => $_POST['ID_Administrador'],
        'P_Nombre' => $_POST['P_Nombre'],
        'S_Nombre' => $_POST['S_Nombre'],
        'P_Apellido' => $_POST['P_Apellido'],
        'S_Apellido' => $_POST['S_Apellido'],
        'Contrasena' => $_POST['Contrasena']
    ];

    $administradorId = $_POST['ID_Administrador']; // Obtenemos el ID del administrador del formulario
    $success = $viewModel->updateAdministrador($administradorId, $administradorData);
    if ($success) {
        $message = ['type' => 'success', 'text' => 'El administrador se actualizó correctamente.'];
        $administrador = $viewModel->getAdministradorById($administradorId);
    } else {
        $message = ['type' => 'danger', 'text' => 'Error al actualizar el administrador.'];
    }
} elseif (isset($_GET['id'])) {
    $administradorId = $_GET['id'];
    $administrador = $viewModel->getAdministradorById($administradorId);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ADMINISTRADOR Editar Administrador</title>
    <link rel="stylesheet" href="../css/controllers_styles/formulario_crear.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container mt-5">
    <h1 class="text-center">Editar Administrador</h1>
    <div id="notification" class="notification"></div>
    <?php if (isset($administrador['data'])): ?>
<form id="administradorForm" method="POST" class="custom-form">
<div class="form-group">
    <label for="ID_Administrador">Cedula</label>
    <input type="text" name="ID_Administrador" class="form-control" value="<?php echo isset($administrador['data']['ID_Administrador']) ? $administrador['data']['ID_Administrador'] : ''; ?>" required maxlength="20" readonly>
</div>
<div class="form-group">
    <label for="P_Nombre">Primer Nombre:</label>
    <input type="text" name="P_Nombre" class="form-control" value="<?php echo isset($administrador['data']['P_Nombre']) ? $administrador['data']['P_Nombre'] : ''; ?>" required maxlength="20">
</div>
<div class="form-group">
    <label for="S_Nombre">Segundo Nombre:</label>
    <input type="text" name="S_Nombre" class="form-control" value="<?php echo isset($administrador['data']['S_Nombre']) ? $administrador['data']['S_Nombre'] : ''; ?>" maxlength="20">
</div>
<div class="form-group">
    <label for="P_Apellido">Primer Apellido:</label>
    <input type="text" name="P_Apellido" class="form-control" value="<?php echo isset($administrador['data']['P_Apellido']) ? $administrador['data']['P_Apellido'] : ''; ?>" required maxlength="20">
</div>
<div class="form-group">
    <label for="S_Apellido">Segundo Apellido:</label>
    <input type="text" name="S_Apellido" class="form-control" value="<?php echo isset($administrador['data']['S_Apellido']) ? $administrador['data']['S_Apellido'] : ''; ?>" maxlength="20">
</div>
<div class="form-group">
    <label for="Contrasena">Contraseña:</label>
    <input type="text" name="Contrasena" class="form-control" value="<?php echo isset($administrador['data']['Contrasena']) ? $administrador['data']['Contrasena'] : ''; ?>" required>
</div>

    <br>
    <div class="mb-4">
        <button type="submit" class="btn btn-success mb-2 w-20">Actualizar</button>
        <a href="administradores_controller.php" class="btn btn btn-secondary mb-2 w-20">Volver al inicio</a>
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
    No se encontró el administrador para editar.
</div>
<?php endif; ?>

</div>

</body>
</html>