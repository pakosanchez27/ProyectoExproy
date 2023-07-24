// Variables

// Botones
const editarFoto = document.querySelector('#editarFoto');
const editarPersonal = document.querySelector('#editarPersonal');
const editarDatos = document.querySelector('#editarDatos');
const editarAcerca = document.querySelector('#editarAcerca');
const EducacionAgregar = document.querySelector('#EducacionAgregar');
const EducacionModificar = document.querySelectorAll('.EducacionModificar');
const ExperienciaAgregar = document.querySelector('#ExperienciaAgregar');
const ExperienciaModificar = document.querySelector('#ExperienciaModificar');
const proyectoAgregar = document.querySelector('#proyectoAgregar');
const proyectoModificar = document.querySelectorAll('.proyectoModificar');

const certificadosAgregar = document.querySelector('#certificadosAgregar');
// const certificadosModificar = document.querySelector('#certificadosModificar');
const insigniasEditar = document.querySelector('#insigniasEditar');
const redesAgregar = document.querySelector('#redesAgregar');
const idiomasAgregar = document.querySelector('#idiomasAgregar');


const salirFoto = document.querySelector('#salirFoto');
const salirPersonal = document.querySelector('#salirPersonal');
const salirDatos = document.querySelector('#salirDatos');
const salirAcerca = document.querySelector('#salirAcerca');
const salirAgregarEducacion = document.querySelector('#salirAgregarEducacion');
const salirEducacionModificar = document.querySelector('#salirEducacionModificar');
const salirExperienciaAgregar = document.querySelector('#salirExperienciaAgregar');
// const salirExperienciaModificar = document.querySelector('#salirExperienciaModificar');
const salirProyectoAgregar = document.querySelector('#salirProyectoAgregar');
const salircertificadosAgregar = document.querySelector('#salircertificadosAgregar');
const salirProyectoModificar = document.querySelectorAll('.salirProyectoModificar');
const salirAgregarHabilidades = document.querySelector('#salirAgregarHabilidades');
const salirRedes = document.querySelector('#salirRedes');
const salirIdioma = document.querySelector('#salirIdioma');


// Formularios
const formularioFoto = document.querySelector('#fotos');
const formularioPersonal = document.querySelector('#personal');
const formularioContacto = document.querySelector('#formularioContacto');
const formularioAcerca = document.querySelector('#formularioAcerca');
const agregarEducacion = document.querySelector('#agregarEducacion');
const modificarEducacion = document.querySelector('#modificarEducacion');
const agregarExperiencia = document.querySelector('#agregarExperiencia');
// const editarExperiencia = document.querySelector('#editarExperiencia');
const agregarProyecto = document.querySelector('#agregarProyecto');
const editarProyecto = document.querySelector('#editarProyecto');
const agregarCertificacion = document.querySelector('#agregarCertificacion');
// const editarCertificacion = document.querySelector('#editarCertificacion');
const agregarHabilidades = document.querySelector('#agregarHabilidades');
const formularioRedes = document.querySelector('#formularioRedes');
const agregarIdiomas = document.querySelector('#agregarIdiomas');

// Eventos
// Eventos

document.addEventListener('DOMContentLoaded', () => {
    // Agregar
    editarFoto.addEventListener('click', mostrarFormulario);
    editarPersonal.addEventListener('click', mostrarFormulario);
    editarDatos.addEventListener('click', mostrarFormulario);
    editarAcerca.addEventListener('click', mostrarFormulario);
    ExperienciaAgregar.addEventListener('click', mostrarFormulario);
    proyectoAgregar.addEventListener('click', mostrarFormulario);
    EducacionAgregar.addEventListener('click', mostrarFormulario);




    EducacionModificar.forEach(educacion => {
        educacion.addEventListener('click', mostrarFormularioEdu);
    })

   
    // ExperienciaModificar.addEventListener('click', mostrarFormulario);
    // editarCertificacion.addEventListener('click', mostrarFormulario);
    agregarCertificacion.addEventListener('click', mostrarFormulario);
    // certificadosModificar.addEventListener('click', mostrarFormulario);
    certificadosAgregar.addEventListener('click', mostrarFormulario);
    insigniasEditar.addEventListener('click', mostrarFormulario);
    redesAgregar.addEventListener('click', mostrarFormulario);
    idiomasAgregar.addEventListener('click', mostrarFormulario);

    salirFoto.addEventListener('click', salirFormulario);
    salirPersonal.addEventListener('click', salirFormulario);
    salirDatos.addEventListener('click', salirFormulario);
    salirAcerca.addEventListener('click', salirFormulario);
    salirAgregarEducacion.addEventListener('click', salirFormulario);
    salirEducacionModificar.addEventListener('click', salirFormulario);
    salirExperienciaAgregar.addEventListener('click', salirFormulario);
    salirExperienciaModificar.addEventListener('click', salirFormulario);
    // salirProyectoModificar.addEventListener('click', salirFormulario);
    salirProyectoAgregar.addEventListener('click', salirFormulario);
    salirProyectoModificar.forEach(salirProyectoBtn => {
        salirProyectoBtn.addEventListener('click', salirProyecto);
    });
    salircertificadosAgregar.addEventListener('click', salirFormulario);
    // salircertificadosModificar.addEventListener('click', salirFormulario);
    salirAgregarHabilidades.addEventListener('click', salirFormulario);
    salirRedes.addEventListener('click', salirFormulario);
    salirIdioma.addEventListener('click', salirFormulario);

});

