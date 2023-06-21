const fomulario = document.querySelector('#formulario');

// Variables del primer Formulario

const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellido');
const telefono = document.querySelector('#telefono');
const nacimiento = document.querySelector('#nacimiento');
const estado = document.querySelector('#estado');
const ciudad = document.querySelector('#ciudad');
const siguiente2 = document.querySelector('#siguiente')

const campos = {
    nombre: '',
    apellido: '',
    telefono: '',
    nacimiento: '',
    estados: '',
    ciudad: '',
}

// Eventos

document.addEventListener('DOMContentLoaded', ()  =>{
    nombre.addEventListener('blur', PrimerValidador);
    apellido.addEventListener('blur', PrimerValidador);
    telefono.addEventListener('blur', PrimerValidador);
    nacimiento.addEventListener('blur', PrimerValidador);
    estado.addEventListener('blur', PrimerValidador);
    ciudad.addEventListener('blur', PrimerValidador);
})




// reiniciar el objeto

// Funciones

// Funcion del primer Formulario
function PrimerValidador(e) {
  e.preventDefault();

  if (e.target.value.trim() === '') {
    mostrarAlerta(`El ${e.target.id} es obligatorio`, e.target.parentElement);
    campos[e.target.name] = '';
    comprobarCampos();
    return;
}


    
    limpiarAlerta(e.target.parentElement)

    campos[e.target.name] = e.target.value.trim();
    // console.log(campos);
}


function mostrarAlerta(mensaje, referencia) {
    limpiarAlerta(referencia);

    const error = document.createElement('P');
    error.textContent = mensaje;
    error.classList.add('errorMensaje')

    // Inyectar el error al formulario
    referencia.appendChild(error);
}

function limpiarAlerta(referencia) {
    // Limpiar alrtas
    const alerta = referencia.querySelector('.errorMensaje');
    if (alerta) {
        alerta.remove();
    }
}

