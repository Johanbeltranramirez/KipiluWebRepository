<?php

require_once '../../Data/ApiKipilu.php';

class Adoptante {
    public $ID_Adoptante;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
    public $Correo;
    public $Direccion;
    public $Telefono;
}

class AdoptantesViewModel {
    private $api;

    public function __construct() {

        $this->api = new ApiKipilu('http://192.168.101.17:3000/api/');

    }

    public function fetchAdoptantes() {
        try {
            // Hacer una solicitud GET a la API para obtener los adoptantes

            $response = file_get_contents('http://192.168.101.17:3000/api/users/adoptantes');


            // Decodificar la respuesta JSON
            $adoptantesData = json_decode($response, true);


            if (isset($adoptantesData['data'])) {
                $adoptantes = [];
                foreach ($adoptantesData['data'] as $adoptanteData) {
                    $adoptante = new Adoptante();
                    $adoptante->ID_Adoptante = $adoptanteData['ID_Adoptante'];
                    $adoptante->P_Nombre = $adoptanteData['P_Nombre'];
                    $adoptante->S_Nombre = $adoptanteData['S_Nombre'];
                    $adoptante->P_Apellido = $adoptanteData['P_Apellido'];
                    $adoptante->S_Apellido = $adoptanteData['S_Apellido'];
                    $adoptante->Correo = $adoptanteData['Correo'];
                    $adoptante->Direccion = $adoptanteData['Direccion'];
                    $adoptante->Telefono = $adoptanteData['Telefono'];
                    $adoptantes[] = $adoptante;
                }
                return $adoptantes;
            } else {
                return [];
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return [];
        }
    }

}

?>