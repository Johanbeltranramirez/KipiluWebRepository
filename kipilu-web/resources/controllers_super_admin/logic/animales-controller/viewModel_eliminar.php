<?php

class AnimalsViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API
        $this->apiBaseUrl = 'https://kipilubackendrepository-3.onrender.com/api/';

    }

    public function deleteAnimal($id) {
        try {
            // Hacer una solicitud DELETE a la API para eliminar el animal
            $url = $this->apiBaseUrl . 'animales/eliminar/' . $id;
            $options = [
                'http' => [
                    'method' => 'DELETE'
                ]
            ];
            $context = stream_context_create($options);
            $response = @file_get_contents($url, false, $context); 

            if ($response === false) {
                throw new Exception('No se puede eliminar al animal.');
            }

            $responseData = json_decode($response, true);
            if (isset($responseData['success']) && $responseData['success']) {
                // Redirigir a la página principal o mostrar un mensaje de éxito
                echo "<script language='JavaScript'>alert('Animal eliminado exitosamente.'); location.assign('../../animales_controller.php');</script>";
                return true;
            } else {
                echo "<script language='JavaScript'>alert('Error al eliminar el animal: " . $responseData['message'] . "');</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script language='JavaScript'>alert('" . $e->getMessage() . "'); location.assign('../../animales_controller.php');</script>";
            return false;
        }
    }
}

// Verificar si se ha pasado el ID del animal a eliminar
if (isset($_GET['animalId'])) {
    $id = $_GET['animalId'];

    // Instancia del ViewModel de los animales
    $viewModel_Eliminar = new AnimalsViewModel();

    // Eliminar el animal
    $viewModel_Eliminar->deleteAnimal($id);
} else {
    echo "<script language='JavaScript'>alert('ID de animal no proporcionado.'); location.assign('../../animales_controller.php');</script>";
}
?>
