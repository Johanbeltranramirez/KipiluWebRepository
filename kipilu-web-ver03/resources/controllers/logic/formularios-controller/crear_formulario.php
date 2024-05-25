<?php
require_once '../../logic/adoptantes-controller/viewModel_Crear.php';

class Formulario {
    public $ID_Formulario;
    public $Adoptante;
    public $Animal;
    public $Validacion_donativo;
    public $Estado_solicitud;
    public $Administrador;
}

class FormulariosViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createFormulario($formData) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/users/formularios/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($adoptanteData));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $formData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            // Verificar si se creó correctamente el adoptante
            if (isset($formData['success']) && $formData['success'] === true) {
                return true; // Adoptante creado correctamente
            } else {
                return false; // Error al crear el adoptante
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false; // Error al crear el adoptante
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'http://192.168.128.3:3000/api'; // Reemplaza 'puerto' con el puerto de tu API

    // Crear una instancia del ViewModel de Adoptantes
    $formulariosViewModel = new FormulariosViewModel($apiUrl);

    // Obtener los datos del adoptante del formulario
    $formData = array(
        'ID_Adoptante' => $_POST["ID_Adoptante"],
        'P_Nombre' => $_POST["P_Nombre"],
        'S_Nombre' => $_POST["S_Nombre"],
        'P_Apellido' => $_POST["P_Apellido"],
        'S_Apellido' => $_POST["S_Apellido"],
        'Correo' => $_POST["Correo"],
        'Direccion' => $_POST["Direccion"],
        'Telefono' => $_POST["Telefono"]
    );

    // Crear el nuevo adoptante y obtener el resultado
    $resultado = $adoptantesViewModel->createAdoptante($adoptanteData);

    // Devolver el resultado al formulario
    echo json_encode(array("success" => $resultado));
    exit(); // Detener la ejecución del script
}
?>
