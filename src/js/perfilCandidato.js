const acercaContenedor = document.querySelector('#acercaContenedor');

document.addEventListener('DOMContentLoaded', () => {
  const contenido = acercaContenedor.querySelector('p');
  const verMas = document.createElement('span');
  verMas.classList.add('ver-mas');
  verMas.textContent = '...Ver más';

  if (contenido.scrollHeight > acercaContenedor.clientHeight) {
    acercaContenedor.appendChild(verMas);
  }

  verMas.addEventListener('click', () => {
    acercaContenedor.style.maxHeight = 'none'; // Remueve la altura máxima
    acercaContenedor.style.overflow = 'visible'; // Hace que el contenido sea visible completamente
    verMas.style.display = 'none'; // Oculta la leyenda "Ver más"
  });

  
});

