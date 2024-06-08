<?php

class AdministradorUpdateViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API
        $this->apiBaseUrl = 'https://kipilubackendrepository-3.onrender.com/api/';
    }

    public function getAdministradorById($administradorId) {
        $url = $this->apiBaseUrl . 'administrador/' . $administradorId;
        return $this->sendRequest($url, 'GET');
    }

    public function updateAdministrador($administradorId, $administradorData) {
        $url = $this->apiBaseUrl . 'administrador/' . $administradorId;
        return $this->sendRequest($url, 'PUT', $administradorData);
    }

    private function sendRequest($url, $method, $data = null) {
        $options = [
            'http' => [
                'method' => $method,
                'header' => 'Content-Type: application/json',
                'ignore_errors' => true,
            ]
        ];

        if ($data) {
            $options['http']['content'] = json_encode($data);
        }

        $context = stream_context_create($options);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            $error = error_get_last();
            throw new Exception('HTTP request failed. Error: ' . $error['message']);
        }

        return json_decode($response, true);
    }
}
?>
