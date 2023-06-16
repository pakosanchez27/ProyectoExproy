// Variables
const subirPerfil = document.querySelector('#fotoPerfil');
const subirPortada = document.querySelector('#fotoPortada');
const grid1 = document.querySelector('.grid1');
const grid2 = document.querySelector('.grid2');
const grid3 = document.querySelector('.grid3');
const grid4 = document.querySelector('.grid4');
const grid5 = document.querySelector('.grid5');
const flujo1 = document.querySelector('#flujo1');
const flujo2 = document.querySelector('#flujo2');
const flujo3 = document.querySelector('#flujo3');
const flujo4 = document.querySelector('#flujo4');
const flujo5 = document.querySelector('#flujo5');

const OptionEstado = document.querySelector('#estado');
const OptionArea = document.querySelector('#area');
const OptionPuesto = document.querySelector('#puesto');
const contenedorBtn = document.querySelector('.derecha__botones');
const siguienteSubmit = document.createElement('input');
const siguientebtn = document.createElement('a');


const flujotexto1 = document.querySelector('#flujotexto1');
const flujotexto2 = document.querySelector('#flujotexto2');
const flujotexto3 = document.querySelector('#flujotexto3');
const flujotexto4 = document.querySelector('#flujotexto4');
const flujotexto5 = document.querySelector('#flujotexto5');

const titulo = document.querySelector('#titulo');
const textoPrincipal = document.querySelector('#textoPrincipal');

const banner_izquierda = document.querySelector('#banner_izquierda')
const siguiente = document.querySelector('#siguiente');
const atras = document.querySelector('#atras');




let paginador = 1;
// console.log(paginador);
// Eventos

eventListeners();
function eventListeners() {
    addEventListener('DOMContentLoaded', () => {
        subirPerfil.addEventListener('change', mostrarPefil);
        subirPortada.addEventListener('change', mostrarPortada);
        siguientebtn.addEventListener('click', siguienteFormulario);
        atras.addEventListener('click', atrasFormulario);


    });
}

// llenar el Select Estados
fetch('../Json/estados.json')
    .then(Response => Response.json())
    .then(Data => {
        // console.log(Object.keys(Data));
        Object.keys(Data).forEach(estado => {
            const optionElement = document.createElement('option');
            optionElement.textContent = estado;
            optionElement.value = estado;
            OptionEstado.appendChild(optionElement);
        });


        estado.addEventListener('change', function (e) {
            ciudad.value = '';

            const EstadoSeleccionado = e.target.value;

            // console.log(EstadoSeleccionado);

            llenarMunicipios(Data, EstadoSeleccionado);


        })

    })
    .catch(error => {
        console.error("error al cargar los datos", error);
    });

function llenarMunicipios(Data, EstadoSeleccionado) {

    Object.values(Data[EstadoSeleccionado]).forEach(municipio => {
        const optionElement2 = document.createElement('option');
        optionElement2.textContent = municipio;
        optionElement2.value = municipio;
        ciudad.appendChild(optionElement2);
    });

}

// llenar Select areas
fetch('../Json/puestos.json')
.then(Response => Response.json())
.then(data => {
    console.log(Object.keys(data));
    Object.keys(data).forEach(area =>{
        const optionElement2 = document.createElement('option');
        optionElement2.textContent = area;
        optionElement2.value = area;
        OptionArea.appendChild(optionElement2);
    });

    area.addEventListener('change',(e)=>{
        const areaSelecionado = e.target.value;
        llenarPuesto(data, areaSelecionado);
    });

    console.log(data["Desarrollo de software y programación"]);
});

function llenarPuesto(data, areaSelecionado){
    OptionPuesto.value = '';

    Object.values(data[areaSelecionado]).forEach(puesto => {
        const optionElement2 = document.createElement('option');
        optionElement2.textContent = puesto;
        optionElement2.value = puesto;
        OptionPuesto.appendChild(optionElement2);
    });
}

mostrarFormulario(paginador);

