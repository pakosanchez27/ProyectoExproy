// variables

// formularios
// btns mostrar
const btnPruebas = document.querySelector('#btnPrueba');
const btnPruebaVer = document.querySelector('#btnPruebaVer');
const btnAgendar = document.querySelector('#btnAgendar');


// btnsCerrar
const btnCerrarPruebas = document.querySelector('#cerrarPruebas');
const btnCerrarPruebasver = document.querySelector('#cerrarPruebasVer');
const cerrarEntrevista = document.querySelector('#cerrarEntrevista');

// Ventanas emergentes

const pruebasFormulario = document.querySelector('#pruebaPsicometrica');
const resultadosPrueba = document.querySelector('#resultadosPsicometrica');
const agendarCita = document.querySelector('#datosEntrevista')

//btnagregar
const agregarPrueba = document.querySelector('#agregarPrueba');
const formularioAgregarPrueba = document.querySelector('.masPruebas');

// eventos
eventListeners();
function eventListeners() {
    document.addEventListener('DOMContentLoaded', () => {
        if (btnPruebas) {
            btnPruebas.addEventListener('click', mostrarPruebas);
        }
        if (btnPruebaVer) {
            btnPruebaVer.addEventListener('click', mostrarPruebasVer);        
        }
        btnCerrarPruebas.addEventListener('click', cerrarPruebas);
        agregarPrueba.addEventListener('click', agregarCamposPrueba);
       
        btnCerrarPruebasver.addEventListener('click', cerrarPruebasVer );

        btnAgendar.addEventListener('click', mostrarDatosEntrevista);
        cerrarEntrevista.addEventListener('click', cerrarDatosEntrevista);
    })
}



// Funciones

function mostrarDatosEntrevista(e){
    e.preventDefault();
    if (agendarCita.classList.contains('ocultar')) {
        agendarCita.classList.remove('ocultar');
        agendarCita.classList.add('mostrarMenu');
    }
}
function cerrarDatosEntrevista(e){
    e.preventDefault();
    if (agendarCita.classList.contains('mostrarMenu')) {
        agendarCita.classList.remove('mostrarMenu');
        agendarCita.classList.add('ocultar');
    }
}

function mostrarPruebas(e) {
    e.preventDefault();

    if (pruebasFormulario.classList.contains('ocultar')) {
        pruebasFormulario.classList.remove('ocultar');
        pruebasFormulario.classList.add('mostrarMenu');
    }
}



function cerrarPruebas(e) {
    e.preventDefault();
    if (pruebasFormulario.classList.contains('mostrarMenu')) {
        pruebasFormulario.classList.remove('mostrarMenu');
        pruebasFormulario.classList.add('ocultar');
    }
}
function mostrarPruebasVer(e) {
    e.preventDefault();

    if (resultadosPrueba.classList.contains('ocultar')) {
        resultadosPrueba.classList.remove('ocultar');
        resultadosPrueba.classList.add('mostrarMenu');
    }
}

function cerrarPruebasVer(e) {
    e.preventDefault();
    if (resultadosPrueba.classList.contains('mostrarMenu')) {
        resultadosPrueba.classList.remove('mostrarMenu');
        resultadosPrueba.classList.add('ocultar');
    }
}


function agregarCamposPrueba(e) {
    e.preventDefault();
    const campoNombre = document.createElement('DIV');
    campoNombre.innerHTML = `
    <label for="nombrePrueba">Nombre de la prueba</label>
    <input type="text" name="nombrePrueba[]" id="nombrePrueba" placeholder="Nombre de la prueba psicometrica">
        `;
    campoNombre.classList.add('campo', 'nombrePrueba');

    const linkPrueba = document.createElement('DIV');
    linkPrueba.innerHTML = `
    <label for="LinkPrueba">Link a la prueba piscometrica</label>
    <input type="text" name="LinkPrueba[]" id="LinkPrueba" placeholder="Link a la prueba psicometrica">
       
    `;
        linkPrueba.classList.add('campo', 'LinkPrueba');



    formularioAgregarPrueba.appendChild(campoNombre);
    formularioAgregarPrueba.appendChild(linkPrueba);



}