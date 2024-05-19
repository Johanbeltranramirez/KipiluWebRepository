document.addEventListener("DOMContentLoaded", function() {
    const showButton = document.querySelector('.show-comments');
    const hideButton = document.querySelector('.hide-comments');
    const commentList = document.querySelector('.Comentaristas-list');

    showButton.addEventListener('click', function() {
        commentList.style.display = 'block';
        showButton.style.display = 'none';
        hideButton.style.display = 'block';
    });

    hideButton.addEventListener('click', function() {
        commentList.style.display = 'none';
        hideButton.style.display = 'none';
        showButton.style.display = 'block';
    });
});
