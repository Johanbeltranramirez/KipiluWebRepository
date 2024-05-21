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

    public function fetchAnimal($animalId) {
        try {
            // Hacer una solicitud GET a la API para obtener el animal por su ID
            $url = $this->apiBaseUrl . 'animales/' . $animalId;
            $response = @file_get_contents($url);

            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }

            $animalData = json_decode($response, true);
    
            if (isset($animalData['data'])) {
                $animal = new Animalid();
                $animal->ID_Animal = $animalData['data']['ID_Animal'];
                $animal->Nombre_Animal = $animalData['data']['Nombre_Animal'];
                $animal->Raza = $this->fetchRazaById($animalData['data']['Razas']); // Obtener el nombre de la raza
                $animal->Sexo = $animalData['data']['Sexo'];
                $animal->Foto = $animalData['data']['Foto'];
                $animal->Descripcion = $animalData['data']['Descripcion'];
                $animal->Especie_Animal = $animalData['data']['Especie_Animal'];
                $animal->Estado_Animal = $animalData['data']['Estado_Animal'];
    
                return $animal;
            } else {
                // No se encontró ningún animal con el ID especificado
                return null;
            }
        } catch (Exception $e) {
            // Error genérico en caso de fallo en la solicitud o procesamiento
            return null;
        }
    }

    // Método para obtener todas las razas
    public function fetchRazas() {
        try {
            // Hacer una solicitud GET a la API para obtener las razas
            $response = @file_get_contents($this->apiBaseUrl . 'razas');

            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }

            $razasData = json_decode($response, true);

            if (isset($razasData['data'])) {
                return $razasData['data'];
            } else {
                return [];
            }
        } catch (Exception $e) {
            return [];
        }
    }

    // Método para obtener el nombre de la raza por su ID
    private function fetchRazaById($razaId) {
        $razas = $this->fetchRazas();
        foreach ($razas as $raza) {
            if ($raza['ID_Raza'] === $razaId) {
                return $raza['Nombre_Raza'];
            }
        }
        return 'Desconocida';
    }
}

?>
