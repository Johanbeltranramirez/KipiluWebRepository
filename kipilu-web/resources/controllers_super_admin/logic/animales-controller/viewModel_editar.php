<?php

class AnimalUpdateViewModel {
    private $apiBaseUrl;

    public function __construct() {
        // Definimos la URL base de la API

        $this->apiBaseUrl = 'https://kipilubackendrepository-2.onrender.com/api/';

    }

    public function getAnimalById($animalId) {
        $url = $this->apiBaseUrl . 'animales/' . $animalId;
        return $this->sendRequest($url, 'GET');
    }

    public function updateAnimal($animalId, $animalData) {
        $url = $this->apiBaseUrl . 'animales/actualizar/' . $animalId;
        return $this->sendRequest($url, 'PUT', $animalData);
    }

    public function fetchRazas() {
        $url = $this->apiBaseUrl . 'razas';
        return $this->sendRequest($url, 'GET');
    }

    private function fetchRazaById($razaId) {
        $razas = $this->fetchRazas();
        foreach ($razas['data'] as $raza) {
            if ($raza['ID_Raza'] === $razaId) {
                return $raza['Nombre_Raza'];
            }
        }
        return 'Desconocida';
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
