import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const genreButtons = document.querySelectorAll('.genre-button');

    genreButtons.forEach(button => {
        button.addEventListener('click', function() {
            genreButtons.forEach(btn => btn.classList.remove('selected'));
            this.classList.add('selected');
        });
    });
});