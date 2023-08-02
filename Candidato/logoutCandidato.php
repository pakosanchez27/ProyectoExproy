<?php
$empresa = $_POST['empresa'];
$descripcion = $_POST['descripcion'];
$url = $_POST['url'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$postal = $_POST['postal'];
$ciudad = $_POST['ciudad'];

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$genero = $_POST['genero'];
$telefono = $_POST['telefono'];
$nacimiento = $_POST['nacimiento'];
$cargo = $_POST['cargo'];

// Mandar a llamar el archivo config.php dentro de la carpeta include
require '../include/config.php';
//  require 'include/insertCandidato.php';



// Inicializar variables para almacenar los mensajes de error
$errors = [];

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $correo = trim($_POST['correo']);
    $pass = trim($_POST['pass']);
    $confirmPass = trim($_POST['confirm-pass']);

    // Validar el correo con expresión regular
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errors['correo'] = 'Ingrese un correo válido.';
    }

    // Validar la contraseña con expresión regular
    $passPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/';
    if (!preg_match($passPattern, $pass)) {
        $errors['pass'] = 'La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula y un número.';
    }

    // Verificar que las contraseñas coincidan
    if ($pass !== $confirmPass) {
        $errors['confirm-pass'] = 'Las contraseñas no coinciden.';
    }

    // Si no hay errores, continuar con la inserción en la base de datos
    if (empty($errors)) {
        // Verificar si el correo ya existe en la base de datos
        $sql = "SELECT * FROM usuario WHERE correo = '$correo'";
        $stmt = $pdo->query($sql);
        $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $errors['correo'] = 'El correo ya está registrado. Por favor, elija otro correo.';
        } else {
            // El correo no existe, realizar la inserción en la base de datos
            $hash = password_hash($pass, PASSWORD_DEFAULT);

            // Insertar el nuevo candidato en la base de datos
            $sql = "INSERT INTO usuario (correo, pass, tipo) VALUES ('$correo', '$hash', 'candidato')";
            $result = $pdo->query($sql);

            if ($result) {
                // Obtener el ID del nuevo registro insertado
                $nuevoId = $pdo->lastInsertId();

                // Redirigir a la página candidatoForm.php con el ID del nuevo registro
                header("Location: /Candidato/candidatoForm.php?id=$nuevoId");
                exit(); // Finalizar la ejecución del script después de la redirección
            } else {
                $errors['general'] = 'Hubo un error al registrar el usuario. Intente nuevamente más tarde.';
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
    <title>Registrate</title>
</head>

<body>
    <header class="header header__login header__login">
        <div class="header__logo">
            <a href="/">
                <p>AgoraTalent</p>
            </a>
        </div>
        <div class="header__navegacion">
            <div class="navegacion__bloque1">
                <nav>
                    <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                    <a href="/index.php" class="navegacion__enlace">Empresas</a>
                    <a href="/Candidato.php" class="navegacion__enlace">Candidatos</a>
                </nav>
            </div>
            <div class="navegacion__bloque2">
                <a href="#" class="navegacion__enlace">Inicia Sesión</a>
                <a href="#" class="navegacion__enlace">Regístrate</a>
                <a href="#" class="navegacion__enlace">Descarga la app</a>
            </div>
        </div>
        <div class="navegacion__mobil">
            <img src="../build/img/menu.webp" alt="menu" id="menu">
        </div>
        <div class="header__navegacionMobile ocultarMenu" id="menuMobile">
            <nav class="navegacionMobile__menu">
                <a href="#" class="navegacion__enlace--cerrar"><img src="src/img/error.png" alt="Boton de error" id="cerrar"></a>
                <a href="nosotros.php" class="navegacion__enlace">Nosotros</a>
                <a href="#" class="navegacion__enlace">Empresa</a>
                <a href="#" class="navegacion__enlace">Candidatos</a>
                <a href="#" class="navegacion__enlace">Iniciar Sesión</a>
                <a href="#" class="navegacion__enlace">Regístrate</a>
                <a href="#" class="navegacion__enlace">Descarga la app</a>
            </nav>
        </div>
    </header>
    <div class="loginCandidato">
        <div class="loginCandidato__izquierda">
            <a href="/" class="loginCandidato__logo">AgoraTalent</a>
        </div>
        <div class="loginCandidato__derecha">
            <div class="loginCandidato__empresa">
                <p>¿Eres Empresa? <a href="/Empresa/logoutEmpresa.php">Registrate aquí</a></p>
            </div>
            <div class="loginCandidato__TextoBienvenida">
                <h2>Bienvenido a la Familia!</h2>
                <p>Aquí comienza tu camino al empleo ideal</p>
            </div>
            <div class="Banner__empresa">
                <img src="../src/img/admiracion.png" alt="Signo de advertencia">
                <p>¿Buscas Candidatos? <a href="/Empresa/logoutEmpresa.php">Regístrate aquí</a></p>
            </div>
            <div class="loginCandidato__formulario">
                <form action="" method="POST" id="formulario">
                    <div class="campo email">
                        <label for="correo">Correo</label>
                        <input type="email" placeholder="Tu Correo" id="correo" name="correo">
                        <?php if (isset($errors['correo'])) : ?>
                            <p class="mensajeError"><?php echo $errors['correo']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="campo pass">
                        <label for="pass">Contraseña</label>
                        <input type="password" id="pass" name="pass" placeholder="**********">
                        <?php if (isset($errors['pass'])) : ?>
                            <p class="mensajeError"><?php echo $errors['pass']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="campo pass">
                        <label for="confirm-pass">Confirmar Contraseña</label>
                        <input type="password" id="confirm-pass" name="confirm-pass" placeholder="**********">
                        <?php if (isset($errors['confirm-pass'])) : ?>
                            <p class="mensajeError"><?php echo $errors['confirm-pass']; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="loginCandidato__botones">
                        <input type="submit" value="Registrar" class="boton__verde">
                        <a href="#" class="boton__blanco google">
                            <img src="../src/img/google.png" alt="logo de google">
                            <p>Login con Google</p>
                        </a>
                    </div>
                </form>
                <?php if (isset($errors['general'])) : ?>
                    <p class="mensajeError"><?php echo $errors['general']; ?></p>
                <?php endif; ?>
                <div class="registrar">
                    <p>¿Ya tienes cuenta?</p>
                    <a href="loginCandidato.php">Inicia Sesión</a>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="../src/js/ValidarFormulario.js">
    </script>
</body>

</html>