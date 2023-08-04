// Obtener referencia al botón "Publicar Vacante" y a la ventana emergente
const botonPublicar = document.querySelector('#crearVacante');
const ventanaEmergente = document.querySelector('.ventanaEmergente');

// Obtener referencia al botón "Cerrar" de la ventana emergente
const botonCerrar = document.querySelector('#ventanaEmergente__cerrar');

// Agregar evento de clic al botón "Publicar Vacante" para mostrar la ventana emergente
botonPublicar.addEventListener('click', () => {
  ventanaEmergente.style.display = 'block';
});

// Agregar evento de clic al botón "Cerrar" para ocultar la ventana emergente
botonCerrar.addEventListener('click', () => {
  ventanaEmergente.style.display = 'none';
});