function siguienteFormulario(e) {
    e.preventDefault();
    paginador++;

    if (paginador > 5) {
        paginador = 5;
    }

    mostrarFormulario(paginador);
}
function atrasFormulario(e) {
    e.preventDefault();
    paginador--;
    if (paginador <= 0) {
        paginador = 1;
    }

    mostrarFormulario(paginador);

}

function mostrarFormulario(paginador) {

    limpiarHTML(divpaso);
    // console.log(paginador);
    if (paginador === 1) {
        if (grid1.classList.contains('ocultar')) {
            grid1.classList.remove('ocultar');
            grid2.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid5.classList.add('ocultar');
            grid1.classList.add('mostrar');
        }



        flujo1.classList.add('activo', 'activoTexto');
        flujo2.classList.remove('activo', 'activoTexto');
        flujo3.classList.remove('activo', 'activoTexto');
        flujo4.classList.remove('activo', 'activoTexto');
        flujo5.classList.remove('activo', 'activoTexto');



        const divpaso = document.querySelector('#divpaso');
        divpaso.innerHTML = `Paso ${paginador}`;
        const descripcion = document.querySelector('#descripcion');
        descripcion.innerHTML = "Dinos como contactarte si una empresa esta interezada en tu perfil";

        flujotexto1.classList.add('activoTexto');
        flujotexto2.classList.remove('activoTexto');
        flujotexto3.classList.remove('activoTexto');
        flujotexto4.classList.remove('activoTexto');
        flujotexto5.classList.remove('activoTexto');

        titulo.innerHTML = 'Tu informacion Personal';
        textoPrincipal.innerHTML = 'Aqui empieza tu camino al exito!';
        siguienteSubmit.remove();
        btnSiguiente();

    }
    if (paginador === 2) {
        if (grid2.classList.contains('ocultar')) {
            grid2.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid5.classList.add('ocultar');
            grid2.classList.add('mostrar');
        }

        flujo1.classList.remove('activo', 'activoTexto');
        flujo2.classList.add('activo', 'activoTexto');
        flujo3.classList.remove('activo', 'activoTexto');
        flujo4.classList.remove('activo', 'activoTexto');
        flujo5.classList.remove('activo', 'activoTexto');



        const divpaso = document.querySelector('#divpaso');
        divpaso.innerHTML = `Paso ${paginador}`;

        const descripcion = document.querySelector('#descripcion');
        descripcion.innerHTML = "Cuéntanos sobre tu formación y lo que sabes.";

        flujotexto1.classList.remove('activoTexto');
        flujotexto2.classList.add('activoTexto');
        flujotexto3.classList.remove('activoTexto');
        flujotexto4.classList.remove('activoTexto');
        flujotexto5.classList.remove('activoTexto');

        titulo.innerHTML = 'Educación y Habilidades';
        textoPrincipal.innerHTML = 'Cuéntanos sobre tu formación y lo que sabes.';
        siguienteSubmit.remove();
        btnSiguiente();
    }
    if (paginador === 3) {
        if (grid3.classList.contains('ocultar')) {
            grid3.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid2.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid5.classList.add('ocultar');
            grid3.classList.add('mostrar');
        }
        flujo1.classList.remove('activo', 'activoTexto');
        flujo2.classList.remove('activo', 'activoTexto');
        flujo3.classList.add('activo', 'activoTexto');
        flujo4.classList.remove('activo', 'activoTexto');
        flujo5.classList.remove('activo', 'activoTexto');

        const divpaso = document.querySelector('#divpaso');
        divpaso.innerHTML = `Paso ${paginador}`;
        const descripcion = document.querySelector('#descripcion');
        descripcion.innerHTML = "Ayuda a las empresas a saber en que ámbitos te has desempeñado.";

        flujotexto1.classList.remove('activoTexto');
        flujotexto2.classList.remove('activoTexto');
        flujotexto3.classList.add('activoTexto');
        flujotexto4.classList.remove('activoTexto');
        flujotexto5.classList.remove('activoTexto');

        titulo.innerHTML = 'Experiencia Laboral';
        textoPrincipal.innerHTML = '¿Puedes hablarnos acerca de tu experiencia laboral?';
        siguienteSubmit.remove();
        btnSiguiente();

    }
    if (paginador === 4) {
        if (grid4.classList.contains('ocultar')) {
            grid4.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid2.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid5.classList.add('ocultar');
            grid4.classList.add('mostrar');
        }

        flujo1.classList.remove('activo', 'activoTexto');
        flujo2.classList.remove('activo', 'activoTexto');
        flujo3.classList.remove('activo', 'activoTexto');
        flujo5.classList.remove('activo', 'activoTexto');
        flujo4.classList.add('activo', 'activoTexto');

        const divpaso = document.querySelector('#divpaso');
        divpaso.innerHTML = `Paso ${paginador}`;
        const descripcion = document.querySelector('#descripcion');
        descripcion.innerHTML = "Agrega una foto de perfil para que las empresas puedan conocerte.";

        flujotexto1.classList.remove('activoTexto');
        flujotexto2.classList.remove('activoTexto');
        flujotexto3.classList.remove('activoTexto');
        flujotexto5.classList.remove('activoTexto');
        flujotexto4.classList.add('activoTexto');

        titulo.innerHTML = 'Foto de Usuario';
        textoPrincipal.innerHTML = 'Actualiza tu foto de perfil.';
        siguienteSubmit.remove();
        btnSiguiente();
    }
    if (paginador === 5) {
        if (grid5.classList.contains('ocultar')) {
            grid5.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid2.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid5.classList.add('mostrar');
        }

        flujo1.classList.remove('activo', 'activoTexto');
        flujo2.classList.remove('activo', 'activoTexto');
        flujo3.classList.remove('activo', 'activoTexto');
        flujo4.classList.remove('activo', 'activoTexto');
        flujo5.classList.add('activo', 'activoTexto');

        const divpaso = document.querySelector('#divpaso');
        divpaso.innerHTML = `Paso ${paginador}`;
        const descripcion = document.querySelector('#descripcion');
        descripcion.innerHTML = "Cuentanos cual es el area de tu interes o tu especialidad.";

        flujotexto1.classList.remove('activoTexto');
        flujotexto2.classList.remove('activoTexto');
        flujotexto3.classList.remove('activoTexto');
        flujotexto4.classList.remove('activoTexto');
        flujotexto5.classList.add('activoTexto');

        titulo.innerHTML = 'Preferencias de Empleo';
        textoPrincipal.innerHTML = 'Cuentanos cual es el area de tu interes o tu especialidad.';

        siguientebtn.remove();
        btnSubmit();

    }
}


