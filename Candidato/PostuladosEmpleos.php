<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idVacante = $_GET['idVacante'] ?? null;
$idEmpresa = $_GET['idEmpresa'] ?? null;
$idCandidato = $_GET['idCandidato'] ?? null;

$sqlUs = " SELECT * FROM usuario WHERE id_usuario = $idUsuario";
$result = $pdo->query($sqlUs);
// var_dump($sqlUs);
$datosUs = $result->fetch(PDO::FETCH_ASSOC);
// var_dump($datosUs);
$email = $datosUs['CORREO'];
// echo $email;


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
$FotoPortada = $datos['CAN_FOTOPORTADA'];
$ID_CANDIDATO = $datos['ID_CANDIDATO'];

$sql2 = "SELECT V.ID_VACANTE, V.TITULO, 
E.ID_EMPRESA, E.EMP_EMPRESA, E.EMP_FOTOPERFIL,
P.ESTADO AS ESTADO_POSTULACION
FROM VACANTE V
JOIN EMPRESA E ON V.ID_EMPRESA = E.ID_EMPRESA
JOIN EMPRESA_VACANTE EV ON V.ID_VACANTE = EV.ID_VACANTE
JOIN POSTULACION P ON V.ID_VACANTE = P.ID_VACANTE
WHERE P.ID_CANDIDATO = $idCandidato
ORDER BY EV.FECHA_CREACION_VACANTE DESC;
";
$result2 = $pdo->query($sql2);



// var_dump($datos2);



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
    <title>AgoraTalent - Postulados</title>
</head>

<style>
    .principal__header__portada {
        /* border: #187e44 1px solid; */
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        background-image: url('../src/img/1646811898925.jpeg');
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
                        <img src="../src/img/lupa.png" alt="logo lupa">
                    </label>
                    <input type="search" name="buscar" id="busca" placeholder="Buscar">
                </div>
            </div>
            <div class="header__derecha header__desktop">
                <nav class="candidato__navegacion">
                    <div class="navegacion__opc">
                        <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>">
                            <img src="../src/img/portafolio.png" alt="Logo portafolio">
                            <p>Empleo</p>
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.php?id=<?php echo $idUsuario ?>"> <img src="../src/img/evaluacion.png" alt="Logo portafolio">
                            <p>Evaluacion</p>
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.php?id=<?php echo $idUsuario ?>">
                            <img src="../src/img/comentario.png" alt="Logo portafolio">
                            <p>Chats</p>
                        </a>

                    </div>
                    <div class="navegacion__Perfil">
                        <a href="/Candidato/CandidatoPrincipal.php?id=<?php echo $idUsuario ?>" id="perfilDesktop"><img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>

                </nav>
            </div>
            <div class="header__mobile " id="header__mobile">
                <nav class="candidato__navegacion__mobile">
                    <div class="navegacion__opc">
                        <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>">
                            <img src="../build/img/portafolio.webp" alt="Logo portafolio">
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.php?id=<?php echo $idUsuario ?>"> <img src="../src/img/evaluacion.png" alt="Logo portafolio">
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.php?id=<?php echo $idUsuario ?>">
                            <img src="../src/img/comentario.png" alt="Logo portafolio">

                        </a>

                    </div>
                    <div class="navegacion__Perfil">
                        <a href="/Candidato/CandidatoPrincipal.php?id=<?php echo $idUsuario ?>" id="perfilMobile"><img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="perfilDesplegable sombra ocultar" id="perfilDesplegable__mobile">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil">
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
        <div class="perfilDesplegable sombra ocultar " id="perfilDesplegable__desktop">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?> " alt="Foto de perfil">
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

    <main class="empleos">
        <div class="empleos__contenedor">
            <div class="empleos__izquierda">
                <div class="empleos__izquierda__secciones secciones">
                    <a href="candidatoEmpleos.html" class="secciones__campo">
                        <img src="../build/img/portafolio.webp">
                        <p>Buscar Empleo</p>
                    </a>
                    <a href="PostuladosEmpleos.html" class="secciones__campo">
                        <img src="../build/img/guardar-instagram.webp">
                        <p>Postulados</p>
                    </a>
                    <a href="recomendadosEmpleos.html" class="secciones__campo">
                        <img src="../build/img/recomendar.webp">
                        <p>Recomedados</p>
                    </a>
                </div>

            </div>
            <div class="empleos__central sombra postulados__central">

                <div class="empleos__central__postulados postulados">

                    <?php while ($datos2 = $result2->fetch(PDO::FETCH_ASSOC)) :
                        $vacante = $datos2['TITULO'];
                        $empresa = $datos2['EMP_EMPRESA'];
                        $estado  = $datos2['ESTADO_POSTULACION'];
                        $FotoPerfil = $datos2['EMP_FOTOPERFIL']; ?>
                        <a href="#" class="postulados__card" data-id="1">
                            <div class="postulados__card__detalles">
                                <div class="postulados__texto">
                                    <h3 class="titulo"><?php echo $vacante ?> </h3>
                                    <p class="empresa">Microsoft</p>
                                    <p class="procesoCan">Postulado</p>
                                </div>
                                <div class="postulados__flujo">
                                    <div class="postulados__circulo <?php echo $estado === 'POSTULADO' ? 'activo' : ''; ?>">
                                        <span>1</span>
                                    </div>
                                    <div class="postulados__circulo <?php echo $estado === 'REVISION' ? 'activo' : ''; ?>">
                                        <span>2</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'PRUEBAS' ? 'activo' : ''; ?>">
                                        <span>3</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'ENTREVISTA' ? 'activo' : ''; ?>">
                                        <span>4</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'DOCUMENTOS' ? 'activo' : ''; ?>">
                                        <span>5</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'CONTRATACION' ? 'activo' : ''; ?>">
                                        <span>6</span>
                                    </div>

                                </div>

                            </div>
                            <div class="postulados__card__img">
                                <img src="../Empresa/EmpresaIMG/<?php echo $FotoPerfil ?>">
                            </div>
                        </a> <!--Fin de card-->
                    <?php endwhile; ?>



                </div>
            </div>
            <div class="empleos__derecha">
                <div class="entrada__blog contenedor sombra">
                    <h3 class="entrada__titulo">AgoraTalent Blog</h3>
                    <div class="entrada__blog__cards">
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="promo__test contenedor sombra">
                    <div class="promo__test__img">

                    </div>
                    <div class="promo__test__contenido">
                        <p class="promo__test__titulo">Realiza nuestros Test de conocimientos</p>
                        <p class="promo__test__texto">Demuestra los conocimientos que tienes con nuestros test y gana
                            una
                            insignia dependiendo de el nivel del test</p>
                        <a href="#" class="boton__verde btnTest ">Más información</a>
                    </div>

                </div>
            </div>
        </div>

    </main>



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
                    <a href="CandidatoPrincipal.html" class="enlace">Inicio</a>
                    <a href="candidatoEmpleos.html" class="enlace">Empleos</a>
                    <a href="candidatoEvaluacion.html" class="enlace">Evaluaciones</a>
                    <a href="candidatoChat.html" class="enlace">Chats</a>
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

    <script src="../src/js/headerCandidato.js"></script>
    <script src="../src/js/formularioCandidato.js"></script>

    <script>
        function handleFileChange(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0].name;

            const label = fileInput.previousElementSibling;
            label.textContent = fileName;
        }
    </script>

</body>

</html>