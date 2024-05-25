<?php
include('./Data/Apikipilu.php');

$ID_Administrador = $_POST['ID_Administrador'];
$Contrasena = $_POST['Contrasena'];

if (empty($ID_Administrador) || empty($Contrasena)) {
    // Si falta el ID_Administrador o la contraseña, mostrar un error
    header("Location: ../index2.php?error=1");
    exit();
} else {
    // Realiza la consulta SQL para validar el inicio de sesión
    $consulta = "SELECT ID_Administrador, Contrasena FROM Administradores WHERE ID_Administrador='$ID_Administrador' AND Contrasena='$Contrasena'";
    $resultado = mysqli_query($conexion, $consulta);

    if (!$resultado) {
        // Si hay un error en la consulta, mostrar un error
        header("Location: ./login_administrador.php?error=2");
        exit();
    }

    $filas = mysqli_num_rows($resultado);

    if ($filas) {
        // Si las credenciales son correctas, redirigir al inicio.php
        header("Location: ../animales_controller.php");
    } else {
        // Si la contraseña es incorrecta, redirigir con un mensaje de error
        header("Location: ./login_administrador.php?error=3");
        // No se muestra el enlace/botón de recuperación de contraseña aquí, se mostrará en el formulario HTML
    }

    mysqli_free_result($resultado);
}

$conexion->close();
?>
