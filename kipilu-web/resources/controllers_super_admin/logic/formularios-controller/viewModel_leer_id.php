<?php

class Formularioid {
    public $ID_Formulario;
    public $ID_Adoptante;
    public $ID_Animal;
    public $Validacion_donativo;
    public $Estado_solicitud;
    public $Administrador;
}

class FormularioSearchViewModel {
    private $apiBaseUrl;

    public function __construct($apiBaseUrl) {
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public function fetchFormulario($formularioId) {
        try {
            // Hacer una solicitud GET a la API para obtener el formulario por su ID
            $url = $this->apiBaseUrl . 'formularios/' . $formularioId;
            $response = @file_get_contents($url);


            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }

            $formData = json_decode($response, true);

            if (isset($formData['data'])) {
                $form = new Formularioid();
                $form->ID_Formulario = $formData['data']['ID_Formulario'];
                $form->ID_Adoptante = $formData['data']['ID_Adoptante'];
                $form->ID_Animal = $formData['data']['ID_Animal']; 
                $form->Validacion_donativo = $formData['data']['Validacion_donativo'];
                $form->Estado_solicitud = $formData['data']['Estado_solicitud'];
                $form->Administrador = $formData['data']['Administrador'];

                return $form;
            } else {
                // No se encontró ningún formulario con el ID especificado
                return null;
            }
        } catch (Exception $e) {
            // Error genérico en caso de fallo en la solicitud o procesamiento
            return null;
        }
    }
    
}

?>
