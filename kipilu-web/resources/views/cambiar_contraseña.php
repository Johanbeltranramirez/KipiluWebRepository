<?php
session_start();

// Incluir el ViewModel para reestablecer la contraseña del superadmin
require_once '../controllers_super_admin/logic/Login/cambiar_contraseña_superAdmin.php';

// Crear una instancia del ViewModel
$viewModel = new SuperadminPasswordResetViewModel();

// Manejar el envío del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $ID_Superadmin = $_POST['ID_Superadmin'];
    $Correo = $_POST['Correo'];
    $Telefono = $_POST['Telefono']; // Opcional, si se requiere en el backend
    $newPassword = $_POST['newPassword'];

    // Intentar reestablecer la contraseña del superadmin
    try {
        // Datos para reestablecer la contraseña
        $passwordData = [
            'ID_Superadmin' => $ID_Superadmin,
            'Correo' => $Correo,
            'Telefono' => $Telefono,
            'newPassword' => $newPassword
        ];

        // Llamar a la función del ViewModel para reestablecer la contraseña
        $response = $viewModel->resetSuperadminPassword($ID_Superadmin, $passwordData);

        // Manejar la respuesta
        if ($response['success']) {
            // Establecer una variable de sesión para indicar la actualización exitosa
            $_SESSION['success_message'] = "¡La contraseña se ha actualizado con éxito!";
            // Redirigir al login
            header("Location: cambiar_contraseña.php");
            exit();
        } else {
            // Hubo un error al reestablecer la contraseña
            $_SESSION['error_message'] = "Hubo un error al reestablecer la contraseña.";
        }
    } catch (Exception $e) {
        // Capturar cualquier excepción y mostrar un mensaje de error genérico
        $_SESSION['error_message'] = "Hubo un problema al procesar la solicitud. Por favor, inténtelo de nuevo.";
    }
}

// Obtener y mostrar el mensaje de error, si existe
$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
unset($_SESSION['error_message']); // Limpiar el mensaje de error después de mostrarlo
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Restablecer Contraseña Super Admin</title>
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
       <form action="" method="post">  
    <h1 class="text-center" style="font-size: 150%;">Restablecer contraseña</h1>
    <div class="form-group">
        <label for="ID_Superadmin">ID Superadmin</label>
        <input type="text" name="ID_Superadmin" class="form-control"  required>
    </div>
    <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" class="form-control"  required>
    </div>
    <div class="form-group">
        <label for="Telefono">Teléfono</label>
        <input type="text" name="Telefono" class="form-control">
    </div>
    <div class="mb-1">
        <label for="newPassword" class="form-label">Nueva contraseña</label>
        <input type="password" name="newPassword" class="form-control" required>
    </div>
    <br>
    <div class="button-container d-flex justify-content-between">
        <input type="submit" value="Restablecer" class="btn-submit"></input>
        <a href="superadmin.php" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
</div>

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

             <?php if (isset($_SESSION['success_message'])): ?>
    <script>
        // Mostrar una alerta de JavaScript con el mensaje de éxito
        alert("<?php echo $_SESSION['success_message']; ?>");
        // Eliminar la variable de sesión después de mostrar el mensaje
        <?php unset($_SESSION['success_message']); ?>
    </script>
<?php endif; ?>

        </form>
    </div>
</body>
</html> 
