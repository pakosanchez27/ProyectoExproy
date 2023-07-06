// variables
const acercaContenedor  = document.querySelector('#acercaContenedor');
const acerca = document.querySelector('#acerca');

// eventos


    document.addEventListener('DOMContentLoaded', () =>{
        const verMas = document.createElement('span');
        verMas.classList.add('ver-mas');
        verMas.textContent = '...Ver más';

        acercaContenedor.appendChild(verMas);

        verMas.addEventListener('click', () => {
            acercaContenedor.style.maxHeight = 'none'; // Remueve la altura máxima
            acerca.style.height = 'auto'; // Remueve la altura máxima
            acercaContenedor.style.overflow = 'visible'; // Hace que el contenido sea visible completamente
            verMas.style.display = 'none'; // Oculta la leyenda "Ver más"
        })
    });

  




// funcione

