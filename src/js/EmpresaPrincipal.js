// Obtener referencia al botón "Publicar Vacante" y a la ventana emergente
const botonPublicar = document.querySelector('.boton__verde');
const ventanaEmergente = document.querySelector('.ventanaEmergente');

// Obtener referencia al botón "Cerrar" de la ventana emergente
const botonCerrar = document.querySelector('.ventanaEmergente__cerrar');

// Agregar evento de clic al botón "Publicar Vacante" para mostrar la ventana emergente
botonPublicar.addEventListener('click', () => {
  ventanaEmergente.style.display = 'block';
});

// Agregar evento de clic al botón "Cerrar" para ocultar la ventana emergente
botonCerrar.addEventListener('click', () => {
  ventanaEmergente.style.display = 'none';
});

// Inicializar el editor de texto en el campo de descripción
ClassicEditor
  .create(document.querySelector('#descripcion'), {
    toolbar: {
      items: [
        'heading',
        '|',
        'bold',
        'italic',
        'underline',
        'strikethrough',
        'link',
        '|',
        'bulletedList',
        'numberedList',
        '|',
        'indent',
        'outdent',
        '|',
        'blockQuote',
        'codeBlock',
        '|',
        'insertTable',
        '|',
        'undo',
        'redo'
      ]
    },
    language: 'es',
    licenseKey: '',
    placeholder: 'Ingrese la descripción...'
  })
  .then(editor => {
    console.log('Editor de texto inicializado correctamente.', editor);
  })
  .catch(error => {
    console.error('Error al inicializar el editor de texto:', error);
  });
