<?php
// Iniciar la sesión
session_start();

// Destruir todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a inicio.php después de cerrar la sesión
header('Location: ../../../views/login_administrador.php');
exit();
?>
