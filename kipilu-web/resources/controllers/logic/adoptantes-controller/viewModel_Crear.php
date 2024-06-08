<?php
class Adoptante {
    public $ID_Adoptante;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
    public $Correo;
    public $Direccion;
    public $Telefono;
}

class AdoptantesViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createAdoptante($adoptanteData) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/users/adoptantes/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($adoptanteData));
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $adoptanteData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            // Verificar si se creó correctamente el adoptante
            if (isset($adoptanteData['success']) && $adoptanteData['success'] === true) {
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
    $apiUrl = 'https://kipilubackendrepository-3.onrender.com/api';

    // Crear una instancia del ViewModel de Adoptantes
    $adoptantesViewModel = new AdoptantesViewModel($apiUrl);

    // Obtener los datos del adoptante del formulario
    $adoptanteData = array(
        'ID_Adoptante' => $_POST["ID_Adoptante"],
        'P_Nombre' => $_POST["P_Nombre"],
        'S_Nombre' => $_POST["S_Nombre"],
        'P_Apellido' => $_POST["P_Apellido"],
        'S_Apellido' => $_POST["S_Apellido"],
        'Correo' => $_POST["Correo"],
        'Direccion' => $_POST["Direccion"],
        'Telefono' => $_POST["Telefono"],
        'ID_Animal' => $_POST["ID_Animal"]
    );

    // Crear el nuevo adoptante y obtener el resultado
    $resultado = $adoptantesViewModel->createAdoptante($adoptanteData);

    // Verificar si el adoptante se creó correctamente
    if ($resultado) {
        echo json_encode(array("success" => true));
    } else {
        echo json_encode(array("success" => false, "message" => "Error al crear el adoptante."));
    }
}
?>
