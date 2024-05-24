<?php

class AdoptanteId {
    public $ID_Adoptante;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
    public $Correo;
    public $Direccion;
    public $Telefono;
}

class AdoptanteSearchViewModel {
    private $apiBaseUrl;

    public function __construct() {

        $this->api = new ApiKipilu('http://10.175.83.121:3000/api/');

    }

    public function fetchAdoptante($adoptanteId) {
        try {
            // Hacer una solicitud GET a la API para obtener el adoptante por su ID

            $url = $this->apiBaseUrl . 'users/adoptantes/search/' . $adoptanteId;
            $response = @file_get_contents($url);

            

            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }

            $adoptanteData = json_decode($response, true);

            if (isset($adoptanteData['data'][0])) {
                $adoptante = new AdoptanteId();
                $adoptante->ID_Adoptante = $adoptanteData['data'][0]['ID_Adoptante'];
                $adoptante->P_Nombre = $adoptanteData['data'][0]['P_Nombre'];
                $adoptante->S_Nombre = $adoptanteData['data'][0]['S_Nombre'];
                $adoptante->P_Apellido = $adoptanteData['data'][0]['P_Apellido'];
                $adoptante->S_Apellido = $adoptanteData['data'][0]['S_Apellido'];
                $adoptante->Correo = $adoptanteData['data'][0]['Correo'];
                $adoptante->Direccion = $adoptanteData['data'][0]['Direccion'];
                $adoptante->Telefono = $adoptanteData['data'][0]['Telefono'];

                return $adoptante;
            } else {
                // No se encontró ningún adoptante con el ID especificado
                return null;
            }
        } catch (Exception $e) {
            // Error genérico en caso de fallo en la solicitud o procesamiento
            return null;
        }
    }
}


?>
