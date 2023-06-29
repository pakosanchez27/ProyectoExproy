// Variables
const menu = document.querySelector('#menu') ;
const cerrar = document.querySelector('#cerrar');
const menuMobile = document.querySelector('#menuMobile');

// eventos
menu.addEventListener('click', mostrarMenu);
cerrar.addEventListener('click', cerrarMenu);
perfilMobile.addEventListener('click', mostarDesplegable);

// funciones
function mostrarMenu() {
    

    if (menuMobile.classList.contains('ocultarMenu')) {
        menuMobile.classList.remove('ocultarMenu');
        menuMobile.classList.add('MostrarMenu');
    }
}

function cerrarMenu() {
    if (menuMobile.classList.contains('MostrarMenu')) {
        menuMobile.classList.remove('MostrarMenu');
        menuMobile.classList.add('ocultarMenu');
    }
}

