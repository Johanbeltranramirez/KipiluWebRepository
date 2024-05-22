<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KIPILÚ - Comentarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="icon" href="../../assets/icon/logo.ico">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/comentarios_historias.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>

<!-- Nav (navegacion) -->
<?php include '../reutilize/menu.php'; ?>
<!-- Cierre Nav (navegacion) -->

<main>
    <article class="caja">
        <!-- Formulario de Comentarios -->
        <section class="cajaderecha">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="form-container">
                            <h1 class="text-center">COMENTARIOS</h1>
                            <h5 class="text-center">Hola!</h5>
                            <h5 class="text-center">Déjanos tu opinión</h5>
                            <form id="commentForm">
                                <div class="form-group">
                                    <label for="Nombre">Nombre:</label>
                                    <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Digite un nombre" maxlength="30" required>
                                </div>
                                <div class="form-group">
                                    <label for="Apellido">Apellido:</label>
                                    <input type="text" class="form-control" id="Apellido" name="Apellido" placeholder="Digite un apellido" maxlength="30" required>
                                </div>
                                <div class="form-group">
                                    <label for="Comentario">Comentario:</label>
                                    <textarea class="form-control" id="Comentario" name="Comentario" placeholder="Digite su comentario" maxlength="150" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Enviar comentario</button>
                            </form>
                            <div id="result" class="mt-3"></div>
                        </div>

                        <h2 class="mt-5 text-center">Poste de comentarios</h2>
                        <hr style="border: 1px solid #A52020;">
                        <ul id="commentsList" class="list-group Comentaristas-list show-Comentaristas">
                            <!-- Aquí se cargarán los comentarios -->
                        </ul>
                        <button class="btn btn-primary btn-block show-comments">Mostrar Comentarios</button>
                        <button class="btn btn-primary btn-block hide-comments">Ocultar Comentarios</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Historias de Exito -->
        <section class="cajaizquierda">

            <?php include 'histories.php'; ?>

        </section>
    </article>
</main>

<!-- Footer (pie de pag) -->
<?php include '../reutilize/footer.php'; ?>
<!-- Cierre Footer (pie de pag) -->

<script defer src="../js/Mostrar_Comentarios.js"></script>
<script src="path/to/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function() {
    // Enviar formulario por AJAX
    $('#commentForm').on('submit', function(event) {
        event.preventDefault();

        $.ajax({
            url: '../controllers/logic/comentarios-controller/viewModel_crear.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    $('#result').html('<div class="alert alert-success">¡Gracias por comentar!, tu opinión nos importa ;3</div>');
                    $('#commentForm')[0].reset(); // Resetear el formulario
                    loadComments(); // Recargar comentarios
                } else {
                    $('#result').html('<div class="alert alert-danger">Error al envíar el comentario</div>');
                }
            },
            error: function(xhr, status, error) {
                $('#result').html('<div class="alert alert-danger">Error: ' + error + '</div>');
            }
        });
    });

    // Cargar comentarios al cargar la página
    loadComments();

    // Función para cargar comentarios
    function loadComments() {
        $.ajax({
            url: '../controllers/logic/public-comments/viewModel_leer.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var commentsList = $('#commentsList');
                commentsList.empty(); // Limpiar lista de comentarios
                if (response.length > 0) {
                    $.each(response, function(index, comment) {
                        commentsList.append('<li class="list-group-item"><strong>' + comment.Nombre + ' ' + comment.Apellido + ':</strong> ' + comment.Comentario + '</li>');
                    });
                } else {
                    commentsList.append('<li class="list-group-item">No hay comentarios.</li>');
                }
            },
            error: function(xhr, status, error) {
                $('#commentsList').html('<li class="list-group-item">Error al cargar los comentarios. ' + xhr.responseText + '</li>');
            }
        });
    }
});
</script>

</body>
</html>
