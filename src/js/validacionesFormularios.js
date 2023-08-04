function validarFormulario() {
    const institucion = document.querySelector('#institucion').value;
    const fechaInicio = document.querySelector('#fechaInicio').value;
    const fechaFin = document.querySelector('#fechaFin').value;

    // Limpiar mensajes de error
    const mensajesError = document.querySelectorAll('.mensajeError');
    mensajesError.forEach(mensaje => mensaje.textContent = '');

    let hayErrores = false;

    // Validar que todos los campos estén completados
    if (!institucion) {
        mostrarMensajeError('institucion', 'Por favor, ingrese el nombre de la institución.');
        hayErrores = true;
    }

    if (!fechaInicio) {
        mostrarMensajeError('fechaInicio', 'Por favor, seleccione la fecha de inicio.');
        hayErrores = true;
    }

    if (!fechaFin) {
        mostrarMensajeError('fechaFin', 'Por favor, seleccione la fecha de fin.');
        hayErrores = true;
    }

    // Validar que la fecha de inicio no sea mayor que la fecha de fin
    if (new Date(fechaInicio) > new Date(fechaFin)) {
        mostrarMensajeError('fechaInicio', 'La fecha de inicio no puede ser mayor que la fecha de fin.');
        hayErrores = true;
    }

    // Otras validaciones que desees realizar...

    // Si hay errores, evitar el envío del formulario
    if (hayErrores) {
        return false;
    }

    // Si todas las validaciones son exitosas, retorna true para enviar el formulario
    return true;
}

function mostrarMensajeError(campo, mensaje) {
    const campoElement = document.querySelector(`#${campo}`);
    const mensajeError = document.createElement('span');
    mensajeError.textContent = mensaje;
    mensajeError.classList.add('mensajeError');
    campoElement.parentNode.appendChild(mensajeError);
}