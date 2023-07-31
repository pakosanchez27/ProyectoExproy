<?php
function estaAutenticado() : bool {
    // Inicia la sesión (asegúrate de hacerlo antes de cualquier salida)
    session_start();

    // Verifica si la variable de sesión 'login' está establecida y es verdadera
    if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
        // Si el usuario está autenticado, verifica si el ID del perfil solicitado es el suyo
        if (isset($_GET['id'])) {
            $perfil_id = $_GET['id']; // Asegúrate de validar y filtrar este valor
            $usuario_id_autenticado = $_SESSION['usuario'];

            // Verifica si el usuario autenticado coincide con el ID del perfil solicitado
            if ($usuario_id_autenticado == $perfil_id) {
                return true; // Usuario autenticado y tiene acceso al perfil solicitado
            } else {
                // Redirige al usuario a su propio perfil o a la página de inicio
                header("Location: /Candidato/CandidatoPrincipal.php?id=$usuario_id_autenticado");
                exit();
            }
        } else {
            // Si no se proporciona el ID del perfil en la URL, puedes mostrar un mensaje de error o redirigir a una página por defecto.
            header('Location: /Candidato/loginCandidato.php');
            exit();
        }
    } else {
        return false; // Usuario no autenticado
    }
}


function obtenerClaseActiva($pestañaActual, $pestañaComparar) {
    // Si la pestaña actual coincide con la pestaña que estamos comparando, devolvemos "border-botom", en caso contrario, devolvemos una cadena vacía
    return ($pestañaActual === $pestañaComparar) ? "border-botom" : "";
}
?>
