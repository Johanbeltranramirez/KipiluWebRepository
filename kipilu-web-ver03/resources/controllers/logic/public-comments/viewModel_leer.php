<?php

class Comentarista {
    public $ID_Comentario;
    public $Nombre;
    public $Apellido;
    public $Comentario;
}

class CommentsViewModel {
    public function __construct() {
        // Definimos la URL base de la API
        $this->apiBaseUrl = 'http://192.168.1.5:3000/api/';
    }

    public function fetchComments() {
        try {
            // Hacer una solicitud GET a la API para obtener los comentarios 
            $url = $this->apiBaseUrl . 'comentaristas';
            $response = @file_get_contents($url);

            if ($response === FALSE) {
                throw new Exception('Failed to fetch data from API.');
            }
            // Decodificar la respuesta JSON
            $commentsData = json_decode($response, true);

            if (isset($commentsData['data'])) {
                $comments = [];
                foreach ($commentsData['data'] as $commentData) {
                    $comment = new Comentarista();
                    $comment->ID_Comentario = $commentData['ID_Comentario'];
                    $comment->Nombre = $commentData['Nombre'];
                    $comment->Apellido = $commentData['Apellido'];
                    $comment->Comentario = $commentData['Comentario'];
                    $comments[] = $comment;
                }
                return $comments;
            } else {
                return [];
            }
        } catch (Exception $e) {
            echo 'ERROR: ' . $e->getMessage();
            return [];
        }
    }
}

header('Content-Type: application/json');
$viewModel = new CommentsViewModel();
echo json_encode($viewModel->fetchComments());

?>
