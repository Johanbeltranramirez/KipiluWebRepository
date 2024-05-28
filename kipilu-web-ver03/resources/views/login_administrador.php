<?php
session_start();

// Obtener y mostrar el mensaje de error, si existe
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']); // Limpiar el mensaje de error después de mostrarlo

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Iniciar Sesión ADMIN</title>
    <link rel="icon" href="img/logo.ico">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/login_administrador.css">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login-container">
        <form action="../controllers/logic/Login/validar_login.php" method="post">
            <h2 style="text-align: center;">Iniciar Sesión</h2><br>
            <div class="input-container">
                <label for="ID_Administrador" style="color: #000000;">ID Administrador:</label>
                <input type="text" name="ID_Administrador" id="ID_Administrador" required>
            </div>
            <div class="input-container">
                <label for="Contrasena" style="color: #000000;">Contraseña:</label>
                <input type="password" name="Contrasena" id="Contrasena" required>
            </div>
            <input type="submit" value="Ingresar">
            <a href="inicio.php" class="btn btn-secondary mt-2" style="text-decoration: none; border-radius: 15px; width: 100%;">Volver al inicio</a>
            <!-- Manejo de errores -->
            <?php if ($error_message): ?>
              <div class="alert alert-danger mt-3" role="alert" style="color: red;">
            <?php echo $error_message; ?>
              </div>
               <script>
                  setTimeout(() => {
                  document.querySelector('.alert-danger').remove();
                  }, 3000);
               </script>
             <?php endif; ?>

        </form>
    </div>
</body>
</html>
