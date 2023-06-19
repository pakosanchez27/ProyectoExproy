// Variables
// Botones
const editarFoto = document.querySelector('#editarFoto');
const editarPersonal = document.querySelector('#editarPersonal');
const editarDatos = document.querySelector('#editarDatos');
const editarAcerca = document.querySelector('#editarAcerca');
const EducacionAgregar = document.querySelector('#EducacionAgregar');
const EducacionModificar = document.querySelector('#EducacionModificar');
const ExperienciaAgregar = document.querySelector('#ExperienciaAgregar');
const ExperienciaModificar = document.querySelector('#ExperienciaModificar');
const proyectoAgregar = document.querySelector('#proyectoAgregar');
const proyectoModificar = document.querySelector('#proyectoModificar');
const certificadosAgregar = document.querySelector('#certificadosAgregar');
const certificadosModificar = document.querySelector('#certificadosModificar');

const salirFoto = document.querySelector('#salirFoto');
const salirPersonal = document.querySelector('#salirPersonal');
const salirDatos = document.querySelector('#salirDatos');
const salirAcerca = document.querySelector('#salirAcerca');
const salirAgregarEducacion = document.querySelector('#salirAgregarEducacion');
const salirEducacionModificar = document.querySelector('#salirEducacionModificar');
const salirExperienciaAgregar = document.querySelector('#salirExperienciaAgregar'); 
const salirProyectoAgregar = document.querySelector('#salirProyectoAgregar'); 
const salirProyectoModificar = document.querySelector('#salirProyectoModificar'); 
const salircertificadosAgregar = document.querySelector('#salircertificadosAgregar'); 
const salircertificadosModificar = document.querySelector('#salircertificadosModificar'); 

// Formularios
const formularioFoto = document.querySelector('#fotos');
const formularioPersonal = document.querySelector('#personal');
const formularioContacto = document.querySelector('#DatosContacto');
const formularioAcerca = document.querySelector('#DatosAcerca');
const agregarEducacion = document.querySelector('#agregarEducaion');
const modificarEducacion = document.querySelector('#modificarEducacion');
const agregarExperiencia = document.querySelector('#agregarExperiencia');
const editarExperiencia = document.querySelector('#editarExperiencia');
const agregarProyecto = document.querySelector('#agregarProyecto');
const editarProyecto = document.querySelector('#editarProyecto');
const agregarCertificacion = document.querySelector('#agregarCertificacion');

// Eventos
eventListeners();
function eventListeners() {
    document.addEventListener('DOMContentLoaded', () => {
        console.log("Hola mundo");
    });
    editarFoto.addEventListener('click', mostrarFormulario);
    editarPersonal.addEventListener('click', mostrarFormulario);
    editarDatos.addEventListener('click', mostrarFormulario);
    editarAcerca.addEventListener('click', mostrarFormulario);
    EducacionAgregar.addEventListener('click', mostrarFormulario);
    EducacionModificar.addEventListener('click', mostrarFormulario);
    ExperienciaAgregar.addEventListener('click', mostrarFormulario);
    ExperienciaModificar.addEventListener('click', mostrarFormulario);
    proyectoAgregar.addEventListener('click', mostrarFormulario);
    proyectoModificar.addEventListener('click', mostrarFormulario);
    certificadosAgregar.addEventListener('click', mostrarFormulario);
    certificadosModificar.addEventListener('click', mostrarFormulario);

    salirFoto.addEventListener('click', salirFormulario);
    salirPersonal.addEventListener('click', salirFormulario);
    salirDatos.addEventListener('click', salirFormulario);
    salirAcerca.addEventListener('click', salirFormulario);
    salirAgregarEducacion.addEventListener('click', salirFormulario);
    salirEducacionModificar.addEventListener('click', salirFormulario);
    salirExperienciaAgregar.addEventListener('click', salirFormulario);
    salirExperienciaModificar.addEventListener('click', salirFormulario);
    salirProyectoModificar.addEventListener('click', salirFormulario);
    salirProyectoAgregar.addEventListener('click', salirFormulario);
    salircertificadosAgregar.addEventListener('click', salirFormulario);
    salircertificadosModificar.addEventListener('click', salirFormulario);
}

