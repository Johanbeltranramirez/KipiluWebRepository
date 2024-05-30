<?php
class AdministradoresViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API
        $this->apiBaseUrl = 'http://192.168.128.12:3000/api/';
    }

    public function deleteAdministrador($id) {
        try {
            $url = $this->apiBaseUrl . 'administrador/eliminar/' . $id;
            $options = [
                'http' => [
                    'method' => 'DELETE'
                ]
            ];
            $context = stream_context_create($options);
            $response = @file_get_contents($url, false, $context);

            if ($response === false) {
                throw new Exception('No se puede eliminar el administrador');
            }

            $responseData = json_decode($response, true);
            if (isset($responseData['success']) && $responseData['success']) {
                // Redirigir a la página principal o mostrar un mensaje de éxito
                echo "<script language='JavaScript'>alert('Administrador eliminado exitosamente.'); location.assign('../../administradores_controller.php');</script>";
                return true;
            } else {
                echo "<script language='JavaScript'>alert('Error al eliminar el administrador: " . $responseData['message'] . "');</script>";
                return false;
            }
        } catch (Exception $exception) {
            echo "<script language='JavaScript'>alert('" . $exception->getMessage() . "'); location.assign('../../administradores_controller.php');</script>";
            return false;
        }
    }
}

// Verificar si se ha pasado el ID del adoptante a eliminar
if (isset($_GET['administradorId'])) {
    $id = $_GET['administradorId'];

    // Instancia del ViewModel de los adoptantes
    $viewModel_Eliminar = new AdministradoresViewModel();

    // Eliminar el adoptante
    $viewModel_Eliminar-> deleteAdministrador($id);
} else {
    echo "<script language='JavaScript'>alert('ID de administrador no proporcionado.'); location.assign('../../administradores_controller.php');</script>";
}
?>