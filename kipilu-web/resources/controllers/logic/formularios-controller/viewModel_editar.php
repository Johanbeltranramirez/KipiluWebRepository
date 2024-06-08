<?php

class FormularioUpdateViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API
        $this->apiBaseUrl = 'https://kipilubackendrepository-2.onrender.com/api/';
    }

    public function getFormularioById($formularioId) {
        $url = $this->apiBaseUrl . 'formularios/' . $formularioId;
        return $this->sendRequest($url, 'GET');
    }

    public function updateFormulario($formularioId, $formularioData) {
        $url = $this->apiBaseUrl . 'formularios/actualizar/' . $formularioId;
        return $this->sendRequest($url, 'PUT', $formularioData);
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
        $response = file_get_contents($url, false, $context);

        return json_decode($response, true);
    }
}

?>
