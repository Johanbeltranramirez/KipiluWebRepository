<?php
class GestorAdoptantesViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API
        $this->apiBaseUrl = 'http://192.168.1.7:3000/api/';
    }

    public function deleteAdoptante($id) {
        try {
            $url = $this->apiBaseUrl . 'users/adoptantes/' . $id;
            $options = [
                'http' => [
                    'method' => 'DELETE'
                ]
            ];
            $context = stream_context_create($options);
            $response = @file_get_contents($url, false, $context);

            if ($response === false) {
                throw new Exception('No se puede eliminar el adoptante');
            }

            $responseData = json_decode($response, true);
            if (isset($responseData['success']) && $responseData['success']) {
                // Redirigir a la página principal o mostrar un mensaje de éxito
                echo "<script language='JavaScript'>alert('Adoptante eliminado exitosamente.'); location.assign('../../adoptantes_controller.php');</script>";
                return true;
            } else {
                echo "<script language='JavaScript'>alert('Error al eliminar el adoptante: " . $responseData['message'] . "');</script>";
                return false;
            }
        } catch (Exception $exception) {
            echo "<script language='JavaScript'>alert('" . $exception->getMessage() . "'); location.assign('../../adoptantes_controller.php');</script>";
            return false;
        }
    }
}

// Verificar si se ha pasado el ID del adoptante a eliminar
if (isset($_GET['adoptanteId'])) {
    $id = $_GET['adoptanteId'];

    // Instancia del ViewModel de los adoptantes
    $viewModel_Eliminar = new GestorAdoptantesViewModel();

    // Eliminar el adoptante
    $viewModel_Eliminar->deleteAdoptante($id);
} else {
    echo "<script language='JavaScript'>alert('ID de adoptante no proporcionado.'); location.assign('../../adoptantes_controller.php');</script>";
}
?>
