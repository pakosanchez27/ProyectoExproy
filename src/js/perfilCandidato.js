document.addEventListener('DOMContentLoaded', () => {
  const acercaContenedor = document.querySelector('.acerca__texto');
  const contenido = acercaContenedor.querySelector('p');
  const verMas = document.createElement('span');
  verMas.classList.add('ver-mas');
  verMas.textContent = '...Ver más';

  if (contenido.scrollHeight > 100) {
    acercaContenedor.appendChild(verMas);
  }

  verMas.addEventListener('click', () => {
    acercaContenedor.style.maxHeight = 'none'; // Remueve la altura máxima
    acercaContenedor.style.overflow = 'visible'; // Hace que el contenido sea visible completamente
    verMas.style.display = 'none'; // Oculta la leyenda "Ver más"
  });
});
