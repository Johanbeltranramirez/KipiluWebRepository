<?php
include '../db.php';

$mensaje = "";
$clase_estilo = "";

function obtenerAdministradorPorID($id) {
    global $conexion;
    $sql = "SELECT * FROM Administradores WHERE ID_Administrador = '$id'";
    $resultado = $conexion->query($sql);
    return ($resultado->num_rows > 0) ? $resultado->fetch_assoc() : null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Administrador = $_POST['ID_Administrador'];
    $P_Nombre = $_POST['P_Nombre'];
    $S_Nombre = $_POST['S_Nombre'];
    $P_Apellido = $_POST['P_Apellido'];
    $S_Apellido = $_POST['S_Apellido'];
    $Contrasena = $_POST['Contrasena'];

    $sql_actualizar = "UPDATE Administradores SET P_Nombre='$P_Nombre', S_Nombre='$S_Nombre', P_Apellido='$P_Apellido', S_Apellido='$S_Apellido', Contrasena='$Contrasena' WHERE ID_Administrador='$ID_Administrador'";

    if ($conexion->query($sql_actualizar) === TRUE) {
        $mensaje = "Administrador actualizado con éxito.";
        $clase_estilo = "mensaje-exito";
    } else {
        $mensaje = "Error al actualizar el administrador: " . $conexion->error;
        $clase_estilo = "mensaje-error";
    }
}

$administradorID = $_GET['ID'];
$administradorActual = obtenerAdministradorPorID($administradorID);

if (!$administradorActual) {
    die("Administrador no encontrado.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>KIPILU - CRUD ADMIN Actualizar Datos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="men_fot.css">
    <style>
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
        }    </style>
</head>
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
          </li>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link" href="../CRUD_Adop/Adoptantes.php" role="button">
              CRUD Adoptante
            </a>
          </li>
          </li>
            <li class="nav-item dropdown">
            <a class="nav-link" href="../CRUD_FORMULARIO/CRUD_Formulario.php" role="button">
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
        <h2>Actualizar Administrador</h2>
         <form method="post">
            <input type="hidden" name="ID_Administrador" class="form-control" required maxlength="25" value="<?php echo $administradorActual['ID_Administrador']; ?>">
            
            <div class="form-group">
                <label for="P_Nombre">Primer Nombre:</label>
                <input type="text" name="P_Nombre" class="form-control" required maxlength="20" value="<?php echo $administradorActual['P_Nombre']; ?>">
            </div>

            <div class="form-group">
                <label for="S_Nombre">Segundo Nombre:</label>
                <input type="text" name="S_Nombre" class="form-control" required maxlength="20" value="<?php echo $administradorActual['S_Nombre']; ?>">
            </div>

            <div class="form-group">
                <label for="P_Apellido">Primer Apellido:</label>
                <input type="text" name="P_Apellido" class="form-control" required maxlength="20" value="<?php echo $administradorActual['P_Apellido']; ?>">
            </div>

            <div class="form-group">
                <label for="S_Apellido">Segundo Apellido:</label>
                <input type="text" name="S_Apellido" class="form-control" required maxlength="20" value="<?php echo $administradorActual['S_Apellido']; ?>">
            </div>

            <div class="form-group">
                <label for="Contrasena">Contraseña:</label>
                <input type="password" name="Contrasena"class="form-control" required maxlength="68" value="<?php echo $administradorActual['Contrasena']; ?>">
            </div>

            <button type="submit" class="btn custom-button btn-block">Actualizar</button>
            <a href="../inicio.php" class="btn custom-button btn-block">Volver</a>

            <div class="<?php echo $clase_estilo; ?>"><?php echo $mensaje; ?></div>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
