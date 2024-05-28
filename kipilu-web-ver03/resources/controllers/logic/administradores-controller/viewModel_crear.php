<?php
class Administrador {
    public $ID_Administrador;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
    public $Contrasena;
}

class AdministradoresViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createAdministrador($administradorData) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/administrador/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($administradorData));
            curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $administradorData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            // Verificar si se creó correctamente el administrador
            if (isset($administradorData['success']) && $administradorData['success'] === true) {
                return true; // Administrador creado correctamente
            } else {
                return false; // Error al crear el Administrador
            }
        } catch (Exception $e) {
            return false; // Error al crear el Administrador
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'https://kipilubackendrepository-2.onrender.com/api'; // Reemplaza con la URL correcta de tu API

    // Crear una instancia del ViewModel de Administradores
    $AdministradoresViewModel = new AdministradoresViewModel($apiUrl);

    // Obtener los datos del administrador del formulario
    $administradorData = array(
        'ID_Administrador' => $_POST["ID_Administrador"],
        'P_Nombre' => $_POST["P_Nombre"],
        'S_Nombre' => $_POST["S_Nombre"],
        'P_Apellido' => $_POST["P_Apellido"],
        'S_Apellido' => $_POST["S_Apellido"],
        'Contrasena' => $_POST["Contrasena"]
    );

    // Crear el nuevo Administrador y obtener el resultado
    $resultado = $AdministradoresViewModel->createAdministrador($administradorData);

    // Devolver el resultado al formulario
    echo json_encode(array("success" => $resultado));
    exit(); // Detener la ejecución del script
}
?>
