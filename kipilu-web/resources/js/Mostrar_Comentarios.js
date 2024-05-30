document.addEventListener("DOMContentLoaded", function() {
    const showCommentsBtn = document.querySelector('.show-comments');
    const hideCommentsBtn = document.querySelector('.hide-comments');
    const commentList = document.querySelector('.Comentaristas-list');

    showCommentsBtn.addEventListener('click', function() {
        commentList.style.display = 'block';
        showCommentsBtn.style.display = 'none'; // Oculta el botón "Mostrar Comentarios"
        hideCommentsBtn.style.display = 'block'; // Muestra el botón "Ocultar Comentarios"
    });

    hideCommentsBtn.addEventListener('click', function() {
        commentList.style.display = 'none';
        showCommentsBtn.style.display = 'block'; // Muestra el botón "Mostrar Comentarios"
        hideCommentsBtn.style.display = 'none'; // Oculta el botón "Ocultar Comentarios"
    });

    // Oculta la lista de comentarios y el botón "Ocultar Comentarios" al cargar la página
    commentList.style.display = 'none';
    hideCommentsBtn.style.display = 'none';
});
