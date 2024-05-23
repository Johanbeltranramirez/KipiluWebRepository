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

<<<<<<< HEAD
        $this->api = new ApiKipilu('http://192.168.1.2:3000/api/');
=======
        $this->api = new ApiKipilu('http://192.168.1.5:3000/api/');
>>>>>>> 5ba6461597c29e6a20ee8db225de42862a53a62f

    }

    public function fetchComments() {
        try {
            // Hacer una solicitud GET a la API para obtener los comentarios

<<<<<<< HEAD
            $response = file_get_contents('http://192.168.1.2:3000/api/comentaristas');
=======
            $response = file_get_contents('http://192.168.1.5:3000/api/comentaristas');
>>>>>>> 5ba6461597c29e6a20ee8db225de42862a53a62f

            
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
