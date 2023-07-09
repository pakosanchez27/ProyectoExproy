<?php


// Mandar a llamar el archivo config.php dentro de la carpeta include
require 'include/config.php';
// require 'include/insertCandidato.php';

// Procesar el formulario de registro
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];

    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Insertar el nuevo candidato en la base de datos
    $sql = "insert into usuario (correo, pass) values ('$correo', '$hash')";
    $result = $pdo->query($sql);
    echo $sql;

    if($result){
        header(" Location: /login.php");
    }

    // Redireccionar a la vista de inicio de sesión
    // header('Location: loginCandidato.php');
    // exit(); // Finalizar la ejecución del script después de la redirección
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
                    <a href="nosotros.html" class="navegacion__enlace">Nosotros</a>
                    <a href="#" class="navegacion__enlace">Empresas</a>
                    <a href="#" class="navegacion__enlace">Candidatos</a>
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
                <a href="nosotros.html" class="navegacion__enlace">Nosotros</a>
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
                <p>¿Eres Empresa? <a href="#">Inicia sesión aquí</a></p>
            </div>
            <div class="loginCandidato__TextoBienvenida">
                <h2>Bienvenido a la Familia!</h2>
                <p>Aquí comienza tu camino al empleo ideal</p>
            </div>
            <div class="Banner__empresa">
                <img src="../src/img/admiracion.png" alt="Signo de advertencia">
                <p>¿Buscas Candidatos? <a href="#">Regístrate aquí</a></p>
            </div>
            <div class="loginCandidato__formulario">
                <form action="" method="POST" id="formulario">
                    <div class="campo email">
                        <label for="correo">Correo</label>
                        <input type="email" placeholder="Tu Correo" id="correo" name="correo">
                    </div>
                    <div class="campo pass">
                        <label for="pass">Contraseña</label>
                        <input type="password" id="pass" name="pass" placeholder="**********">
                    </div>
                    <div class="campo pass">
                        <label for="confirm-pass">Confirmar Contraseña</label>
                        <input type="password" id="confirm-pass" name="confirm-pass" placeholder="**********">
                    </div>                    
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
                    <a href="loginCandidato.php">Inicia Sesión</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // Obtener el mensaje de error si existe
        const error = "<?php echo isset($_GET['error']) ? $_GET['error'] : ''; ?>";
        
        // Mostrar mensajes de error según el tipo de error
        if (error === 'formato_correo') {
            alert('El formato de correo electrónico es inválido');
        } else if (error === 'contrasena_invalida') {
            alert('La contraseña debe tener al menos 8 caracteres y contener al menos una letra y un número');
        } else if (error === 'contrasenas_no_coinciden') {
            alert('La contraseña y la confirmación no coinciden');
        } else if (error === 'error_registro') {
            alert('Error al registrar el usuario');
        }
    </script>
</body>
</html>