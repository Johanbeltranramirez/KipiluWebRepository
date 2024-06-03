<?php

require_once '../../Data/ApiKipilu.php';

class Formulario {
    public $ID_Formulario;
    public $ID_Adoptante;
    public $ID_Animal;
    public $Validacion_donativo;
    public $Estado_solicitud;
    public $Administrador;
}

class FormsViewModel {
    private $api;

    public function __construct() {
        $this->api = new ApiKipilu('http://192.168.10.16:3000/api/');
    }

    public function fetchForms() {
        try {
            // Hacer una solicitud GET a la API para obtener los formularios
            $response = file_get_contents('http://192.168.10.16:3000/api/formularios');
            
            // Decodificar la respuesta JSON
            $formsData = json_decode($response, true);

            if (isset($formsData['data'])) {
                $forms = [];
                foreach ($formsData['data'] as $formData) {
                    $form = new Formulario();
                    $form->ID_Formulario = $formData['ID_Formulario'];
                    $form->ID_Adoptante = $formData['ID_Adoptante'];
                    $form->ID_Animal = $formData['ID_Animal'];
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