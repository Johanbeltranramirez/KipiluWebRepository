<?php

class AnimalUpdate {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function updateAnimal($animalId, $animalData) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL
            curl_setopt($curl, CURLOPT_URL, $this->apiUrl . '/animales/actualizar/' . $animalId);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
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

            // Verificar si se actualizó correctamente el animal
            if (isset($animalData['success']) && $animalData['success'] === true) {
                return true; // Animal actualizado correctamente
            } else {
                return false; // Error al actualizar el animal
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return false; // Error al actualizar el animal
        }
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // URL de la API
    $apiUrl = 'http://192.168.128.3:3000/api'; // Reemplaza 'puerto' con el puerto de tu API

    // Obtener el ID del animal de la solicitud
    $animalId = $_POST["animalId"];

    // Crear una instancia del ViewModel de AnimalUpdate
    $animalUpdate = new AnimalUpdate($apiUrl);

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

    // Actualizar el animal y obtener el resultado
    $resultado = $animalUpdate->updateAnimal($animalId, $animalData);

    // Devolver el resultado al formulario
    echo json_encode(array("success" => $resultado));
    exit(); // Detener la ejecución del script
}

?>
