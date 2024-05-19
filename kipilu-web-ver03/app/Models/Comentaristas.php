<?php
class Comentaristas {
    private $conn;
    public $table_name = "Comentaristas";

    public $Nombre;
    public $Apellido;
    public $Comentario;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function Enviar_comentario() {
        $query = "INSERT INTO " . $this->table_name . " (Nombre, Apellido, Comentario) VALUES (:Nombre, :Apellido, :Comentario)";
        $stmt = $this->conn->prepare($query);

        $this->Nombre = htmlspecialchars(strip_tags($this->Nombre));
        $this->Apellido = htmlspecialchars(strip_tags($this->Apellido));
        $this->Comentario = htmlspecialchars(strip_tags($this->Comentario));

        $stmt->bindParam(":Nombre", $this->Nombre);
        $stmt->bindParam(":Apellido", $this->Apellido);
        $stmt->bindParam(":Comentario", $this->Comentario);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    
}
?>

