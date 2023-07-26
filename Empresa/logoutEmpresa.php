<?php
// Mandar a llamar el archivo config.php dentro de la carpeta include
require '../include/config.php';

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['email']; // Updated field name
    $pass = $_POST['pass']; // Updated field name
    $confirmPass = $_POST['confirm_pass']; // New field for confirm password

    // Add validations here
    $errors = array();

    // Validate if passwords match
    if ($pass !== $pass){
        $errors['pass'] = "La contrasela es obligatoria.";
    }elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $pass)) {
        $errores[] = 'La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.';
    }
    if ($pass !== $confirmPass) {
        $errors['pass'] = "Las contraseñas no coinciden.";
    }

    // Validate if terms and conditions are accepted
    if (!isset($_POST['terminos'])) {
        $errors['terminos'] = "Debes aceptar los términos y condiciones.";
    }

    // Validate if privacy notice is accepted
    if (!isset($_POST['aviso_privacidad'])) {
        $errors['aviso_privacidad'] = "Debes aceptar el aviso de privacidad.";
    }

    // Use regular expressions for email and password validation
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El correo no es válido.";
    }

    // Modify the existing email check to show error on email field
    $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
    $stmt = $pdo->query($sql);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        $errors['email'] = "El correo ya está registrado. Por favor, elija otro correo.";
    }

    // If there are no errors, proceed with the registration
    if (empty($errors)) {
        $hash = password_hash($pass, PASSWORD_DEFAULT);

        // Insertar el nuevo candidato en la base de datos
        $sql = "INSERT INTO usuario (correo, pass, tipo) VALUES ('$correo', '$hash', 'empresa')";
        $result = $pdo->query($sql);

        if ($result) {
            // Obtener el ID del nuevo registro insertado
            $nuevoId = $pdo->lastInsertId();

            // Redirigir a la página candidatoForm.php con el ID del nuevo registro
            header("Location: /Empresa/formEmpresa.php?id=$nuevoId");
            exit(); // Finalizar la ejecución del script después de la redirección
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/app.css">
    <title>Login</title>
</head>

<body>
    <div class="loginEmpresa">
        <div class="loginEmpresa__contenedor">
            <div class="loginEmpresa__izquierda">
                <div class="loginEmpresa__logo">
                    <a href="/">AgoraTalent</a>
                    <p>¿Eres candidato? <a href="../Candidato/logoutCandidato.html">Registrate aquí.</a></p>
                </div>
                <div class="loginEmpresa__textoBienvenida">
                    <h2 class="titulo">¡Estamos encantados de que te unas a nosotros!</h2>
                    <p class="texto">Por favor, bríndanos la siguiente información para registrarte.</p>
                </div>
                <div class="Banner__empresa">
                    <img src="../src/img/admiracion.png" alt="Signo de advertencia">
                    <p>¿Eres Candiadto? <a href="../Candidato/logoutCandidato.html">Registrate aquí</a></p>
                </div>
                <!-- Rest of the HTML code remains unchanged -->

                <div class="loginCandidato__formulario">
                    <form id="formulario" method="POST">
                        <!-- ... -->
                        <div class="campo email">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Tu Email" id="email" name="email">
                            <?php if (isset($errors['email'])) : ?>
                                <p class="error"><?php echo $errors['email']; ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="campo pass">
                            <label for="pass">Contraseña</label>
                            <input type="password" id="pass" name="pass" placeholder="**********">
                        </div>
                        <div class="campo pass">
                            <label for="confirm_pass">Confirmar Contraseña</label>
                            <input type="password" id="confirm_pass" name="confirm_pass" placeholder="**********">
                            <?php if (isset($errors['pass'])) : ?>
                                <p class="error"><?php echo $errors['pass']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="campo terminos">
                            <input type="checkbox" id="terminos" name="terminos">
                            <label for="terminos">Acepto los <a href="link_al_documento_terminos" target="_blank">Términos y condiciones</a></label>
                            <?php if (isset($errors['terminos'])) : ?>
                                <p class="error"><?php echo $errors['terminos']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="campo privacidad">
                            <input type="checkbox" id="aviso_privacidad" name="aviso_privacidad">
                            <label for="aviso_privacidad">Acepto el <a href="link_al_documento_privacidad" target="_blank">Aviso de privacidad</a></label>
                            <?php if (isset($errors['aviso_privacidad'])) : ?>
                                <p class="error"><?php echo $errors['aviso_privacidad']; ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- ... -->

                        <div class="loginCandidato__botones">
                            <input type="submit" value="Registrar" class="boton__verde">
                            <a href="#" class="boton__blanco google">
                                <img src="../src/img/google.png" alt="logo de google">
                                <p>Login con Google</p>
                            </a>
                        </div>
                    </form>
                    <div class="registrar">
                        <p>¿Ya tienes cuenta?</p>
                        <a href="loginEmpresa.html">Inicia Sesión</a>
                    </div>
                </div>

            </div>
            <div class="loginEmpresa__derecha">
                <div class="loginEmpresa__derecha__imgEmpresa">
                    <div class="loginEmpresa__derecha__logo">AgoraTalent</div>
                </div>
            </div>
        </div>
        
</body>

</html>