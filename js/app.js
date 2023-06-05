// Variables
const menu = document.querySelector('#menu');
const cerrar = document.querySelector('#cerrar');
const menuMobile = document.querySelector('#menuMobile');
const subirFoto = document.querySelector('#inputFile');

// eventos
eventListeners();

function eventListeners() {
    addEventListener('DOMContentLoaded', () => {
        menu.addEventListener('click', mostrarMenu);
        cerrar.addEventListener('click', cerrarMenu);
        subirFoto.addEventListener('change', mostrarImagen);
    });

  

}


// funciones

function mostrarMenu(e) {
    e.preventDefault();
    if (menuMobile.classList.contains('ocultarMenu')) {
        menuMobile.classList.remove('ocultarMenu');
        menuMobile.classList.add('MostrarMenu');
    }
}
function cerrarMenu(e) {
    e.preventDefault();
    if (menuMobile.classList.contains('MostrarMenu')) {
        menuMobile.classList.remove('MostrarMenu');
        menuMobile.classList.add('ocultarMenu');
    }
}

// funcion para mostrar la imagen en formulario
function mostrarImagen(event) {
    var input = event.target;
    console.log(input);
    var reader = new FileReader();
  
    reader.onload = function() {
      var dataURL = reader.result;
      var imagenPreview = document.querySelector(".previewPerfil__foto");
  
      imagenPreview.style.backgroundImage = "url('" + dataURL + "')";
    };
  
    reader.readAsDataURL(input.files[0]);
  }