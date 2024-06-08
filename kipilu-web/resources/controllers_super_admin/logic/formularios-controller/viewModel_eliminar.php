<?php

class FormsViewModel {
  private $apiBaseUrl;

  public function __construct() {
     // Definimos la URL base de la API
     $this->apiBaseUrl = 'https://kipilubackendrepository-3.onrender.com/api/';
  }

  public function deleteFormulario($id) {
    try {
      $url = $this->apiBaseUrl . 'formularios/eliminar/' . $id;
      $options = [
        'http' => [
          'method' => 'DELETE'
        ]
        ];
        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
          throw new Exception('No se puede eliminar el formulario');
        }

        $responseData = json_decode($response, true);
        if (isset($responseData['success']) && $responseData['success']) {
            // Redirigir a la página principal o mostrar un mensaje de éxito
            echo "<script language='JavaScript'>alert('Formulario eliminado exitosamente.'); location.assign('../../formularios_controller.php');</script>";
            return true;          
        } else {
          echo "<script language='JavaScript'>alert('Error al eliminar el formulario: " . $responseData['message'] . "');</script>";
          return false;          
        }
    } catch (Exception $exception) {
      echo "<script language='JavaScript'>alert('" . $exception->getMessage() . "'); location.assign('../../formularios_controller.php');</script>";
      return false;      
    }
  }
}


if (isset($_GET['formularioId'])) {
  $id = $_GET['formularioId'];

  // Instancia del ViewModel de los formularios
  $viewModel_Eliminar = new FormsViewModel();

  // Eliminar el formulario
  $viewModel_Eliminar->deleteFormulario($id);
} else {
  echo "<script language='JavaScript'>alert('ID de formulario no proporcionado.'); location.assign('../../formularios_controller.php');</script>";
}

?>
