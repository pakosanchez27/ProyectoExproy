document.addEventListener('DOMContentLoaded', function() {
// Obtener referencias a los elementos del formulario
const formulario = document.getElementById('formulario');
const correoInput = document.getElementById('correo');
const passInput = document.getElementById('pass');
const confirmPassInput = document.getElementById('confirm-pass');

// Agregar un evento 'submit' al formulario para la validación
formulario.addEventListener('submit', function(event) {
  // Detener el envío del formulario
  event.preventDefault();

  // Reiniciar los mensajes de error
  reiniciarMensajesError();

  // Validar que los campos no estén vacíos
  if (campoVacio(correoInput)) {
    mostrarMensajeError(correoInput, 'El campo Correo es obligatorio.');
  }
  if (campoVacio(passInput)) {
    mostrarMensajeError(passInput, 'El campo Contraseña es obligatorio.');
  }
  if (campoVacio(confirmPassInput)) {
    mostrarMensajeError(confirmPassInput, 'El campo Confirmar Contraseña es obligatorio.');
  }

  // Validar que las contraseñas coincidan
  if (passInput.value !== confirmPassInput.value) {
    mostrarMensajeError(confirmPassInput, 'Las contraseñas no coinciden.');
  }

  // Validar la estructura del correo con una expresión regular
  const correoRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/;
  if (!correoRegex.test(correoInput.value)) {
    mostrarMensajeError(correoInput, 'Ingrese un correo válido.');
  }

  // Si no hay mensajes de error, el formulario es válido y se puede enviar
  if (document.getElementsByClassName('mensajeError').length === 0) {
    formulario.submit();
  }
});

// Función para verificar si un campo está vacío
function campoVacio(campo) {
  return campo.value.trim() === '';
}

// Función para mostrar un mensaje de error debajo de un campo
function mostrarMensajeError(campo, mensaje) {
  const mensajeError = document.createElement('p');
  mensajeError.textContent = mensaje;
  mensajeError.classList.add('mensajeError');
  campo.parentNode.appendChild(mensajeError);
}

// Función para reiniciar los mensajes de error
function reiniciarMensajesError() {
  const mensajesError = document.getElementsByClassName('mensajeError');
  while (mensajesError.length > 0) {
    mensajesError[0].parentNode.removeChild(mensajesError[0]);
  }
}

  });