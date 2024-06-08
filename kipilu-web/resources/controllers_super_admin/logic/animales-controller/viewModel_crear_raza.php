<?php

class Animal {
    public $Nombre_Animal;
    public $Razas;
    public $Sexo;
    public $Foto;
    public $Descripcion;
    public $Especie_Animal;
    public $Estado_Animal;
}

class AnimalesViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function createAnimal($animalData) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/animales/create');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($animalData));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $animalData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            // Verificar si se creó correctamente el animal
            if (isset($animalData['success']) && $animalData['success'] === true) {
                return true; // Animal creado correctamente
            } else {
                return false; // Error al crear el animal
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false; // Error al crear el animal
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'https://kipilubackendrepository-2.onrender.com/api'; // Reemplaza 'puerto' con el puerto de tu API

    // Crear una instancia del ViewModel de Animales
    $animalesViewModel = new AnimalesViewModel($apiUrl);

    // Obtener los datos del animal del formulario
    $animalData = array(
        'Nombre_Animal' => $_POST["Nombre_Animal"],
        'Razas' => $_POST["Razas"],
        'Sexo' => $_POST["Sexo"],
        'Foto' => $_POST["Foto"],
        'Descripcion' => $_POST["Descripcion"],
        'Especie_Animal' => $_POST["Especie_Animal"],
        'Estado_Animal' => $_POST["Estado_Animal"]
    );

    // Crear el nuevo animal y obtener el resultado
    $resultado = $animalesViewModel->createAnimal($animalData);

    // Devolver el resultado al formulario
    echo json_encode(array("success" => $resultado));
    exit(); // Detener la ejecución del script
}

?>
