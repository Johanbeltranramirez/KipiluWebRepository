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
$api = new ApiKipilu('http://10.175.81.39:3000/api');
?>
