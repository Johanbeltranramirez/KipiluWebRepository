<?php

class CommentsViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API

        $this->apiBaseUrl = 'http://192.168.101.17:3000/api/';

    }

    public function deleteComentarista($id) {
        try {
            // Hacer una solicitud DELETE a la API para eliminar el comentarista
            $url = $this->apiBaseUrl . 'comentaristas/eliminar/' . $id;
            $options = [
                'http' => [
                    'method' => 'DELETE'
                ]
            ];
            $context = stream_context_create($options);
            $response = @file_get_contents($url, false, $context); 

            if ($response === false) {
                throw new Exception('¡Ups! algo salió mal, inténtalo nuevamente...');
            }

            $responseData = json_decode($response, true);
            if (isset($responseData['success']) && $responseData['success']) {
                // Redirigir a la página principal o mostrar un mensaje de éxito
                echo "<script language='JavaScript'>alert('Comentarista eliminado exitosamente.'); location.assign('../../comentarios_controller.php');</script>";
                return true;
            } else {
                echo "<script language='JavaScript'>alert('Error al eliminar el comentario: " . $responseData['message'] . "');</script>";
                return false;
            }
        } catch (Exception $e) {
            echo "<script language='JavaScript'>alert('" . $e->getMessage() . "'); location.assign('../../comentarios_controller.php');</script>";
            return false;
        }
    }
}
 
// Verificar si se ha pasado el ID del comentarista a eliminar
if (isset($_GET['commentId'])) {
    $id = $_GET['commentId'];

    // Instancia del ViewModel de los comentaristas
    $viewModel_Eliminar = new CommentsViewModel();

    // Eliminar el comentarista
    $viewModel_Eliminar->deleteComentarista($id);
} else {
    echo "<script language='JavaScript'>alert('ID de comentarista no proporcionado.'); location.assign('../../comentarios_controller.php');</script>";
}
?>

