<?php
session_start();

class LoginViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function verifyCredentials($ID_Administrador, $Contrasena) {
        try {
            // Datos a enviar en la solicitud POST
            $postData = array(
                'ID_Administrador' => $ID_Administrador,
                'Contrasena' => $Contrasena
            );

            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/api/admin/login');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $loginResult = json_decode($response, true);

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

    // Crear una instancia del ViewModel de Login
    $loginViewModel = new LoginViewModel($apiUrl);

    // Obtener los datos del formulario
    $ID_Administrador = $_POST["ID_Administrador"];
    $Contrasena = $_POST["Contrasena"];

    // Verificar las credenciales
    $loginResult = $loginViewModel->verifyCredentials($ID_Administrador, $Contrasena);

    // Si las credenciales son correctas, redirigir a la página de administradores
    if ($loginResult['success']) {
        header("Location: ../../animales_controller.php");
        exit();
    } else {
        // Guardar el mensaje de error en una variable de sesión
        $_SESSION['error_message'] = $loginResult['message'];
        // Redirigir de vuelta al formulario de inicio de sesión
        header("Location: ../../../views/login_administrador.php");
        exit();
    }
}
?>
