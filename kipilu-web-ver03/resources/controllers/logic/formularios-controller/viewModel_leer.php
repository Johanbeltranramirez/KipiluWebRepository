<?php

require_once '../../Data/ApiKipilu.php';

class Formulario {
    public $ID_Formulario;
    public $Adoptante;
    public $Animal;
    public $Validacion_donativo;
    public $Estado_solicitud;
    public $Administrador;
}

class FormsViewModel {
    private $api;

    public function __construct() {
        $this->api = new ApiKipilu('https://kipilubackendrepository-2.onrender.com/api/');
    }

    public function fetchForms() {
        try {
            // Hacer una solicitud GET a la API para obtener los formularios
            $response = file_get_contents('https://kipilubackendrepository-2.onrender.com/api/formularios');
            
            // Decodificar la respuesta JSON
            $formsData = json_decode($response, true);

            if (isset($formsData['data'])) {
                $forms = [];
                foreach ($formsData['data'] as $formData) {
                    $form = new Formulario();
                    $form->ID_Formulario = $formData['ID_Formulario'];
                    $form->Adoptante = $formData['Adoptante'];
                    $form->Animal = $formData['Animal'];
                    $form->Validacion_donativo = $formData['Validacion_donativo'];
                    $form->Estado_solicitud = $formData['Estado_solicitud'];
                    $form->Administrador = $formData['Administrador'];

                    $forms[] = $form;
                }
                return $forms;
            } else {
                return [];
            }
        } catch (Exception $exception) {
            echo 'ERROR: ' . $exception->getMessage();
            return [];
        }
    }
}

?>