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
                    $('#result').html('<div class="alert alert-success">¡Gracias por comentar!, tu opinión nos importa 👻​</div>');
                    $('#commentForm')[0].reset(); // Resetear el formulario
                    loadComments(); // Recargar comentarios
                } else {
                    $('#result').html('<div class="alert alert-danger">Error al enviar el comentario</div>');
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
                        var commentText = comment.Comentario;
                        var isTruncated = commentText.length > 150; // Limite para truncar el comentario
                        var displayedText = isTruncated ? commentText.substring(0, 150) + '...' : commentText;

                        commentsList.append(
                            '<li class="comment-item">' +
                                '<div class="comment-avatar"></div>' +
                                '<div class="comment-content">' +
                                    '<div class="comment-author">' + comment.Nombre + ' ' + comment.Apellido + '</div>' +
                                    '<div class="comment-text ' + (isTruncated ? 'truncated' : '') + '">' + displayedText + '</div>' +
                                    (isTruncated ? '<div class="read-more">Leer más</div>' : '') +
                                    '<div class="comment-metadata">Hace un miawmento</div>' +
                                '</div>' +
                            '</li>'
                        );
                    });

                    // Añadir evento de clic para "Leer más"
                    $('.read-more').click(function() {
                        var fullText = $(this).prev('.comment-text').text().replace('...', '');
                        $(this).prev('.comment-text').text(fullText);
                        $(this).remove();
                    });
                } else {
                    commentsList.append('<li class="list-group-item">No hay comentarios.</li>');
                }
            },
            error: function(xhr, status, error) {
                $('#commentsList').html('<li class="list-group-item">Error al cargar los comentarios.</li>');
            }
        });
    }
});
