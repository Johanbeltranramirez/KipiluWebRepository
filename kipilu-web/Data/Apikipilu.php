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

$api = new ApiKipilu('https://kipilubackendrepository-3.onrender.com/api');


?>