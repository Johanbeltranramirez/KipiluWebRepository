<?php

require_once '../../Data/ApiKipilu.php';

class Comentarista {
    public $ID_Comentario;
    public $Nombre;
    public $Apellido;
    public $Comentario;

}

class CommentsViewModel {
    private $api;

    public function __construct() {
        $this->api = new ApiKipilu('http://192.168.1.9:3000/api/');
    }

    public function fetchComments() {
        try {
            // Hacer una solicitud GET a la API para obtener los comentarios
            $response = file_get_contents('http://192.168.1.9:3000/api/comentaristas');
            
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

?>
