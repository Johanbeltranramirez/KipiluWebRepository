<?php
session_start();

class LoginViewModelSuperAdmin {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function verifyCredentials($ID_Superadmin, $Contrasena) {
        try {
            // Datos a enviar en la solicitud POST
            $postData = array(
                'ID_Superadmin' => $ID_Superadmin,
                'Contrasena' => $Contrasena
            );

            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/api/superadmin/login');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception('Error cURL: ' . curl_error($curl));
            }

            // Registrar la respuesta de la API
            file_put_contents('api_response_log.txt', $response . PHP_EOL, FILE_APPEND);

            // Decodificar la respuesta JSON
            $loginResult = json_decode($response, true);

            // Verificar si la respuesta JSON es válida
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Error al decodificar la respuesta JSON: ' . json_last_error_msg());
            }

            // Cerrar la sesión cURL
            curl_close($curl);

            return $loginResult;
        } catch (Exception $e) {
            return array('success' => false, 'message' => $e->getMessage());
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'https://kipilubackendrepository-3.onrender.com'; // Reemplaza con la URL correcta de tu API

    // Crear una instancia del ViewModel de Login del Super Admin
    $loginViewModelSuperAdmin = new LoginViewModelSuperAdmin($apiUrl);

    // Obtener los datos del formulario
    $ID_Superadmin = $_POST["ID_Superadmin"];
    $Contrasena = $_POST["Contrasena"];

    // Verificar las credenciales
    $loginResult = $loginViewModelSuperAdmin->verifyCredentials($ID_Superadmin, $Contrasena);

    // Si las credenciales son correctas, redirigir a la página del super administrador
    if ($loginResult['success']) {
        header("Location: ../controllers_super_admin/administradores_controller.php");
        exit();
    } else {
        // Guardar el mensaje de error en una variable de sesión
        $_SESSION['error_message'] = $loginResult['message'] ?? 'Error desconocido al procesar la respuesta de la API.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - Iniciar Sesión SUPER ADMIN</title>
    <link rel="icon" href="img/logo.ico">
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/login_superadmin.css">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<script>
function validateAlphaNumeric(input) {
  // Elimina cualquier carácter que no sea letra o número
  input.value = input.value.replace(/[^0-9]/g, '');
}
</script>

<script>
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
        <a href="login_administrador.php" class="btn-admin">Admin</a>
            <a href="superadmin.php" class="btn-super-admin">Super Admin</a>
            <h2 style="text-align: center;">Iniciar Sesión Super Admin</h2><br>
            <div class="input-container">
                <label for="ID_Superadmin" style="color: #000000;">ID Super Admin:</label>
                <input type="text" name="ID_Superadmin" id="ID_Superadmin" placeholder="Ingrese su ID" maxlength="10" oninput="validateAlphaNumeric(this)">
            </div>
            <div class="mb-1">
                <label for="Contrasena" class="form-label">Contraseña</label>
                <div class="input-group">
                    <input type="password" name="Contrasena" id="Contrasena" class="form-control" placeholder="Digite su contraseña" required maxlength="20">
                    <button class="btn btn-outline-secondary border-0" type="button" onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye" id="password-toggle-icon"></i>
                    </button>
                </div>
            </div>
            <input type="submit" value="Ingresar">
            <a href="inicio.php" class="btn btn-secondary mt-2" style="text-decoration: none; border-radius: 15px; width: 100%;">Volver al inicio</a>
            <br>
            <br>
            <a href="cambiar_contraseña.php">¿Olvidó su Contraseña?</a>

            <!-- Manejo de errores -->
            <?php if (isset($_SESSION['error_message'])): ?>
                <div class="alert alert-danger mt-3" role="alert" style="color: red;">
                    <?php echo $_SESSION['error_message']; unset($_SESSION['error_message']); ?>
                </div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
