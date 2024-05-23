<?php

class Formularioid {
    public $ID_Formulario;
    public $Adoptante;
    public $Animal;
    public $Validacion_donativo;
    public $Estado_solicitud;
    public $Administrador;
}

class FormularioSearchViewModel {
    private $apiBaseUrl;

    public function __construct($apiBaseUrl) {
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public function fetchForm($formularioId) {
        try {
            // Hacer una solicitud GET a la API para obtener el formulario por su ID
            $url = $this->apiBaseUrl . 'formularios/' . $formularioId;
            $response = file_get_contents($url);
            $formData = json_decode($response, true);
    

            if (isset($formData['data'])) {
                $form = new Formularioid();
                $form->ID_Formulario = $formData['data']['ID_Formulario'];
                $form->Adoptante = $formData['data']['Adoptante'];
                $form->Animal = $formData['data']['Animal']; 
                $form->Validacion_donativo = $formData['data']['Validacion_donativo'];
                $form->Estado_solicitud = $formData['data']['Estado_solicitud'];
                $form->Administrador = $formData['data']['Administrador'];

                return $form;
            } else {
                // No se encontró ningún formulario con el ID especificado
                return null;
            }
        } catch (Exception $excetion) {
            // Error genérico en caso de fallo en la solicitud o procesamiento
            echo 'Lo sentimos, ha ocurrido un error al procesar la solicitud.';
            return null;
        }
    }
    
}

?>