function btnSubmit(){
    
        siguienteSubmit.type = 'submit';
        siguienteSubmit.value = 'Siguiente';
        contenedorBtn.style.flexDirection = 'row';
        siguienteSubmit.classList.add('boton', 'verde');
        siguienteSubmit.id = 'siguiente';

        contenedorBtn.appendChild(siguienteSubmit);
}
function btnSiguiente(){
  
    siguientebtn.textContent = 'Siguiente';
    contenedorBtn.style.flexDirection = 'row';
    siguientebtn.classList.add('boton', 'verde');
    siguientebtn.id = 'siguiente';

    contenedorBtn.appendChild(siguientebtn);
}
// funcion para mostrar la imagen en formulario
function mostrarPefil(event) {
    var input = event.target;
    // console.log(input);
    var reader = new FileReader();

    reader.onload = function () {
        var dataURL = reader.result;
        var imagenPreview = document.querySelector(".previewPerfil__foto");


        imagenPreview.style.backgroundImage = "url('" + dataURL + "')";

    };

    reader.readAsDataURL(input.files[0]);
}

function mostrarPortada(event) {
    var input = event.target;
    // console.log(input);
    var reader = new FileReader();

    reader.onload = function () {
        var dataURL = reader.result;

        var imagenPreview2 = document.querySelector(".previewPerfil__portada");


        imagenPreview2.style.backgroundImage = "url('" + dataURL + "')";
    };

    reader.readAsDataURL(input.files[0]);
}
function limpiarHTML(elemento) {
    while (elemento.firstChild) {
        elemento.removeChild(elemento.firstChild);
    }

}
