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