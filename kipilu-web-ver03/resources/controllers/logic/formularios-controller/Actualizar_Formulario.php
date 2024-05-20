<?php
include '../db.php';

// Inicializar variables
$mensaje = "";
$formulario = null;
$clase_estilo = ""; // Definir la variable $clase_estilo aquí

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $ID_Formulario = $_POST['ID_Formulario'];
    $ID_Administrador = $_POST['ID_Administrador'];
    $Validacion_donativo = $_POST['Validacion_donativo'];
    $Estado_solicitud = $_POST['Estado_solicitud'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE Formularios SET Administrador = '$ID_Administrador', Validacion_donativo = '$Validacion_donativo', Estado_solicitud = '$Estado_solicitud' WHERE ID_Formulario = '$ID_Formulario'";
    if ($conexion->query($sql) === TRUE) {
        $mensaje = "Formulario actualizado correctamente";
        $clase_estilo = "mensaje-exito"; // Asignar la clase para mensajes de éxito
    } else {
        $mensaje = "Error al actualizar el formulario: " . $conexion->error;
        $clase_estilo = "mensaje-error"; // Asignar la clase para mensajes de error
    }
}

// Verificar si se recibió el ID del formulario a actualizar
if (isset($_GET['ID_Formulario'])) {
    $ID_Formulario = $_GET['ID_Formulario'];
    // Obtener los datos del formulario para mostrar en el formulario de actualización
    $formulario = buscarPorID($ID_Formulario);
}

// Función para buscar por ID_Formulario
function buscarPorID($id) {
    global $conexion;
    $sql = "SELECT * FROM Formularios WHERE ID_Formulario = '$id'";
    $resultado = $conexion->query($sql);
    return ($resultado->num_rows > 0) ? $resultado->fetch_assoc() : null;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - actualizar formulario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!--BOOSTRAP-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/formActualizar_controller.css">

</head>

<body>
<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

  <div class="container custom-form">
    <h2>Actualizar Formulario</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="ID_Formulario" value="<?php echo isset($formulario['ID_Formulario']) ? $formulario['ID_Formulario'] : ''; ?>">
        <div class="form-group">
            <label for="ID_Administrador">ID Administrador:</label>
            <input type="text" class="form-control" id="Administrador" name="ID_Administrador" value="<?php echo isset($_POST['ID_Administrador']) ? $_POST['ID_Administrador'] : (isset($formulario['Administrador']) ? $formulario['Administrador'] : ''); ?>">
        </div>
        <div class="form-group">
            <label for="Adoptante">Adoptante:</label>
            <input type="text" class="form-control" id="Adoptante" name="Adoptante" value="<?php echo isset($_POST['Adoptante']) ? $_POST['Adoptante'] : (isset($formulario['Adoptante']) ? $formulario['Adoptante'] : ''); ?>" readonly>
        </div>

        <div class="form-group">
            <label for="Validacion_donativo">Validación Donativo:</label> 
            <select name="Validacion_donativo" id="Validacion_donativo" class="form-control">
    <option value="">Seleccione una opción</option>
    <option value="SI" <?php echo (isset($_POST['Validacion_donativo']) && $_POST['Validacion_donativo'] == 'SI') || (isset($formulario['Validacion_donativo']) && $formulario['Validacion_donativo'] == 'SI') ? 'selected' : ''; ?>>SI</option>
    <option value="NO" <?php echo (isset($_POST['Validacion_donativo']) && $_POST['Validacion_donativo'] == 'NO') || (isset($formulario['Validacion_donativo']) && $formulario['Validacion_donativo'] == 'NO') ? 'selected' : ''; ?>>NO</option>
    <option value="N/A" <?php echo (isset($_POST['Validacion_donativo']) && $_POST['Validacion_donativo'] == 'N/A') || (isset($formulario['Validacion_donativo']) && $formulario['Validacion_donativo'] == 'N/A') ? 'selected' : ''; ?>>N/A</option>
    <?php 
    if (isset($_POST['Validacion_donativo']) || isset($formulario['Validacion_donativo'])) {
        $valorSeleccionado = isset($_POST['Validacion_donativo']) ? $_POST['Validacion_donativo'] : $formulario['Validacion_donativo'];
        if (!in_array($valorSeleccionado, ['SI', 'NO', 'N/A'])) {
            echo '<option value="' . $valorSeleccionado . '" selected>' . $valorSeleccionado . '</option>';
        }
    } 
    ?>
</select>


        </div>

        <div class="form-group">
            <label for="Estado_solicitud">Estado de Solicitud:</label>
            <input type="text" class="form-control" id="Estado_solicitud" name="Estado_solicitud" value="<?php echo isset($_POST['Estado_solicitud']) ? $_POST['Estado_solicitud'] : (isset($formulario['Estado_solicitud']) ? $formulario['Estado_solicitud'] : ''); ?>">
        </div>
        <div class="form-group">
            <label for="ID_Animal">ID Animal:</label>
            <input type="text" class="form-control" id="ID_Animal" name="ID_Animal" value="<?php echo isset($_POST['ID_Animal']) ? $_POST['ID_Animal'] : (isset($formulario['Animal']) ? $formulario['Animal'] : ''); ?>" readonly>
        </div>
        <button type="submit" class="btn custom-button btn-block">Actualizar</button>
        <a href="CRUD_Formulario.php" class="btn custom-button btn-block">Volver</a>
    </form>
    <div class="<?php echo $clase_estilo; ?>"><?php echo $mensaje; ?></div>
</div>



</body>
</html>
