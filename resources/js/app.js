document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        var flashMessage = document.getElementById('flash-message');
        if (flashMessage) {
            flashMessage.style.display = 'none';
        }
    }, 3000); // 3000 milissegundos = 3 segundos
});