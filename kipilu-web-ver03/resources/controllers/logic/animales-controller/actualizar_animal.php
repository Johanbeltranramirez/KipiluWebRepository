<?php
include '../db.php';

$mensaje = "";
$clase_estilo = "";

// Obtener todas las razas disponibles
$sql_razas = "SELECT * FROM Razas";
$resultado_razas = $conexion->query($sql_razas);
$razas = array();

if ($resultado_razas && $resultado_razas->num_rows > 0) {
    while ($row = $resultado_razas->fetch_assoc()) {
        $razas[] = $row;
    }
}

// Función para obtener los datos de un animal por su ID_Animal
function obtenerAnimalPorID($id) {
    global $conexion;
    $sql = "SELECT * FROM Animales WHERE ID_Animal = '$id'";
    $resultado = $conexion->query($sql);
    return ($resultado->num_rows > 0) ? $resultado->fetch_assoc() : null;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID_Animal = $_POST['ID_Animal'];
    $Nombre_Animal = $_POST['Nombre_Animal'];
    $Raza = $_POST['Razas'];
    $Sexo = $_POST['Sexo'];
    $Foto = $_POST['Foto']; // Se obtiene la ruta de la imagen desde el campo de texto
    $Descripcion = $_POST['Descripcion'];
    $Especie_Animal = $_POST['Especie_Animal'];
    $Estado_Animal = $_POST['Estado_Animal'];

    $sql_actualizar = "UPDATE Animales SET Nombre_Animal='$Nombre_Animal', Razas='$Raza', Sexo='$Sexo', Foto='$Foto', Descripcion='$Descripcion', Especie_Animal='$Especie_Animal', Estado_Animal='$Estado_Animal' WHERE ID_Animal='$ID_Animal'";

    if ($conexion->query($sql_actualizar) === TRUE) {
        $mensaje = "Animal actualizado con éxito.";
        $clase_estilo = "mensaje-exito";
    } else {
        $mensaje = "Error al actualizar el animal: " . $conexion->error;
        $clase_estilo = "mensaje-error";
    }
}

// ID del animal a actualizar (pasado a través de la URL)
$animalID = $_GET['ID'];

// Obtener los datos del animal por su ID
$animalActual = obtenerAnimalPorID($animalID);

if (!$animalActual) {
    // Manejar el caso en el que no se encuentre un animal con el ID proporcionado
    die("Animal no encontrado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD ANIMALES Actualizar Animal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!--FIN DE AÑADIR PARA QUE APAREZCA EL MENSAJE-->
    <link rel="icon" href="../img/logo.ico">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--MENU-->
    <link rel="stylesheet" href="../CRUD/men_fot.css">    
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
</head>
<body>
    <!--Nav(navegacion)-->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
                    <a class="nav-link" href="leer_animal.php" role="button">
                        CRUD Animales
                    </a>
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
        <h2>Actualizar Animal</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="ID_Animal" value="<?php echo $animalActual['ID_Animal']; ?>">
            
            <div class="form-group">
                <label for="Nombre_Animal">Nombre del Animal:</label>
                <input type="text" name="Nombre_Animal" class="form-control" value="<?php echo $animalActual['Nombre_Animal']; ?>">
            </div>

            <div class="form-group">
                <label for="Razas">Raza:</label>
                <select name="Razas" class="form-control">
                    <?php foreach ($razas as $raza) { ?>
                        <option value="<?php echo $raza['ID_Raza']; ?>" <?php echo ($raza['ID_Raza'] == $animalActual['Razas']) ? 'selected' : ''; ?>><?php echo $raza['Nombre_Raza']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="Sexo">Sexo del Animal:</label>
                <select name="Sexo" class="form-control">
                    <option value="1" <?php echo ($animalActual['Sexo'] == 1) ? "selected" : ""; ?>>Hembra</option>
                    <option value="2" <?php echo ($animalActual['Sexo'] == 2) ? "selected" : ""; ?>>Macho</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Foto">Foto del Animal:</label>
                <input type="text" name="Foto" class="form-control" value="<?php echo $animalActual['Foto']; ?>">
                <img src="<?php echo $animalActual['Foto']; ?>" alt="Foto actual" width="100" height="100">
            </div>

            <div class="form-group">
                <label for="Descripcion">Descripción:</label>
                <textarea name="Descripcion" class="form-control" rows="3"  maxlength="300"><?php echo $animalActual['Descripcion']; ?></textarea>
            </div>

            <div class="form-group">
                <label for="Especie_Animal">Especie del Animal:</label>
                <select name="Especie_Animal" class="form-control">
                    <option value="1" <?php echo ($animalActual['Especie_Animal'] == 1) ? "selected" : ""; ?>>Canino</option>
                    <option value="2" <?php echo ($animalActual['Especie_Animal'] == 2) ? "selected" : ""; ?>>Felino</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Estado_Animal">Estado del Animal:</label>
                <select name="Estado_Animal" class="form-control">
                    <option value="1" <?php echo ($animalActual['Estado_Animal'] == 1) ? "selected" : ""; ?>>Adoptado</option>
                    <option value="2" <?php echo ($animalActual['Estado_Animal'] == 2) ? "selected" : ""; ?>>No adoptado</option>
                    <option value="3" <?php echo ($animalActual['Estado_Animal'] == 3) ? "selected" : ""; ?>>En proceso</option>
                </select>
            </div>

            <button type="submit" class="btn custom-button btn-block">Actualizar Animal</button>
            <a href="leer_animal.php" class="btn custom-button btn-block">Volver</a>

            <div class="<?php echo $clase_estilo; ?>"><?php echo $mensaje; ?></div>
        </form>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
