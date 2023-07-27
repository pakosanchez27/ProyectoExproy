<?php 
use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idEducacion = $_GET['idEducacion'] ?? null;

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

    <div class="modificarEducacion" id="modificarEducacion">
        <div class="emergente__formulario">
            <form action="/Candidato/Model/actualizar.php?id=<?php echo $idUsuario ?>&idEducacion=<?php echo $idEducacion?>" class="emergente__formulario__contenido" method="post">
                <div class="emergente__formulario__header sombra">
                    <h3>Educacion.</h3>
                </div>

                <div class="emergente__formulario__campos">
                    <?php
                    $sqlEdu = "SELECT * FROM EDUCACION WHERE ID_USUARIO = $idUsuario AND ID_EDUCACION = $idEducacion";
                    $result = $pdo->query($sqlEdu);
                    while ($datosEdu = $result->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                        <div class="campo institucion">
                            <label for="institucion">Institución Educativa</label>
                            <input type="text" name="institucion" id="institucion" placeholder="Nombre de tu escuela" value="<?php echo htmlspecialchars($datosEdu['EDU_NOMBRE_INSTITUCION']); ?>">
                        </div>
                        <div class="campo fechaInicio">
                            <label for="fechaInicio">Fecha de Inicio</label>
                            <input type="date" name="fechaInicio" id="fechaInicio" value="<?php echo $datosEdu['EDU_FECHA_INICIO']; ?>">
                        </div>
                        <div class="campo fechaFin">
                            <label for="fechaFin">Fecha de Fin</label>
                            <input type="date" name="fechaFin" id="fechaFin" value="<?php echo $datosEdu['EDU_FECHA_FIN']; ?>">
                        </div>
                        <div class="campo titulo">
                            <label for="titulo">Título / Certificado</label>
                            <input type="text" name="titulo" id="titulo" placeholder="Certificado o título obtenido" value="<?php echo htmlspecialchars($datosEdu['EDU_TITULO']); ?>">
                        </div>
                        <div class="campo nivel__estudios">
                            <label for="nivel__estudios">Nivel</label>
                            <select name="nivel__estudios" id="nivel__estudios">
                                <option value="Sin estudios" <?php if ($datosEdu['EDU_NIVEL'] === 'Sin estudios') echo 'selected'; ?>>Sin estudios</option>
                                <option value="Educacion primaria" <?php if ($datosEdu['EDU_NIVEL'] === 'Educacion primaria') echo 'selected'; ?>>Educación Primaria</option>
                                <option value="Educacion secundaria" <?php if ($datosEdu['EDU_NIVEL'] === 'Educacion secundaria') echo 'selected'; ?>>Educación Secundaria</option>
                                <option value="bachillerato" <?php if ($datosEdu['EDU_NIVEL'] === 'bachillerato') echo 'selected'; ?>>Bachillerato</option>
                                <option value="Educacion Universitaria" <?php if ($datosEdu['EDU_NIVEL'] === 'Educacion Universitaria') echo 'selected'; ?>>Educación Universitaria</option>
                                <option value="posgrado" <?php if ($datosEdu['EDU_NIVEL'] === 'posgrado') echo 'selected'; ?>>Posgrado</option>
                            </select>
                        </div>

                        <a href="/Candidato/Model/eliminar.php?id=<?php echo $idUsuario ?>&idEducacion=<?php echo $idEducacion ?>" class="boton__rojo">Eliminar</a>
                    <?php endwhile; ?>
                </div>


                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="/Candidato/CandidatoPrincipal.php?id=<?php echo $idUsuario ?>" class="boton__blanco">Cancelar</a>
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