// Funciones
function mostrarFormulario(e) {
    e.preventDefault();
    const btnID = e.target.parentElement.id; 
    console.log(btnID);

    if (btnID === 'editarFoto') {
        if (formularioFoto.classList.contains('ocultar')) {
            formularioFoto.classList.remove('ocultar');
            formularioFoto.classList.add('mostrarMenu');
        }
    } else if (btnID === 'editarPersonal') {
        if (formularioPersonal.classList.contains('ocultar')) {
            formularioPersonal.classList.remove('ocultar');
            formularioPersonal.classList.add('mostrarMenu');
        }
    } else if ('editarDatos') {
        if (formularioContacto.classList.contains('ocultar')) {
            formularioContacto.classList.remove('ocultar');
            formularioContacto.classList.add('mostrarMenu');
        }
    } else if (btnID === 'editarAcerca') {
        if (formularioAcerca.classList.contains('ocultar')) {
            formularioAcerca.classList.remove('ocultar');
            formularioAcerca.classList.add('mostrarMenu');
        }
    }else if (btnID === 'EducacionAgregar') {
        if (agregarEducacion.classList.contains('ocultar')) {
            agregarEducacion.classList.remove('ocultar');
            agregarEducacion.classList.add('mostrarMenu');
        }
    } else if (btnID === 'EducacionModificar') {
        if (modificarEducacion.classList.contains('ocultar')) {
            modificarEducacion.classList.remove('ocultar');
            modificarEducacion.classList.add('mostrarMenu');
        }
    } 
    else if (btnID === 'ExperienciaAgregar') {
        if (modificarEducacion.classList.contains('ocultar')) {
            modificarEducacion.classList.remove('ocultar');
            modificarEducacion.classList.add('mostrarMenu');
        }
    } 
    else if (btnID === 'ExperienciaModificar') {
        if (modificarEducacion.classList.contains('ocultar')) {
            modificarEducacion.classList.remove('ocultar');
            modificarEducacion.classList.add('mostrarMenu');
        }
    } 
    else if (btnID === 'proyectoAgregar') {
        if (modificarEducacion.classList.contains('ocultar')) {
            modificarEducacion.classList.remove('ocultar');
            modificarEducacion.classList.add('mostrarMenu');
        }
    } 
    else if (btnID === 'proyectoModificar') {
        if (modificarEducacion.classList.contains('ocultar')) {
            modificarEducacion.classList.remove('ocultar');
            modificarEducacion.classList.add('mostrarMenu');
        }
    } 
}

function salirFormulario(e) {
    e.preventDefault();

    const btnID = e.target.id;
    console.log(btnID);
    if (btnID === 'salirFoto') {
        if (formularioFoto.classList.contains('mostrarMenu')) {
            formularioFoto.classList.remove('mostrarMenu');
            formularioFoto.classList.add('ocultar');
        }
    } else if (btnID === 'salirPersonal') {
        if (formularioPersonal.classList.contains('mostrarMenu')) {
            formularioPersonal.classList.remove('mostrarMenu');
            formularioPersonal.classList.add('ocultar');
        }
    } else if (btnID === 'salirDatos') {
        if (formularioContacto.classList.contains('mostrarMenu')) {
            formularioContacto.classList.remove('mostrarMenu');
            formularioContacto.classList.add('ocultar');
        }
    } else if (btnID === 'salirAcerca') {
        if (formularioAcerca.classList.contains('mostrarMenu')) {
            formularioAcerca.classList.remove('mostrarMenu');
            formularioAcerca.classList.add('ocultar');
        }
    }else if (btnID === 'salirAgregarEducacion') {
        if (agregarEducacion.classList.contains('mostrarMenu')) {
            agregarEducacion.classList.remove('mostrarMenu');
            agregarEducacion.classList.add('ocultar');
        }
    }
    else if (btnID === 'salirEducacionModificar') {
        if (modificarEducacion.classList.contains('mostrarMenu')) {
            modificarEducacion.classList.remove('mostrarMenu');
            modificarEducacion.classList.add('ocultar');
        }
    }
    else if (btnID === 'salirExperienciaAgregar') {
        if (modificarEducacion.classList.contains('mostrarMenu')) {
            modificarEducacion.classList.remove('mostrarMenu');
            modificarEducacion.classList.add('ocultar');
        }
    }else if (btnID === 'salirExperienciaModificar') {
        if (modificarEducacion.classList.contains('mostrarMenu')) {
            modificarEducacion.classList.remove('mostrarMenu');
            modificarEducacion.classList.add('ocultar');
        }
    }
    
}
