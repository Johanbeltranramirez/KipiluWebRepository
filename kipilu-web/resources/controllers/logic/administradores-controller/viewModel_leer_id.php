<?php

class Administradorid {
    public $ID_Administrador;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
}

class AdministradorSearchViewModel {
    private $apiBaseUrl; 

    public function __construct($apiBaseUrl) {
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public function fetchAdministrador($administradorId) {
        try {
            // Hacer una solicitud GET a la API para obtener el administrador por su ID
            $url = $this->apiBaseUrl . 'administrador/' . $administradorId;
            $response = @file_get_contents($url);

            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }

            $administradorData = json_decode($response, true);
    
            if (isset($administradorData['data'])) {
                $administrador = new Administradorid();
                $administrador->ID_Administrador = $administradorData['data']['ID_Administrador'];
                $administrador->P_Nombre = $administradorData['data']['P_Nombre'];
                $administrador->S_Nombre = $administradorData['data']['S_Nombre'];
                $administrador->P_Apellido = $administradorData['data']['P_Apellido'];
                $administrador->S_Apellido = $administradorData['data']['S_Apellido'];
    
                return $administrador;
            } else {
                // No se encontró ningún animal con el ID especificado
                return null;
            }
        } catch (Exception $e) {
            // Error genérico en caso de fallo en la solicitud o procesamiento
            return null;
        }
    }
}

?>
