<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Iniciar Sesión ADMIN</title>
    <link rel="icon" href="img/logo.ico">

     <!--PROPIO-->
     <link rel="stylesheet" href="../css/login_administrador.css">
</head>



</style><body>
    <div class="login-container">
        <form action="../../resources/views/logica_login/validar_login.php" method="post">
            <h2>Iniciar Sesión</h2><br>
            <div class="input-container">
                <label for="ID_Administrador" style="color: #000000;">ID Administrador:</label>
                <input type="text" name="ID_Administrador" id="ID_Administrador" required>
            </div>
            <div class="input-container">
                <label for="Contrasena" style="color: #000000;">Contraseña:</label>
                <input type="password" name="Contrasena" id="Contrasena" required>
            </div>
            <input type="submit" value="Ingresar">
            <br><br>
            <a href="inicio.php" class="boton" style="text-decoration: none;">Volver al inicio</a>

            <?php
                // Iniciar sesión si no está iniciada
                session_start();

                // Verificar si hay una sesión activa
                if (isset($_SESSION['ID_Administrador'])) {
                    // Si hay una sesión activa, redirigir al usuario a otra página
                    header("Location: administradores_controller.php");
                    exit;
                }

                // Mostrar mensajes de error si es necesario
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo '<div class="error-message">Debes ingresar tanto el ID_Administrador como la contraseña.</div>';
                } elseif (isset($_GET['error']) && $_GET['error'] == 3) {
                    echo '<div class="error-message">Credenciales incorrectas. Por favor, inténtalo de nuevo o actualiza tu contraseña.</div>';
                    echo '<br>';
                    echo '<a href="recuperar_contrasena.php" class="#" style="">Recuperar contraseña</a>';
                }
                ?>

            <script>
        // Verificar si la página se cargó nuevamente después de cerrar sesión
        if (window.history && window.history.pushState) {
            // Cambiar la URL en el historial del navegador
            window.history.pushState(null, null, window.location.href);
            window.onpopstate = function () {
                // Regresar a la página actual si el usuario intenta retroceder
                window.history.pushState(null, null, window.location.href);
            };
        }
        </script>

        </form>
    </div>
</body>
</html>
