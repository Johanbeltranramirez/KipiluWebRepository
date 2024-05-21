<?php

class AnimalViewModel {
    private $apiUrl;

    public function __construct($apiUrl) {
        $this->apiUrl = $apiUrl;
    }

    public function fetchAnimalById($animalId) {
        try {
            // Inicializar cURL
            $curl = curl_init();

            // Configurar opciones de cURL para obtener los detalles del animal por su ID
            $url = $this->apiUrl . '/animales/' . $animalId;
            curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json"
                ),
            ));

            // Ejecutar la solicitud cURL
            $response = curl_exec($curl);

            // Verificar si hubo algún error
            if ($response === false) {
                throw new Exception(curl_error($curl));
            }

            // Decodificar la respuesta JSON
            $animalData = json_decode($response, true);

            // Cerrar la sesión cURL
            curl_close($curl);

            if (isset($animalData['data'])) {
                $animal = $this->mapToAnimal($animalData['data']);
                // Obtener el nombre de la raza
                $animal->Raza = $this->fetchRazaById($animalData['data']['Raza']);
                return $animal;
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return null;
        }
    }

    private function mapToAnimal($data) {
        $animal = new Animal();
        $animal->ID_Animal = $data['ID_Animal'];
        $animal->Nombre_Animal = $data['Nombre_Animal'];
        $animal->Raza = $data['Raza'];
        $animal->Sexo = $data['Sexo'];
        $animal->Foto = $data['Foto'];
        $animal->Descripcion = $data['Descripcion'];
        $animal->Especie_Animal = $data['Especie_Animal'];
        $animal->Estado_Animal = $data['Estado_Animal'];
        
        return $animal;
    }

    // Método para obtener todas las razas
    private function fetchRazas() {
        try {
            // Hacer una solicitud GET a la API para obtener las razas
            $response = file_get_contents($this->apiUrl . '/razas');
            
            // Decodificar la respuesta JSON
            $razasData = json_decode($response, true);

            if (isset($razasData['data'])) {
                return $razasData['data'];
            } else {
                return [];
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
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
