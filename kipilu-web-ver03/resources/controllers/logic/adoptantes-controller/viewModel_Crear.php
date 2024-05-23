<?php
class Adoptante {
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
<<<<<<< HEAD
    $apiUrl = 'http://192.168.1.2:3000/api'; // Reemplaza 'puerto' con el puerto de tu API
=======
    $apiUrl = 'http://192.168.1.5:3000/api'; // Reemplaza 'puerto' con el puerto de tu API
>>>>>>> 5ba6461597c29e6a20ee8db225de42862a53a62f

    // Crear una instancia del ViewModel de Adoptantes
    $adoptantesViewModel = new AdoptantesViewModel($apiUrl);

    // Obtener los datos del adoptante del formulario
    $adoptanteData = array(
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