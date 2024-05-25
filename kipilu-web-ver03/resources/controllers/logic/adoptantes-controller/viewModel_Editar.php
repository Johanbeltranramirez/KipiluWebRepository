<?php

class AdoptanteUpdateViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API

        $this->apiBaseUrl = 'http://192.168.128.3:3000/api/';

    }

    public function getAdoptanteById($adoptanteId) {
        $url = $this->apiBaseUrl . 'users/adoptantes/search/' . $adoptanteId;
        return $this->sendRequest($url, 'GET');
    }

    public function updateAdoptante($adoptanteId, $adoptanteData) {
        $url = $this->apiBaseUrl . 'users/adoptantes/' . $adoptanteId;
        return $this->sendRequest($url, 'PUT', $adoptanteData);
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
