// variables

// formularios
// btns mostrar
const btnPruebas = document.querySelector('#btnPrueba');
const btnPruebaVer = document.querySelector('#btnPruebaVer');
const btnAgendar = document.querySelector('#btnAgendar');
const btnAgendarVer = document.querySelector('#btnAgendarVer');
const btnDocumentos = document.querySelector('#btnDocumentos');
const btnDocumentosVer = document.querySelector('#btnDocumentosVer');


// btnsCerrar
const btnCerrarPruebas = document.querySelector('#cerrarPruebas');
const btnCerrarPruebasver = document.querySelector('#cerrarPruebasVer');
const cerrarEntrevista = document.querySelector('#cerrarEntrevista');
const cerrarEntrevistaVer = document.querySelector('#cerrarEntrevistaVer');
const cerrarDocumentos = document.querySelector('#cerrarDocumentos');
const cerrarDescargaDocumentos = document.querySelector('#cerrarDescargaDocumentos');
// Ventanas emergentes

const pruebasFormulario = document.querySelector('#pruebaPsicometrica');
const resultadosPrueba = document.querySelector('#resultadosPsicometrica');
const agendarCita = document.querySelector('#datosEntrevista')
const agendarCitaVer = document.querySelector('#datosEntrevistaVer')
const solicitarDocumentos = document.querySelector('#solicitarDocumentos');
const descargaDocuementos = document.querySelector('#descargaDocuementos');

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

        btnCerrarPruebasver.addEventListener('click', cerrarPruebasVer);
        if (btnAgendar) {
            btnAgendar.addEventListener('click', mostrarDatosEntrevista);
        }
        if (btnAgendarVer) {
            btnAgendarVer.addEventListener('click', mostrarDatosEntrevistaVer);
        }

        if(btnDocumentos){
            btnDocumentos.addEventListener('click', mostrarDocumentos);
        }
        if(btnDocumentosVer){
            btnDocumentosVer.addEventListener('click', mostrarDocumentosVer);
        }


        cerrarEntrevista.addEventListener('click', cerrarDatosEntrevista);
        cerrarEntrevistaVer.addEventListener('click', cerrarDatosEntrevistaVer);
        cerrarDocumentos.addEventListener('click', cerrarDocumentosForm);
        cerrarDescargaDocumentos.addEventListener('click', cerrarDocumentosDescargar);
    })
}



// Funciones



function mostrarDocumentosVer(e) {
    e.preventDefault();
    if (descargaDocuementos.classList.contains('ocultar')) {
        descargaDocuementos.classList.remove('ocultar');
        descargaDocuementos.classList.add('mostrarMenu');
    }
}

function cerrarDocumentosDescargar(e){
    e.preventDefault();
    if (descargaDocuementos.classList.contains('mostrarMenu')) {
        descargaDocuementos.classList.remove('mostrarMenu');
        descargaDocuementos.classList.add('ocultar');
    }
}

function mostrarDocumentos(e){
    e.preventDefault();
    if (solicitarDocumentos.classList.contains('ocultar')) {
        solicitarDocumentos.classList.remove('ocultar');
        solicitarDocumentos.classList.add('mostrarMenu');
    }
}

function cerrarDocumentosForm(e){
    e.preventDefault();
    if (solicitarDocumentos.classList.contains('mostrarMenu')) {
        solicitarDocumentos.classList.remove('mostrarMenu');
        solicitarDocumentos.classList.add('ocultar');
    }
}

function mostrarDatosEntrevistaVer(e) {
    e.preventDefault();
    if (agendarCitaVer.classList.contains('ocultar')) {
        agendarCitaVer.classList.remove('ocultar');
        agendarCitaVer.classList.add('mostrarMenu');
    }
}
function cerrarDatosEntrevistaVer(e){
    e.preventDefault();
    if (agendarCitaVer.classList.contains('mostrarMenu')) {
        agendarCitaVer.classList.remove('mostrarMenu');
        agendarCitaVer.classList.add('ocultar');
    }
}

function mostrarDatosEntrevista(e) {
    e.preventDefault();
    if (agendarCita.classList.contains('ocultar')) {
        agendarCita.classList.remove('ocultar');
        agendarCita.classList.add('mostrarMenu');
    }
}
function cerrarDatosEntrevista(e) {
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








// Obtener la referencia al campo de entrada de tipo date
const fechaCitaInput = document.getElementById('fechaCita');

// Obtener la fecha actual
const fechaActual = new Date();
const diaActual = fechaActual.getDate();
const mesActual = fechaActual.getMonth() + 1; // Los meses en JavaScript son base 0 (0 = enero, 1 = febrero, etc.)
const añoActual = fechaActual.getFullYear();

// Formatear la fecha actual como yyyy-mm-dd (formato requerido para el campo de entrada de tipo date)
const fechaActualFormateada = `${añoActual}-${mesActual.toString().padStart(2, '0')}-${diaActual.toString().padStart(2, '0')}`;

// Establecer la fecha actual como el mínimo para el campo de entrada de tipo date
fechaCitaInput.setAttribute('min', fechaActualFormateada);


// Agregar evento al botón para agregar documentos
const botonAgregar = document.getElementById('agregarDocumento');
botonAgregar.addEventListener('click', agregarCampoDocumento);
let contador = 2;
// Función para agregar un nuevo campo de documento
function agregarCampoDocumento() {
    contador++;
    

    const documentosAdicionales = document.getElementById('documentosAdicionales');
    const nuevoCampo = document.createElement('div');
    nuevoCampo.classList.add('campo', 'documento');
    nuevoCampo.innerHTML = `
        <label for="documento">Documento: ${contador}</label>
        <input type="text" name="documentos[]" required>
    `;
    documentosAdicionales.appendChild(nuevoCampo);
    
}