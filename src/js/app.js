document.addEventListener("DOMContentLoaded", function() {
    eventListeners();

    darkMode();
    
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click',navegacionResponsive);
}
function navegacionResponsive(){
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}
function darkMode() {
    const darkModeButton = document.querySelector('.dark-mode-boton');

    darkModeButton.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
    })
}