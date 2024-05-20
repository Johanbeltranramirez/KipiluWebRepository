<?php
class ApiKipilu {
    private $baseURL;
    private $headers;

    public function __construct($baseURL) {
        $this->baseURL = $baseURL;
        $this->headers = array('Content-Type: application/json');
    }
}

// Crear una instancia de la clase ApiKipilu con la URL base de la API
<<<<<<< HEAD
$api = new ApiKipilu('http://192.168.20.20:3000/api');
=======
$api = new ApiKipilu('http://192.168.128.3:3000/api');
>>>>>>> c971c2572b5f56a1be9e518fd548bfb42afd5250
?>
