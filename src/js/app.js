// Variables
const menu = document.querySelector('#menu') ;
const menuEmpresa = document.querySelector('#Empresa') ;
// const cerrar = document.querySelector('#cerrar') ?? null;
const menuMobile = document.querySelector('#menuMobile');

// eventos
menu.addEventListener('click', mostrarMenu);
// menuEmpresa.addEventListener('click', mostrarMenuEmpresa);
cerrar.addEventListener('click', cerrarMenu);
// perfilMobile.addEventListener('click', mostarDesplegable);

// funciones
function mostrarMenu() {
    
    console.log('click');

    if (menuMobile.classList.contains('ocultarMenu')) {
        menuMobile.classList.remove('ocultarMenu');
        menuMobile.classList.add('MostrarMenu');
    }else{
        menuMobile.classList.remove('MostrarMenu');
        menuMobile.classList.add('ocultarMenu');
    }
}

function cerrarMenu() {
    if (menuMobile.classList.contains('MostrarMenu')) {
        menuMobile.classList.remove('MostrarMenu');
        menuMobile.classList.add('ocultarMenu');
    }
}





function agregarEtiqueta(event) {
    if (event.keyCode === 13) { // Verificar si se presionó la tecla Enter
        event.preventDefault(); // Evitar el comportamiento por defecto (enviar el formulario)
        
        var input = document.getElementById("skills");
        var etiquetasContainer = document.getElementById("etiquetasContainer");
        
        var etiqueta = document.createElement("span");
        etiqueta.className = "etiqueta";
        
        var etiquetaTexto = document.createElement("span");
        etiquetaTexto.innerText = input.value;
        
        var eliminarBtn = document.createElement("span");
        eliminarBtn.innerText = "x";
        eliminarBtn.addEventListener("click", function() {
            etiquetasContainer.removeChild(etiqueta);
            etiquetasContainer.removeChild(etiquetaInput);
        });
        
        etiqueta.appendChild(etiquetaTexto);
        etiqueta.appendChild(eliminarBtn);
        
        etiquetasContainer.appendChild(etiqueta);
        
        // Agregar un campo de entrada oculto para enviar los valores de las etiquetas
        var etiquetaInput = document.createElement("input");
        etiquetaInput.type = "hidden";
        etiquetaInput.name = "etiquetas[]";
        etiquetaInput.value = input.value;
        etiquetasContainer.appendChild(etiquetaInput);
        
        input.value = ""; // Limpiar el valor del input
    }
  }
  
