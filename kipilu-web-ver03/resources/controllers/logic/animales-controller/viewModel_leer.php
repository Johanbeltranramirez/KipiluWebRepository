<?php

require_once '../../Data/ApiKipilu.php';

class Animal {
    public $ID_Animal;
    public $Nombre_Animal;
    public $Raza;
    public $Sexo;
    public $Foto;
    public $Descripcion;
    public $Especie_Animal;
    public $Estado_Animal;
}

class AnimalsViewModel {
    private $api;

    public function __construct() {
<<<<<<< HEAD
        $this->api = new ApiKipilu('http://192.168.20.20:3000/api/');
=======
        $this->api = new ApiKipilu('http://192.168.128.3:3000/api/');
>>>>>>> c971c2572b5f56a1be9e518fd548bfb42afd5250
    }

    public function fetchAnimals() {
        try {
            // Hacer una solicitud GET a la API para obtener los animales
<<<<<<< HEAD
            $response = file_get_contents('http://192.168.20.20:3000/api/animales');
=======
            $response = file_get_contents('http://192.168.128.3:3000/api/animales');
>>>>>>> c971c2572b5f56a1be9e518fd548bfb42afd5250
            
            // Decodificar la respuesta JSON
            $animalsData = json_decode($response, true);

            if (isset($animalsData['data'])) {
                $animals = [];
                foreach ($animalsData['data'] as $animalData) {
                    $animal = new Animal();
                    $animal->ID_Animal = $animalData['ID_Animal'];
                    $animal->Nombre_Animal = $animalData['Nombre_Animal'];
                    $animal->Raza = $animalData['Razas'];
                    $animal->Sexo = $animalData['Sexo'];
                    $animal->Foto = $animalData['Foto'];
                    $animal->Descripcion = $animalData['Descripcion'];
                    $animal->Especie_Animal = $animalData['Especie_Animal'];
                    $animal->Estado_Animal = $animalData['Estado_Animal'];

                    $animals[] = $animal;
                }
                return $animals;
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
