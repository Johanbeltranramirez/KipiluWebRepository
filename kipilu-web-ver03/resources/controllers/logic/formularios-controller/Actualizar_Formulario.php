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
    <!--MENU-->
    <link rel="stylesheet" href="../CRUD/men_fot.css">
    <link rel="stylesheet" href="../css/CRUD_Formulario.css">
    <link rel="icon" href="../img/logo.ico">
</head>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.moqups.com/repo/RcVv9o8gk5f8Hz4Wki2XL2f0Mk1m31mXY/O5QpC2m36fPw5o4uZ95k9h0k5QPsV3mXY/zWiZs3qNuM5h1edOQq3Tq2GH2Ie4Tuep.png?Expires=1695547097&Signature=Lzk9BcNcJ4rPddpMRw8lnAaFp3jOwotZd3JsW2m7YzRk7Pef6Wh8CdfrG-Jc8WsAch2kwTSS4hA5b3GfSsk8Jh47KkSAvI2Wb8LSk2Oc7MdrrN6u6E3XfL-IQeGv8Lkf2JsF2oLyck8ZwJGJu7x-MoPcdlV9xEKXshcZwbC4n~9PNN7f-DbsYF~5C17eJihFui~i-x6uXti-wc8qXlwioNqkW~JD1obDXm6yHk1G6Jc3k2u3-It86nkbP97yIlvK2D22ma9o1Uus3eX57Kuz9B5dJFyqRvqQYrF8s~uQYrc2DXDme78Gk1RQKQzjQFpBhLzXajvz~sW1RgqF1qalF9BCb22C3XnF7zFjGkwL~59pFMb9kAA__&Key-Pair-Id=K1TPUF1X6HKIYU');
            margin: 0;
            padding: 0;
        }

        .custom-form {
            max-width: 400px;
            margin: 45px auto; 
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        .custom-button {
            background-color: purple;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .mensaje-exito {
            color: #28a745;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }

        .mensaje-error {
            color: #dc3545;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
<body>
<!--Nav(navegacion)-->
<nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid" style="background-color:  #ffff;">
      <div class="d-flex justify-content-start align-items-center" style="background-color:  #ffff;">
        <img src="../CRUD/logo.ico" alt="Logo" style="max-height: 100px; margin-right: 10px;">
        <a class="navbar-brand custom-brand" href="index.php">HOGAR DE <br> RESCATE</a>

      </div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../inicio.php">CRUD Administrador</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../CRUD_ANIMAL/leer_animal.php" role="button">
              CRUD Animales
            </a>
            <li class="nav-item dropdown">
            <a class="nav-link" href="../CRUD_Adop/Adoptantes.php" role="button">
              CRUD Adoptante
            </a>
          </li>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link" href="CRUD_Formulario.php" role="button">
              CRUD Formulario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../CRUD_COMENTARIO/CRUD_Comentarios.php" role="button">
              CRUD Comentarios
            </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="cerrar_sesion.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

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
