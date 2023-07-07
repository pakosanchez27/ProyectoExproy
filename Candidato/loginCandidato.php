<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "agoratalent";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Error de conexión a la base de datos: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $email = $_POST["email"];
    $password = $_POST["pass"];

    // Escapar caracteres especiales en los datos ingresados por el usuario
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);

    // Consultar la base de datos para verificar las credenciales del usuario
    $sql = "SELECT * FROM usuario WHERE correo = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['pass'];

        // Verificar la contraseña utilizando password_verify()
        if (password_verify($password, $hashedPassword)) {
            // Usuario autenticado correctamente
            // Redireccionar a la página de inicio de sesión exitosa o realizar otras acciones necesarias
            header("Location: candidatoForm.html");
            exit();
        } else {
            // Contraseña incorrecta
            $error = "Correo electrónico o contraseña incorrecta";
            // Mostrar alerta en la página de inicio de sesión
            echo "<script>alert('$error');</script>";
        }
    } else {
        // Usuario no encontrado
        $error = "Correo electrónico o contraseña incorrecta";
        // Mostrar alerta en la página de inicio de sesión
        echo "<script>alert('$error');</script>";
    }
}

mysqli_close($conn);
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
                    <p>¿Buscas Talento? <a href="#">Inicia Sesión aquí</a></p>
                </div>
                <div class="loginCandidato__formulario">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="formulario">
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
                    <div class="registrar">
                        <p>¿Aún no tienes cuenta?</p>
                        <a href="registroCandidatos.php">Regístrate</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
