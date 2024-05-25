<?php

class Raza {
    public $ID_Raza;
    public $Nombre_Raza;
}

class RazasViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createRaza($nombreRaza) {
        try {
            // Datos a enviar para crear la raza
            $data = array(
                'Nombre_Raza' => $nombreRaza
            );

            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/razas/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $razaData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            // Verificar si se creó correctamente la raza
            if (isset($razaData['success']) && $razaData['success'] === true) {
                return true; // Raza creada correctamente
            } else {
                return false; // Error al crear la raza
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false; // Error al crear la raza
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'http://192.168.1.7:3000/api'; // Reemplaza 'puerto' con el puerto de tu API

    // Crear una instancia del ViewModel de Razas
    $razasViewModel = new RazasViewModel($apiUrl);

    // Obtener el nombre de la raza del formulario
    $nombreRaza = $_POST["nombreRaza"];

    // Crear la nueva raza y obtener el resultado
    $resultado = $razasViewModel->createRaza($nombreRaza);

    // Devolver el resultado al formulario
    echo json_encode(array("success" => $resultado));
    exit(); // Detener la ejecución del script
}

?>