function mostrarFormularioEdu(e){
    // e.preventDefault(); 
    if (modificarEducacion.classList.contains('ocultar')) {
        modificarEducacion.classList.remove('ocultar');
        modificarEducacion.classList.add('mostrarMenu');
    }

    
}

function mostrarFormularioProyecto(e) {
    e.preventDefault();


    // Continuar con el resto del código para mostrar el formulario emergente
    if (editarProyecto.classList.contains('ocultar')) {
        editarProyecto.classList.remove('ocultar');
        editarProyecto.classList.add('mostrarMenu');
    }
}

function salirProyecto(e){
    e.preventDefault(); 
    if (editarProyecto.classList.contains('mostrarMenu')) {
        editarProyecto.classList.remove('mostrarMenu');
        editarProyecto.classList.add('ocultar');
    }
}
// Funciones
function mostrarFormulario(e) {
    // e.preventDefault();
    const btnID = e.target.parentElement.id;
    // console.log(btnID);

    switch (btnID) {
        case 'editarFoto':
            if (formularioFoto.classList.contains('ocultar')) {
                formularioFoto.classList.remove('ocultar');
                formularioFoto.classList.add('mostrarMenu');
            }
            break;
        case 'editarPersonal':
            if (formularioPersonal.classList.contains('ocultar')) {
                formularioPersonal.classList.remove('ocultar');
                formularioPersonal.classList.add('mostrarMenu');
            }
            break;
        case 'editarDatos':
            if (formularioContacto.classList.contains('ocultar')) {
                formularioContacto.classList.remove('ocultar');
                formularioContacto.classList.add('mostrarMenu');
            }
            break;
        case 'editarAcerca':
            if (formularioAcerca.classList.contains('ocultar')) {
                formularioAcerca.classList.remove('ocultar');
                formularioAcerca.classList.add('mostrarMenu');
            }
            break;
        case 'EducacionAgregar':
            if (agregarEducacion.classList.contains('ocultar')) {
                agregarEducacion.classList.remove('ocultar');
                agregarEducacion.classList.add('mostrarMenu');
            }
            break;
        case 'ExperienciaAgregar':
            if (agregarExperiencia.classList.contains('ocultar')) {
                agregarExperiencia.classList.remove('ocultar');
                agregarExperiencia.classList.add('mostrarMenu');
            }
            break;
        case 'ExperienciaModificar':
            if (editarExperiencia.classList.contains('ocultar')) {
                editarExperiencia.classList.remove('ocultar');
                editarExperiencia.classList.add('mostrarMenu');
            }
            break;
        case 'proyectoAgregar':
            if (agregarProyecto.classList.contains('ocultar')) {
                agregarProyecto.classList.remove('ocultar');
                agregarProyecto.classList.add('mostrarMenu');
            }
            break;
        case 'certificadosAgregar':
            if (agregarCertificacion.classList.contains('ocultar')) {
                agregarCertificacion.classList.remove('ocultar');
                agregarCertificacion.classList.add('mostrarMenu');
            }
            break;
        case 'insigniasEditar':
            if (agregarHabilidades.classList.contains('ocultar')) {
                agregarHabilidades.classList.remove('ocultar');
                agregarHabilidades.classList.add('mostrarMenu');
            }
            break;
        case 'redesAgregar':
            if (formularioRedes.classList.contains('ocultar')) {
                formularioRedes.classList.remove('ocultar');
                formularioRedes.classList.add('mostrarMenu');
            }
            break;
        case 'idiomasAgregar':
            if (agregarIdiomas.classList.contains('ocultar')) {
                agregarIdiomas.classList.remove('ocultar');
                agregarIdiomas.classList.add('mostrarMenu');
            }
            break;
    }
}

