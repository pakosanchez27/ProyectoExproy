// Variables
const subirPerfil = document.querySelector('#fotoPerfil') ;
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

// Variables marco
let paginador = 1;
console.log(paginador);

// Eventos
eventListeners();

function eventListeners() {
  
    subirPerfil.addEventListener('change', mostrarPerfil);
    subirPortada.addEventListener('change', mostrarPortada);
    siguientebtn.addEventListener('click', siguienteFormulario);
    atras.addEventListener('click', atrasFormulario);
 
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
  const divpaso = document.querySelector('#divpaso');
  const descripcion = document.querySelector('#descripcion');

  limpiarHTML(divpaso);
  console.log(paginador);
  if (paginador === 1) {
    if (grid1.classList.contains('ocultar')) {
      grid1.classList.remove('ocultar');
      grid2.classList.add('ocultar');
      grid3.classList.add('ocultar');
      grid4.classList.add('ocultar');
      grid5.classList.add('ocultar');
      grid1.classList.add('mostrar');

      grid2.classList.remove('mostrar');
      grid3.classList.remove('mostrar');
      grid4.classList.remove('mostrar');
      grid5.classList.remove('mostrar');
    }

    flujo1.classList.add('activo', 'activoTexto');
    flujo2.classList.remove('activo', 'activoTexto');
    flujo3.classList.remove('activo', 'activoTexto');
    flujo4.classList.remove('activo', 'activoTexto');
    flujo5.classList.remove('activo', 'activoTexto');

    divpaso.innerHTML = `Paso ${paginador}`;
    descripcion.innerHTML = "Dinos cómo contactarte si una empresa está interesada en tu perfil";

    flujotexto1.classList.add('activoTexto');
    flujotexto2.classList.remove('activoTexto');
    flujotexto3.classList.remove('activoTexto');
    flujotexto4.classList.remove('activoTexto');
    flujotexto5.classList.remove('activoTexto');

    titulo.innerHTML = 'Tu información Personal';
    textoPrincipal.innerHTML = 'Aquí empieza tu camino al éxito!';
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

      grid1.classList.remove('mostrar');
      grid3.classList.remove('mostrar');
      grid4.classList.remove('mostrar');
      grid5.classList.remove('mostrar');
    }

    flujo1.classList.remove('activo', 'activoTexto');
    flujo2.classList.add('activo', 'activoTexto');
    flujo3.classList.remove('activo', 'activoTexto');
    flujo4.classList.remove('activo', 'activoTexto');
    flujo5.classList.remove('activo', 'activoTexto');

    divpaso.innerHTML = `Paso ${paginador}`;
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

      grid1.classList.remove('mostrar');
      grid2.classList.remove('mostrar');
      grid4.classList.remove('mostrar');
      grid5.classList.remove('mostrar');
    }

    flujo1.classList.remove('activo', 'activoTexto');
    flujo2.classList.remove('activo', 'activoTexto');
    flujo3.classList.add('activo', 'activoTexto');
    flujo4.classList.remove('activo', 'activoTexto');
    flujo5.classList.remove('activo', 'activoTexto');

    divpaso.innerHTML = `Paso ${paginador}`;
    descripcion.innerHTML = "Ayuda a las empresas a saber en qué ámbitos te has desempeñado.";

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

      grid1.classList.remove('mostrar');
      grid2.classList.remove('mostrar');
      grid3.classList.remove('mostrar');
      grid5.classList.remove('mostrar');
    }

    flujo1.classList.remove('activo', 'activoTexto');
    flujo2.classList.remove('activo', 'activoTexto');
    flujo3.classList.remove('activo', 'activoTexto');
    flujo5.classList.remove('activo', 'activoTexto');
    flujo4.classList.add('activo', 'activoTexto');

    divpaso.innerHTML = `Paso ${paginador}`;
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

      grid1.classList.remove('mostrar');
      grid2.classList.remove('mostrar');
      grid3.classList.remove('mostrar');
      grid4.classList.remove('mostrar');
      grid5.classList.remove('mostrar');
    }

    flujo1.classList.remove('activo', 'activoTexto');
    flujo2.classList.remove('activo', 'activoTexto');
    flujo3.classList.remove('activo', 'activoTexto');
    flujo4.classList.remove('activo', 'activoTexto');
    flujo5.classList.add('activo', 'activoTexto');

    divpaso.innerHTML = `Paso ${paginador}`;
    descripcion.innerHTML = "Cuéntanos cuál es el área de tu interés o tu especialidad.";

    flujotexto1.classList.remove('activoTexto');
    flujotexto2.classList.remove('activoTexto');
    flujotexto3.classList.remove('activoTexto');
    flujotexto4.classList.remove('activoTexto');
    flujotexto5.classList.add('activoTexto');

    titulo.innerHTML = 'Preferencias de Empleo';
    textoPrincipal.innerHTML = 'Cuéntanos cuál es el área de tu interés o tu especialidad.';

    siguientebtn.remove();
    btnSubmit();
  }
}

