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
$api = new ApiKipilu('http://192.168.128.3:3000/api');
?>
=======
$api = new ApiKipilu('http://192.168.1.9:3000/api');

?>
>>>>>>> 8c8cf634282649b5205712eab0b3e40b42237ff6
