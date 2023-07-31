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
                
                // var_dump($tipo);
                // Verificar el tipo de usuario
                if ($tipo == 'candidato') {
                    if (password_verify($pass, $dato['PASS'])) {
                        session_start();
                        // Llenar el arreglo de la sesion
                        $_SESSION['usuario'] = $dato['ID_USUARIO'];
                        $_SESSION['login'] = true;
                        header('Location: /Candidato/CandidatoPrincipal.php?id=' . $dato['ID_USUARIO']);
                        exit;
                    } else {
                        $errores[] = 'Usuario o Contraseña Incorrecta';
                    }
                } elseif ($tipo == 'empresa') {
                    $errores[] = 'El usuario está registrado como Empresa.';
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Iniciar Sesión</title>
</head>

<body>
    <header class="header header__login header__login__dos">
        <!-- Resto del código del encabezado -->
    </header>
    <div class="loginCandidato">
        <div class="loginCandidato__izquierda">
            <a href="/" class="loginCandidato__logo">AgoraTalent</a>
        </div>
        <div class="loginCandidato__derecha">
            <div class="loginCandidato__empresa">
                <p>¿Eres Empresa? <a href="#">Inicia sesión aquí</a></p>
            </div>
            <div class="loginCandidato__TextoBienvenida">
                <h2>Bienvenido De nuevo!</h2>
                <p>Hoy es un buen día para encontrar el empleo de tus sueños</p>
            </div>
            <div class="Banner__empresa">
                <img src="../src/img/admiracion.png" alt="Signo de advertencia">
                <p>¿Buscas Talento? <a href="/Empresa/logoutEmpresa.php">Inicia Sesión aquí</a></p>
            </div>
            <div class="loginCandidato__formulario">
                <form method="POST" id="formulario">
                    <div class="campo email">
                        <label for="email">Email</label>
                        <input type="email" placeholder="Tu Email" id="email" name="email">
                    </div>
                    <div class="campo pass">
                        <label for="pass">Contraseña</label>
                        <input type="password" id="pass" name="pass" placeholder="**********">
                    </div>
                    <div class="login__recordar">
                        <div class="campo recordar">
                            <label for="recordar">Recordar</label>
                            <input type="checkbox" name="recordar" id="recordar">
                        </div>
                        <a href="#">Olvidé la contraseña</a>
                    </div>
                    <div class="loginCandidato__botones">
                        <input type="submit" value="Iniciar Sesión" class="boton__verde">
                        <a href="#" class="boton__blanco google">
                            <img src="../src/img/google.png" alt="logo de google">
                            <p>Login con Google</p>
                        </a>
                    </div>
                </form>
                <?php if (isset($errores) && !empty($errores)): ?>
                            <div class="mensajeError">
                                <ul>
                                    <?php foreach ($errores as $error): ?>
                                        <li class="bannerError"><?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                <div class="registrar">
                    <p>¿Aún no tienes cuenta?</p>
                    <a href="logoutCandidato.php">Regístrate</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>