function btnSubmit() {
  siguienteSubmit.type = 'submit';
  siguienteSubmit.value = 'Siguiente';
  contenedorBtn.style.flexDirection = 'row';
  siguienteSubmit.classList.add('boton__verde', 'ultimo');
  siguienteSubmit.id = 'siguiente';

  contenedorBtn.appendChild(siguienteSubmit);
}

function btnSiguiente() {
  siguientebtn.textContent = 'Siguiente';
  contenedorBtn.style.flexDirection = 'row';
  siguientebtn.classList.add('boton__verde');
  siguientebtn.id = 'siguienteFinal';

  contenedorBtn.appendChild(siguientebtn);
}

// función para mostrar la imagen en formulario
function mostrarPerfil(event) {
  var input = event.target;
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

function agregarIdioma() {
  var nuevosIdiomasDiv = document.getElementById("nuevos-idiomas");

  var nuevoIdiomaDiv = document.createElement("div");
  nuevoIdiomaDiv.className = "campo idiomas";

  var nuevoIdiomaLabel = document.createElement("label");
  nuevoIdiomaLabel.textContent = "Idiomas";
  nuevoIdiomaDiv.appendChild(nuevoIdiomaLabel);

  var nuevoIdiomaInput = document.createElement("input");
  nuevoIdiomaInput.type = "text";
  nuevoIdiomaInput.name = "idiomas[]";
  nuevoIdiomaInput.placeholder = "Que idiomas dominas";
  nuevoIdiomaDiv.appendChild(nuevoIdiomaInput);

  var nuevoNivelDiv = document.createElement("div");
  nuevoNivelDiv.className = "campo nivel";

  var nuevoNivelLabel = document.createElement("label");
  nuevoNivelLabel.textContent = "Nivel";
  nuevoNivelDiv.appendChild(nuevoNivelLabel);

  var nuevoNivelSelect = document.createElement("select");
  nuevoNivelSelect.name = "nivel[]";

  var nuevoNivelDefaultOption = document.createElement("option");
  nuevoNivelDefaultOption.disabled = true;
  nuevoNivelDefaultOption.selected = true;
  nuevoNivelDefaultOption.textContent = "-- selecciona el nivel --";
  nuevoNivelSelect.appendChild(nuevoNivelDefaultOption);

  var nuevoNivelBasicoOption = document.createElement("option");
  nuevoNivelBasicoOption.value = "basico";
  nuevoNivelBasicoOption.textContent = "Básico";
  nuevoNivelSelect.appendChild(nuevoNivelBasicoOption);

  var nuevoNivelIntermedioOption = document.createElement("option");
  nuevoNivelIntermedioOption.value = "intermedio";
  nuevoNivelIntermedioOption.textContent = "Intermedio";
  nuevoNivelSelect.appendChild(nuevoNivelIntermedioOption);

  var nuevoNivelAvanzadoOption = document.createElement("option");
  nuevoNivelAvanzadoOption.value = "avanzado";
  nuevoNivelAvanzadoOption.textContent = "Avanzado";
  nuevoNivelSelect.appendChild(nuevoNivelAvanzadoOption);

  nuevoNivelDiv.appendChild(nuevoNivelSelect);

  nuevosIdiomasDiv.appendChild(nuevoIdiomaDiv);
  nuevosIdiomasDiv.appendChild(nuevoNivelDiv);
}

function mostrarNombreArchivo(inputId) {
  const input = document.getElementById(inputId); // Use getElementById to select elements by their IDs
  const fileName = input.files[0].name;
  const customUpload = document.querySelector(`label[for=${inputId}] .custom-file-upload`);
  customUpload.textContent = fileName;
}

