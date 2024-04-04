document.addEventListener('DOMContentLoaded', function() {
    // Manejar el clic en la flecha para desplazarse hacia abajo
    document.querySelector('.custom-scroll-down-arrow a').addEventListener('click', function(event) {
        event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
        const nosRespaldanSection = document.getElementById('nos-respaldan'); // Obtener la siguiente sección
        nosRespaldanSection.scrollIntoView({ behavior: 'smooth' }); // Desplazarse suavemente a la siguiente sección
    });
});
