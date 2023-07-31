<?php
require '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los valores enviados por el formulario
    $email = trim($_POST['email']);
    $pass = trim($_POST['pass']);
    
    // Validar que los campos no estén vacíos
    if (empty($email) || empty($pass)) {
        $errores[] = 'Por favor, ingresa tu correo electrónico y contraseña.';
    } else {
        // Validar el formato del correo electrónico
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores[] = 'El formato del correo electrónico es inválido.';
        } else {
            // Consultar si el usuario existe en la base de datos
            $sql = "SELECT * FROM usuario WHERE CORREO = '$email'";
            $result = $pdo->query($sql);
            $dato = $result->fetch(PDO::FETCH_ASSOC);
            
            if ($dato) {
                $tipo = $dato['TIPO'];
                
                // Verificar el tipo de usuario
                if ($tipo == 'empresa') {
                    if (password_verify($pass, $dato['PASS'])) {
                        session_start();
                        // Llenar el arreglo de la sesión
                        session_start();
                        // Llenar el arreglo de la sesion
                        $_SESSION['usuario'] = $dato['ID_USUARIO'];
                        $_SESSION['login'] = true;
                        header('Location: /Empresa/principalEmpresa.php?id=' . $dato['ID_USUARIO']);
                        exit;
                    } else {
                        $errores[] = 'Usuario o Contraseña Incorrecta';
                    }
                } elseif ($tipo == 'candidato') {
                    $errores[] = 'El usuario está registrado como candidato.';
                }
            } else {
                $errores[] = 'El usuario no existe.';
            }
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
    <title>Login - AgoraTalent</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
    <div class="loginEmpresa">
        <div class="loginEmpresa__contenedor">
            <div class="loginEmpresa__izquierda">
                
                <div class="loginEmpresa__logo">
                    <a href="/">AgoraTalent</a>
                    <p>¿Eres candidato? <a href="../Candidato/loginCandidato.php">Inicia sesión aquí.</a></p>
                </div>
                <div class="loginEmpresa__textoBienvenida">
                    <h2 class="titulo">Bienvenido de vuelta, ¡Te hemos echado de menos!</h2>
                    <p class="texto">¿Listo para explorar? Ingresa y comienza la aventura</p>
                </div>
                <div class="Banner__empresa">
                    <img src="../src/img/admiracion.png" alt="Signo de advertencia">
                    <p>¿Eres Candidato? <a href="../Candidato/loginCandidato.php">Inicia Sesión aquí</a></p>
                </div>
                <div class="loginCandidato__formulario">
                    <form id="formulario" method="POST">
                        <div class="campo email">
                            <label for="email">Email</label>
                            <input type="email" placeholder="Tu Email" id="email" name="email" required>
                        </div>
                        <div class="campo pass">
                            <label for="pass">Contraseña</label>
                            <input type="password" id="pass" name="pass" placeholder="**********" required>
                        </div>
                        <?php if (isset($errores) && !empty($errores)): ?>
                            <div class="mensajeError">
                                <ul>
                                    <?php foreach ($errores as $error): ?>
                                        <li class="bannerError"><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="loginCandidato__botones">
                            <input type="submit" value="Iniciar Sesión" class="boton__verde">
                            <a href="#" class="boton__blanco google">
                                <img src="../src/img/google.png" alt="logo de google">
                                <p>Login con Google</p>
                            </a>
                        </div>
                    <div class="registrar">
                        <p>¿Aún no tienes cuenta?</p>
                        <a href="logoutEmpresa.php">Regístrate</a>
                    </div>
                </div>
            </div>
            <div class="loginEmpresa__derecha">
                <div class="loginEmpresa__derecha__img">
                    <div class="loginEmpresa__derecha__logo">AgoraTalent</div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
