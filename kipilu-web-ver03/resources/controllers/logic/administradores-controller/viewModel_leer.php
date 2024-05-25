<?php

require_once '../../Data/ApiKipilu.php';

class Administrador {
    public $ID_Administrador;
    public $P_Nombre;
    public $S_Nombre;
    public $P_Apellido;
    public $S_Apellido;
}

class AdministradorViewModel {
    private $api;

    public function __construct() {
        
        $this->api = new ApiKipilu('http://192.168.101.9:3000/api/');

    }

    public function fetchAdministradores(){
        try {
            //Hacetr una solicitud GET a la API para obtener a los administradores
            $response = file_get_contents('http://192.168.101.9:3000/api/administradores');

            //Decodicar la respuesta JSON 
            $administradoresData = json_decode($response, true);

            if(isset($administradoresData['data'])) {
                $administradores = [];
                foreach ($administradoresData['data'] as $administradorData){
                    $administrador = new Administrador();
                    $administrador->ID_Administrador = $administradorData['ID_Administrador'];
                    $administrador->P_Nombre = $administradorData['P_Nombre'];
                    $administrador->S_Nombre = $administradorData['S_Nombre'];
                    $administrador->P_Apellido = $administradorData['P_Apellido'];
                    $administrador->S_Apellido = $administradorData['S_Apellido'];

                    $administradores[] = $administrador;
                }
                return $administradores;       
            } else {
                return [];
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return [];
        }
    }
}