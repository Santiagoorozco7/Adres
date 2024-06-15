document.addEventListener('DOMContentLoaded', function() {
    const button = document.getElementById('interactiveButton');
    button.addEventListener('click', function() {
        document.body.style.backgroundColor = '#e0f7fa';
        alert('¡Gracias por interactuar!');
    });
});
