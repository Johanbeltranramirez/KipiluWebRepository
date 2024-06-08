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
        header("Location: ../../menu_controllers_superAdmin.php");
        exit();
    } else {
        // Guardar el mensaje de error en una variable de sesión
        $_SESSION['error_message'] = $loginResult['message'] ?? 'Error desconocido al procesar la respuesta de la API.';
        // Redirigir de vuelta al formulario de inicio de sesión
        header("Location: superadmin.php");
        exit();
    }
}
?>
