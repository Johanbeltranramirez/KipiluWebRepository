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
$api = new ApiKipilu('http://192.168.1.2:3000/api');
=======
$api = new ApiKipilu('http://192.168.1.5:3000/api');
>>>>>>> 5ba6461597c29e6a20ee8db225de42862a53a62f

?>