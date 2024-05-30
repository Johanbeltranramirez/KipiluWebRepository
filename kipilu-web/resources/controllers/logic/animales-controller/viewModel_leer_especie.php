<?php

class Animalid {
    public $ID_Animal;
    public $Nombre_Animal;
    public $Raza;
    public $Sexo;
    public $Foto;
    public $Descripcion;
    public $Especie_Animal;
    public $Estado_Animal;
}

class AnimalSearchViewModel {
    private $apiBaseUrl;

    public function __construct($apiBaseUrl) {
        $this->apiBaseUrl = $apiBaseUrl;
    }

    public function fetchAnimalsBySpecies($especieId) {
        try {
            // Hacer una solicitud GET a la API para obtener los animales por ID de especie
            $url = $this->apiBaseUrl . '/api/animales/especie/' . $especieId;
            $response = @file_get_contents($url);

            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }

            $animalesData = json_decode($response, true);
    
            $animales = [];
            if (!empty($animalesData['data'])) {
                foreach ($animalesData['data'] as $animalData) {
                    $animal = new Animalid();
                    $animal->ID_Animal = $animalData['ID_Animal'];
                    $animal->Nombre_Animal = $animalData['Nombre_Animal'];
                    $animal->Raza = $animalData['Nombre_Raza']; // Nombre de la raza
                    $animal->Sexo = $animalData['Sexo'];
                    $animal->Foto = $animalData['Foto'];
                    $animal->Descripcion = $animalData['Descripcion'];
                    $animal->Especie_Animal = $animalData['Especie_Animal'];
                    $animal->Estado_Animal = $animalData['Estado_Animal'];

                    $animales[] = $animal;
                }
            }

            return $animales;
        } catch (Exception $e) {
            // Error genérico en caso de fallo en la solicitud o procesamiento
            return null;
        }
    }
}

?>
