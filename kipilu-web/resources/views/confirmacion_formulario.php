<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - ¡¡EXITO!!</title>
    <link rel="stylesheet" href="../css/form_adopcion.css">
    <link rel="icon" href="../../assets/icon/logo.png">
</head>
<body class="body">
<main>

<?php
include("../Apikipilu.php");

// Verificar si se recibió la respuesta del reCAPTCHA
if(isset($_POST['g-recaptcha-response'])){
    $captcha=$_POST['g-recaptcha-response'];
}

if(!$captcha){
    // Si no se proporcionó una respuesta válida para el reCAPTCHA, muestra un mensaje de error
    echo '<script>alert("Por favor, marque la casilla de reCAPTCHA antes de enviar el formulario.");</script>';
    echo '<script>window.history.back();</script>';
    exit();
}

if (isset($_POST['animal_id']) && isset($_POST['catalogo'])) {
    // Obtener los datos del formulario
    $animal_id = $_POST['animal_id'];
    $catalogo = $_POST['catalogo'];

    $conexion = new mysqli($host, $username, $password, $database);
    if (mysqli_connect_errno()) {
        echo "ERROR, FALLO AL CONECTAR CON LA BD";
        exit();
    }

    // Obtener datos del adoptante
    $ID_Adoptante = $_POST["ID_Adoptante"];
    $P_Nombre = $_POST["P_Nombre"];
    $S_Nombre = $_POST["S_Nombre"];
    $P_Apellido = $_POST["P_Apellido"];
    $S_Apellido = $_POST["S_Apellido"];
    $Correo = $_POST["Correo"];
    $Direccion = $_POST["Direccion"];
    $Telefono = $_POST["Telefono"];

    $consulta_existe_adoptante = "SELECT ID_Adoptante FROM Adoptantes WHERE ID_Adoptante = '$ID_Adoptante'";
    $resultado = mysqli_query($conexion, $consulta_existe_adoptante);

    // Verificar si el adoptante ya existe en la base de datos
    if (mysqli_num_rows($resultado) > 0) {
        // El adoptante ya existe, actualizar sus datos
        $consulta_actualizar_adoptante = "UPDATE Adoptantes SET P_Nombre = '$P_Nombre', S_Nombre = '$S_Nombre', P_Apellido = '$P_Apellido', S_Apellido = '$S_Apellido', Correo = '$Correo', Direccion = '$Direccion', Telefono = '$Telefono' WHERE ID_Adoptante = '$ID_Adoptante'";
        if (!mysqli_query($conexion, $consulta_actualizar_adoptante)) {
            echo "Error al actualizar datos del adoptante: " . mysqli_error($conexion);
            exit();
        }
    } else {
        // El adoptante no existe, insertar sus datos
        $consulta_adop = "INSERT INTO Adoptantes(ID_Adoptante, P_Nombre, S_Nombre, P_Apellido, S_Apellido, Correo, Direccion, Telefono)
            VALUES ('$ID_Adoptante', '$P_Nombre', '$S_Nombre', '$P_Apellido', '$S_Apellido', '$Correo', '$Direccion', '$Telefono')";

        if (!mysqli_query($conexion, $consulta_adop)) {
            echo "Error al insertar datos del adoptante: " . mysqli_error($conexion);
            exit();
        }
    }

    // Insertar datos del formulario en la tabla Formularios
    $consulta_Formu = "INSERT INTO Formularios(Adoptante, Animal, Validacion_donativo, Estado_solicitud, Administrador)
                VALUES ('$ID_Adoptante', $animal_id, 'N/A', 3, 'CC1027524883')";

    if (!mysqli_query($conexion, $consulta_Formu)) {
        echo "Error al insertar datos del formulario: " . mysqli_error($conexion);
        exit();
    }

    // Actualizar el estado del animal
    $consulta_anim = "UPDATE Animales SET Estado_Animal = '3' WHERE ID_Animal = '$animal_id'";
    if (!mysqli_query($conexion, $consulta_anim)) {
        echo "Error al actualizar estado del animal: " . mysqli_error($conexion);
        exit();
    }

    mysqli_close($conexion);

    // Mostrar mensaje de éxito
    echo "<div class='mensaje-container'>";
    echo "<h3>¡Estaremos revisando los
            datos, en máx 7 días hábiles.
            Gracias por tu apoyo!</h3>";
    echo "<a href='../Tips.php' class='btn'>Volver al Inicio</a>";
    echo "</div>";

    // Evitar que el usuario pueda volver atrás con el navegador
    echo '<script>
            if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
            }
          </script>';
} else {
    // Si no se recibieron los parámetros esperados, redirigir a una página de error o manejar el error de otra manera
    echo "<div class='mensaje-container'>";
    echo "<h3>¡Se ha producido un error inesperado!</h3>";
    echo "<a href='../Tips.php' class='btn'>Haz click para volver a los catálogos</a>";
    echo "</div>";
}
?>



</main>
</body>
</html>
