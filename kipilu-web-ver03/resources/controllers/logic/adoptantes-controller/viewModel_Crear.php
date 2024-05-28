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
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($adoptanteData));

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
    $apiUrl = 'https://kipilubackendrepository-2.onrender.com/api'; // Reemplaza 'puerto' con el puerto de tu API

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
        'Telefono' => $_POST["Telefono"]
    );

    // Crear el nuevo adoptante y obtener el resultado
    $resultado = $adoptantesViewModel->createAdoptante($adoptanteData);

    // Verificar si el adoptante se creó correctamente
    if ($resultado) {
        // Obtener los datos del formulario del POST
        $formData = array(
            'Adoptante' => $_POST["ID_Adoptante"],
            'Animal' => $_POST["ID_Animal"]
        );

        // Inicializar cURL para el formulario
        $curlFormulario = curl_init();

        // Configurar opciones de cURL para el formulario
        curl_setopt($curlFormulario, CURLOPT_URL, $apiUrl . '/formularios/create');
        curl_setopt($curlFormulario, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlFormulario, CURLOPT_POST, true);
        curl_setopt($curlFormulario, CURLOPT_POSTFIELDS, http_build_query($formData));

        // Ejecutar la solicitud cURL para el formulario
        $responseFormulario = curl_exec($curlFormulario);

        // Verificar si hubo algún error en la solicitud del formulario
        if ($responseFormulario === false) {
            echo 'ERROR al crear el formulario: ' . curl_error($curlFormulario);
        } else {
            // Decodificar la respuesta JSON del formulario
            $formularioData = json_decode($responseFormulario, true);

            // Cerrar la sesión cURL del formulario
            curl_close($curlFormulario);

            // Verificar si se creó correctamente el formulario
            if (isset($formularioData['success']) && $formularioData['success'] === true) {
                // Obtener el ID del animal para cambiar su estado
                $animalId = $_POST["ID_Animal"];

                // Inicializar cURL para cambiar el estado del animal
                $curlCambiarEstado = curl_init();

                // Configurar opciones de cURL para cambiar el estado del animal
                curl_setopt($curlCambiarEstado, CURLOPT_URL, $apiUrl . '/animales/cambiarEstado/' . $animalId);
                curl_setopt($curlCambiarEstado, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curlCambiarEstado, CURLOPT_CUSTOMREQUEST, 'PUT');
                // Puedes enviar datos adicionales si es necesario en el cuerpo de la solicitud

                // Ejecutar la solicitud cURL para cambiar el estado del animal
                $responseCambiarEstado = curl_exec($curlCambiarEstado);

                // Verificar si hubo algún error al cambiar el estado del animal
                if ($responseCambiarEstado === false) {
                    echo 'ERROR al cambiar el estado del animal: ' . curl_error($curlCambiarEstado);
                } else {
                    // Decodificar la respuesta JSON del cambio de estado del animal
                    $cambiarEstadoData = json_decode($responseCambiarEstado, true);

                    // Cerrar la sesión cURL del cambio de estado del animal
                    curl_close($curlCambiarEstado);

                    // Verificar si se cambió correctamente el estado del animal
                    if (isset($cambiarEstadoData['success']) && $cambiarEstadoData['success'] === true) {
                        echo json_encode(array("success" => true));
                    } else {
                        echo json_encode(array("success" => false, "message" => "Error al cambiar el estado del animal."));
                    }
                }
            } else {
                echo json_encode(array("success" => false, "message" => $formularioData['message']));
            }
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Error al crear el adoptante."));
    }
}
?>