function salirFormulario(e) {
    e.preventDefault();
    console.log('Hola desde js');
    const btnID = e.target.id;


    switch (btnID) {
        case 'salirFoto':
            if (formularioFoto.classList.contains('mostrarMenu')) {
                formularioFoto.classList.remove('mostrarMenu');
                formularioFoto.classList.add('ocultar');
            }
            break;
        case 'salirPersonal':
            console.log("hola");
            if (formularioPersonal.classList.contains('mostrarMenu')) {
                formularioPersonal.classList.remove('mostrarMenu');
                formularioPersonal.classList.add('ocultar');

            }
            break;
        case 'salirDatos':
            if (formularioContacto.classList.contains('mostrarMenu')) {
                formularioContacto.classList.remove('mostrarMenu');
                formularioContacto.classList.add('ocultar');
            }
            break;
        case 'salirAcerca':
            if (formularioAcerca.classList.contains('mostrarMenu')) {
                formularioAcerca.classList.remove('mostrarMenu');
                formularioAcerca.classList.add('ocultar');
            }
            break;
        case 'salirAgregarEducacion':

            if (agregarEducacion.classList.contains('mostrarMenu')) {
                agregarEducacion.classList.remove('mostrarMenu');
                agregarEducacion.classList.add('ocultar');
            }
            break;
        case 'salirEducacionModificar':
            if (modificarEducacion.classList.contains('mostrarMenu')) {
                modificarEducacion.classList.remove('mostrarMenu');
                modificarEducacion.classList.add('ocultar');
            }
            break;
        case 'salirExperienciaAgregar':
            if (agregarExperiencia.classList.contains('mostrarMenu')) {
                agregarExperiencia.classList.remove('mostrarMenu');
                agregarExperiencia.classList.add('ocultar');
            }
            break;
        case 'salirExperienciaModificar':
            if (editarExperiencia.classList.contains('mostrarMenu')) {
                editarExperiencia.classList.remove('mostrarMenu');
                editarExperiencia.classList.add('ocultar');
            }
            break;
        case 'salirProyectoAgregar':
            if (agregarProyecto.classList.contains('mostrarMenu')) {
                agregarProyecto.classList.remove('mostrarMenu');
                agregarProyecto.classList.add('ocultar');
            }
            break;

        case 'salircertificadosAgregar':
            if (agregarCertificacion.classList.contains('mostrarMenu')) {
                agregarCertificacion.classList.remove('mostrarMenu');
                agregarCertificacion.classList.add('ocultar');
            }
            break;
        case 'salirAgregarHabilidades':
            if (agregarHabilidades.classList.contains('mostrarMenu')) {
                agregarHabilidades.classList.remove('mostrarMenu');
                agregarHabilidades.classList.add('ocultar');
            }
            break;
        case 'salirRedes':
            if (formularioRedes.classList.contains('mostrarMenu')) {
                formularioRedes.classList.remove('mostrarMenu');
                formularioRedes.classList.add('ocultar');
            }
            break;
        case 'salirIdioma':
            if (agregarIdiomas.classList.contains('mostrarMenu')) {
                agregarIdiomas.classList.remove('mostrarMenu');
                agregarIdiomas.classList.add('ocultar');
            }
            break;
        
    }
}


document.getElementById('agregarRedSocial').addEventListener('click', function (e) {
    e.preventDefault();

    // Clonar el campo de redes sociales
    var redSocial = document.querySelector('.redSocial');
    var clone = redSocial.cloneNode(true);

    // Incrementar los IDs de los elementos clonados para que sean únicos
    var campoSelect = clone.querySelector('select');
    var campoInput = clone.querySelector('input[type="text"]');
    var numRedesSociales = document.querySelectorAll('.redSocial').length + 1;
    campoSelect.id = 'red' + numRedesSociales;
    campoInput.id = 'redLink' + numRedesSociales;
    campoSelect.name = 'red[]' + numRedesSociales;
    campoInput.name = 'redLink[]' + numRedesSociales;

    // Limpiar el valor del nuevo campo de URL
    campoInput.value = '';

    // Agregar el campo clonado al formulario
    redSocial.parentNode.appendChild(clone);

    // Mover el botón "Agregar otra red social" al final de los campos
    redSocial.parentNode.appendChild(this);
});


// Obtén todos los enlaces de eliminación por su clase
var eliminarEnlaces = document.querySelectorAll('.eliminar-habilidad');

// Recorre cada enlace y agrega el evento de clic
for (var i = 0; i < eliminarEnlaces.length; i++) {
    eliminarEnlaces[i].addEventListener('click', function () {
        // Obtén el elemento padre del enlace (div.insignia)
        var divInsignia = this.parentNode;

        // Obtén el ID de habilidad del atributo de datos
        var idHabilidad = this.getAttribute('data-id');
        var  idUsuario= this.getAttribute('user-id');
        console.log(idHabilidad, idUsuario);
        // Realiza una solicitud AJAX a tu archivo PHP que maneja la eliminación
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/Candidato/Model/eliminar.php?id=' + idUsuario +'&idHabilidad=' + idHabilidad, true);
        xhr.onload = function () {
            // Verifica si la solicitud se ha completado correctamente
            if (xhr.status === 200) {
                // Elimina el elemento de la vista una vez que se ha eliminado de la base de datos
                divInsignia.remove();
            }
        };
        xhr.send();
    });
}
