<?php 
use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idExperiencia = $_GET['idExperiencia'] ?? null;

$sql = "SELECT * FROM candidato WHERE id_usuario = $idUsuario ";
// var_dump($sql);
$result = $pdo->query($sql);
$datos = $result->fetch(PDO::FETCH_ASSOC);
// echo '<pre>';
// var_dump($datos);
// echo '</pre>';
$nombre = $datos['CAN_NOMBRE'];
$apellido = $datos['CAN_APELLIDO'];
$FotoPerfil = $datos['CAN_FOTOPERFIL'];


$sql = "SELECT * FROM experiencia WHERE id_experiencia = $idExperiencia ";
$result = $pdo->query($sql);
$datos = $result->fetch(PDO::FETCH_ASSOC);
//  echo '<pre>';
//  var_dump($datos);
//  echo '</pre>';


$empresa = $datos['EXP_NOMBRE_EMPRESA'];
$descripcion = $datos['EXP_DESCRIPCION'];
$cargo = $datos['EXP_CARGO'];
$duracion = $datos['EXP_DURACION'];



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

    <link rel="stylesheet" href="/../../build/css/app.css">
    <title>Perfil Candiadto</title>
</head>

<style>
    .principal__header__portada {
        /* border: #187e44 1px solid; */
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        background-image: url('../../../Candidato/CandidatoIMG/<?php echo $FotoPortada; ?>');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;



    }

    @media (min-width: 480px) {
        .principal__header__portada {
            border-top-left-radius: 1rem;
            border-top-right-radius: 1rem;
        }
    }

    .principal__header__perfil {
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        background-image: url('../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        position: sticky;
        border-radius: 50%;
    }
</style>

<body>

    <header class="candidato__header ">
        <div class="candidato__header__contenido">
            <div class="header__izquierda">
                <div class="candiadato__logo">
                    <a class="logoDesktop" href="CandidatoPrincipal.php?id=<?php echo $idUsuario ?>">AgoraTalent</a>
                    <a class="logoMobile" href="CandidatoPrincipal.php?id=<?php echo $idUsuario ?>">AT</a>

                </div>
                <div class="candidato__buscar">
                    <label for="buscar" class="buscar">
                        <img src="../../../../src/img/lupa.png" alt="logo lupa">
                    </label>
                    <input type="search" name="buscar" id="busca" placeholder="Buscar">
                </div>
            </div>
            <div class="header__derecha header__desktop">
                <nav class="candidato__navegacion">
                    <div class="navegacion__opc">
                        <a href="candidatoEmpleos.php">
                            <img src="../../../../src/img/portafolio.png" alt="Logo portafolio">
                            <p>Empleo</p>
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.php"> <img src="../../src/img/evaluacion.png" alt="Logo portafolio">
                            <p>Evaluacion</p>
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.php">
                            <img src="../../src/img/comentario.png" alt="Logo portafolio">
                            <p>Chats</p>
                        </a>

                    </div>
                    <div class="navegacion__Perfil">
                        <a href="#" id="perfilDesktop"><img class="candiatoPerfil" src="../../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>

                </nav>
            </div>
            <div class="header__mobile " id="header__mobile">
                <nav class="candidato__navegacion__mobile">
                    <div class="navegacion__opc">
                        <a href="candidatoEmpleos.php">
                            <img src="../../build/img/portafolio.webp" alt="Logo portafolio">
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.php"> <img src="../../src/img/evaluacion.png" alt="Logo portafolio">
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.php">
                            <img src="../../src/img/comentario.png" alt="Logo portafolio">

                        </a>

                    </div>
                    <div class="navegacion__Perfil">
                        <a href="#" id="perfilMobile"><img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="perfilDesplegable sombra ocultar" id="perfilDesplegable__mobile">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil">
                <h3><?php echo $nombre; ?>/h3>
            </div>

            <a href="CandidatoPrincipal.php" class="boton__verde">Ver perfil</a>
            <hr>
            <nav class="perfilDesplebable__cuenta">
                <a href="#" class="enlace">Ayuda</a>
                <a href="#" class="enlace">blog</a>
                <a href="#" class="enlace">Idioma</a>
            </nav>
            <hr>

            <a href="#" class="boton__rojo">Cerrar Sesión</a>

        </div>
        <div class="perfilDesplegable sombra ocultar " id="perfilDesplegable__desktop">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?> " alt="Foto de perfil">
                <h3><?php echo $nombre . " " . $apellido; ?></h3>
            </div>

            <a href="CandidatoPrincipal.php" class="boton__verde">Ver perfil</a>
            <hr>
            <nav class="perfilDesplebable__cuenta">
                <a href="#" class="enlace">Ayuda</a>
                <a href="#" class="enlace">blog</a>
                <a href="#" class="enlace">Idioma</a>
            </nav>
            <hr>

            <a href="#" class="boton__rojo">Cerrar Sesión</a>

        </div>
    </header>

    <div class="modificarEducacion" >
    <div class="emergente__formulario">
            <form action="/Candidato/Model/actualizar.php?id=<?php echo $idUsuario ?>&idExperiencia=<?php echo $idExperiencia ?>" class="emergente__formulario__contenido" method="POST">
                <div class="emergente__formulario__header sombra">
                    <h3>Experiencia</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo empresa">
                        <label for="empresa">Empresa</label>
                        <input type="text" name="empresa" id="empresa" placeholder="Empresa actual o anterior" value="<?php echo $empresa ?>">
                    </div>
                    <div class="campo descripcion">
                        <label for="descripcion">Descripción de actividades</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5"><?php echo $descripcion ?></textarea>
                    </div>
                    <div class="campo cargo">
                        <label for="cargo">Cargo Desempeñado</label>
                        <input type="text" name="cargo" id="cargo" placeholder="Cargo desempeñado" value="<?php echo $cargo ?>">
                    </div>
                    <div class="campo duracion">
                        <label for="duracion">Duración</label>
                        <select name="duracion" id="duracion">
                            <option value="<?php echo $duracion ?>" selected><?php echo $duracion ?></option>
                            <option value="actual">Actual</option>
                            <option value="menos1">Menos de 1 año</option>
                            <option value="1a3">1 a 3 años</option>
                            <option value="3a5">3 a 5 años</option>
                            <option value="5a10">5 a 10 años</option>
                            <option value="mas10">Más de 10 años</option>
                        </select>
                    </div>
                    <a href="/Candidato/Model/eliminar.php?id=<?php echo $idUsuario ?>&idExperiencia=<?php echo $idExperiencia ?>" class="boton__rojo">Eliminar Experiencia</a>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="/Candidato/CandidatoPrincipal.php?id=<?php echo $idUsuario ?>" class="boton__blanco" >Cancelar</a>
                </div>
            </form>
        </div>
    </div>


    <footer class="footer footer__candidato">
        <div class="footer__principal">
            <div class="footer__logo">
                <a href="/">AgoraTalent</a>
                <p>Simplificando la búsqueda y seleccion de talento</p>
            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Contenido</p>
                    <a href="CandidatoPrincipal.php" class="enlace">Inicio</a>
                    <a href="candidatoEmpleos.php" class="enlace">Empleos</a>
                    <a href="candidatoEvaluacion.php" class="enlace">Evaluaciones</a>
                    <a href="candidatoChat.php" class="enlace">Chats</a>
                    <a href="#" class="enlace">Cerrar Sesión</a>
                </nav>
            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Ayuda</p>
                    <a href="#" class="enlace">Acerca de</a>
                    <a href="#" class="enlace">Privacidad</a>
                    <a href="#" class="enlace">Condiciones</a>
                    <a href="#" class="enlace">FAQs</a>
                </nav>

            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Redes sociales</p>
                    <div class="footer__logos">
                        <a href="#" class="logos">
                            <img src="/build/img/facebook-color.webp" alt="Logo de Facebook">
                        </a>
                        <a href="#" class="logos">
                            <img src="/build/img/twetter.webp" alt="Logo Tweeter">
                        </a>
                        <a href="#" class="logos">
                            <img src="/build/img/youtube-color.png" alt="Logo Youtube">
                        </a>
                    </div>
                    <a href="#" class="enlace">Blog</a>
                    <a href="#" class="enlace">Contacto</a>
                </nav>

            </div>
            <hr>
            <div class="footer__descarga">
                <div class="footerApp btn__App ">
                    <div class="btn__logo">
                        <img src="/build/img/google-play.webp" alt="Logo de google play">
                    </div>
                    <div class="btn__texto">
                        <p><span>Descarga en</span></p>
                        <p>Google Play</p>
                    </div>
                </div>
                <div class="btn__App footerApp">
                    <div class="btn__logo">
                        <img src="/build/img/logo-apple.webp" alt="Logo de google play">
                    </div>
                    <div class="btn__texto">
                        <p><span>Descarga en</span></p>
                        <p>App Store</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="Copy">Derechos reservados para AgoraTalent&#174; 2023</p>
    </footer>
    <script src="/src/js/app.js"></script>
    <script src="/src/js/perfilCandidato.js"></script>
    <script src="/src/js/validacionesFormularios.js"></script>
    <script src="/src/js/headerCandidato.js"></script>
    <script src="/src/js/formularioCandidato.js"></script>
    <script src="/src/js/formulariosEmergentes.js"></script>
    <script src="/src/js/mensajeFlotante.js"></script>


</body>

</html>