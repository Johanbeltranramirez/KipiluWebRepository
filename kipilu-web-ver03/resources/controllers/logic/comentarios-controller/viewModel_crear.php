<?php

class Comentarista {
    public $Nombre;
    public $Apellido; 
    public $Comentario;
}

class CommentsViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createComentarista($commentData) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/comentaristas/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($commentData));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $commentData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            // Verificar si se creó correctamente el comentario
            if (isset($commentData['success']) && $commentData['success'] === true) {
                return true; // Comentario creado correctamente
            } else {
                return false; // Error al crear el comentario
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false; // Error al crear el comentario
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'http://192.168.1.5:3000/api'; // Reemplaza 'puerto' 

    // Crear una instancia del ViewModel de Comentaristas
    $commentsViewModel = new CommentsViewModel($apiUrl);

    // Obtener los datos del formulario de comentarios
    $commentData = array(
        'Nombre' => $_POST["Nombre"],
        'Apellido' => $_POST["Apellido"],
        'Comentario' => $_POST["Comentario"]
    );

    // Crear el nuevo comentario y obtener el resultado
    $resultado = $commentsViewModel->createComentarista($commentData);

    // Devolver el resultado al formulario de comentarios
    echo json_encode(array("success" => $resultado));
    exit(); // Detener la ejecución del script
}

?>