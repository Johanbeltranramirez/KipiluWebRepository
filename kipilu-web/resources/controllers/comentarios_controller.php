<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILU - CRUD Comentarios</title>
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estás seguro? Se eliminará el comentario.');
        }
    </script>
    <!--PROPIO-->
    <link rel="stylesheet" href="../css/controllers_styles/comentarios_controller.css">
     <link rel="icon" href="../../assets/icon/admin_icon.png">
    <!--BOOSTRAP-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

<!--Nav(navegacion)-->
<?php include '../reutilize/menu_controllers.php'; ?>
<!--Cierre Nav(navegacion)-->

<div class="container">
    <div class="title">Lista de comentarios</div>
    <br>

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
        echo '<th>ID_Comentario</th>';
        echo '<th>Nombre del comentarista</th>';
        echo '<th>Comentario</th>';
        echo '<th>Acciones</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($comments as $comment) {
            echo '<tr>';
            echo '<td>' . $comment->ID_Comentario . '</td>';
            echo '<td>' . $comment->Nombre . ' ' . $comment->Apellido . '</td>';
            echo '<td class="descripcion-cell">' . $comment->Comentario . '</td>';
            echo '<td>';
            echo '<a href="logic/comentarios-controller/viewModel_eliminar.php?commentId=' . $comment->ID_Comentario . '" class="btn btn-danger w-100" onclick="return confirmar();">Eliminar</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "<p class='text-center'>No se encontraron comentarios.</p>";
    }
    ?>

</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
