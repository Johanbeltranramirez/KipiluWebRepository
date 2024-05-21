<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../assets/icon/logo.ico">
    <title>KIPILU - CRUD Comentarios</title>
    <script type="text/javascript">
        function confirmar(){
            return confirm('¿Estas Seguro?, se eliminará el comentario');
        }
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!--BOOSTRAP-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!--Styles-->
    <link rel="stylesheet" href="../css/controllers_styles/comentarios_controller.css">
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container">
    <div class="title">Lista de comentarios</div>

    <?php
    require_once 'logic/comentarios-controller/viewModel_leer.php';

    // Instancia del ViewModel de los comentarios
    $viewModel_Leer = new CommentsViewModel();

    $comments = $viewModel_Leer->fetchComments();

    // Si hay comentarios, se muestran en la vista
    if (!empty($comments)) {
        echo '<table class="comment-table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Num</th>';
        echo '<th>Nombre comentarista</th>';
        echo '<th>Comentario</th>';
        echo '<th>Acción</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($comments as $comment) {
            echo '<tr>';
            echo '<td>' . $comment->ID_Comentario . '</td>';
            echo '<td>' . $comment->Nombre . ' ' . $comment->Apellido . '</td>';
            echo '<td>' . $comment->Comentario . '</td>';
            echo '<td>';
            echo '<a href="logic/comentarios-controller/viewModel_eliminar.php?commentId=' . $comment->ID_Comentario . '" class="btn btn-danger w-100">Eliminar Comentario</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='text-center'>No se encontraron comentarios en la plataforma.</p>";
    }
    ?>

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>
</html>
