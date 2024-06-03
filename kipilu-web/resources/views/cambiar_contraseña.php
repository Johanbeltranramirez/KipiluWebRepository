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
    <title>KIPILU - Iniciar Sesión Super Admin</title>
    <link rel="icon" href="img/logo.ico">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/cambiar_contraseña.css">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<script>
function validateText(input) {
  // Elimina cualquier carácter que no sea letra o letra con tilde
  input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.]/g, '');
}

function validateTextDes(input) {
  // Elimina cualquier carácter que no sea letra, letra con tilde, punto o coma
  input.value = input.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚüÜñÑ.,]/g, '');
}

function validateAlphaNumeric(input) {
  // Elimina cualquier carácter que no sea letra o número
  input.value = input.value.replace(/[^a-zA-Z0-9]/g, '');
}

function validateNumber(input) {
  // Elimina cualquier carácter que no sea número
  input.value = input.value.replace(/[^0-9]/g, '');

}

function togglePasswordVisibility() {
    const passwordField = document.getElementById("Contrasena");
    const passwordToggleIcon = document.getElementById("password-toggle-icon");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        passwordToggleIcon.classList.remove("fa-eye");
        passwordToggleIcon.classList.add("fa-eye-slash");
    } else {
        passwordField.type = "password";
        passwordToggleIcon.classList.remove("fa-eye-slash");
        passwordToggleIcon.classList.add("fa-eye");
    }
}


</script>

<body>
    <div class="login-container">
 
        <form action="../controllers/logic/Login/validar_login.php" method="post">  
             <h1 class="text-center" style="font-size: 150%;">Restablecer contraseña</h1>
    <div class="form-group">
        <label for="ID_Superadmin">ID Superadmin</label>
        <input type="text" name="ID_Superadmin" class="form-control" placeholder="Def..." required maxlength="12" oninput="validateAlphaNumeric(this)">
    </div>
    <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" class="form-control" placeholder="Digite su correo" required maxlength="20" title="Solo se permiten letras.">
    </div>
    <div class="form-group">
        <label for="Telefono">Teléfono</label>
        <input type="text" name="Telefono" class="form-control" placeholder="Digite su n° de teléfono" maxlength="20" oninput="validateNumber(this)">
    </div>
    <div class="mb-1">
                            <label for="Contrasena" class="form-label">Nueva contraseña</label>
                            <div class="input-group">
                                <input type="password" name="Contrasena" id="Contrasena" class="form-control" placeholder="Digite su contraseña nueva" required maxlength="20" oninput="validateAlphaNumeric(this)">
                                <button class="btn btn-outline-secondary border-0" type="button" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye" id="password-toggle-icon"></i>
                                </button>
                            </div>
            </div>
    <br>
    <div class="mb-4 d-flex justify-content-between"> 
    <input type="submit" value="Restablecer" class="me-2"></input>
    <a href="login_superAdmin.php" class="btn btn-secondary">Cancelar</a>
</div>
</form>
            <!-- Manejo de errores -->
            <?php if ($error_message): ?>
              <div class="alert alert-danger mt-3" role="alert" style="color: red;">
            <?php echo $error_message; ?>
              </div>
               <script>
                  setTimeout(() => {
                  document.querySelector('.alert-danger').remove();
                  }, 3500);
               </script>
             <?php endif; ?>

        </form>
    </div>
</body>
</html> 