// Variables
const subirFoto = document.querySelector('#inputFile');
const grid1 = document.querySelector('.grid1');
const grid2 = document.querySelector('.grid2');
const grid3 = document.querySelector('.grid3');
const grid4 = document.querySelector('.grid4');
const banner_izquierda = document.querySelector('#banner_izquierda')
const siguiente = document.querySelector('#siguiente');
const atras = document.querySelector('#atras');

let paginador = 1;
console.log(paginador);
// Eventos

eventListeners();
function eventListeners(){
    addEventListener('DOMContentLoaded', () => {
        subirFoto.addEventListener('change', mostrarImagen);
        siguiente.addEventListener('click', siguienteFormulario);
        atras.addEventListener('click', atrasFormulario);
       
    });
}



mostrarFormulario(paginador);

function siguienteFormulario(e){
    e.preventDefault();
    paginador++;
   
    if(paginador > 4){
        paginador = 4;
    }
    mostrarFormulario(paginador);
}
function atrasFormulario(e){
    e.preventDefault();
    paginador--;
    if(paginador <= 0 ){
        paginador = 1;
    }
   
    mostrarFormulario(paginador);
    
}

function mostrarFormulario(paginador){
    
    
    console.log(paginador);
    if(paginador === 1){
        if (grid1.classList.contains('ocultar')) {
            grid1.classList.remove('ocultar');
            grid2.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid1.classList.add('mostrar');
        }
        const divpaso = document.createElement('h3')
        divpaso.innerHTML = ` 
            <h3> Paso ${paginador}</h3>
        `;

        banner_izquierda.appendChild(divpaso);

        
    }
    if (paginador === 2){
        if (grid2.classList.contains('ocultar')) {
            grid2.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid2.classList.add('mostrar');
        }

        const divpaso = document.createElement('h3')
        divpaso.innerHTML = ` 
            <h3> Paso ${paginador}</h3>
        `;

        banner_izquierda.appendChild(divpaso);
    }
    if (paginador === 3){
        if (grid3.classList.contains('ocultar')) {
            grid3.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid2.classList.add('ocultar');
            grid4.classList.add('ocultar');
            grid3.classList.add('mostrar');
        }
        
    }
    if (paginador === 4){
        if (grid4.classList.contains('ocultar')) {
            grid4.classList.remove('ocultar');
            grid1.classList.add('ocultar');
            grid2.classList.add('ocultar');
            grid3.classList.add('ocultar');
            grid4.classList.add('mostrar');
        }
        
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