<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../include/funciones.php';
$auth = estaAutenticado();
$usuario = $_SESSION['usuario'];
if(!$auth){
    header('Location: /Candidato/loginCandidato.php');
}


require '../include/config.php';
$idUsuario = $_GET['id'] ?? null;

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
$idCandidato = $datos['ID_CANDIDATO'];


$sqlEmpleos = "SELECT V.ID_VACANTE, V.TITULO, V.DESCRIPCION, V.SALARIO, V.CIUDAD, V.ESTADO, V.AREA, V.PUESTO, V.EDUCACION, V.TIPO_CONTRATO, V.HORARIO, V.MODO_TRABAJO, DATE_FORMAT(EV.FECHA_CREACION_VACANTE, '%d-%m-%Y') AS FECHA_PUBLICACION, V.NUMERO_VACANTES,
E.ID_EMPRESA, E.EMP_NOMBRE, E.EMP_APELLIDO, E.EMP_TELEFONO, E.EMP_EMPRESA, E.EMP_FOTOPERFIL, E.EMP_FOTOPORTADA, E.EMP_GENERO, E.EMP_ACERCA, E.EMP_NACIMIENTO, E.EMP_CARGO, E.EMP_URL, E.EMP_FOTORECLUTADOR
FROM vacante V
JOIN empresa E ON V.ID_EMPRESA = E.ID_EMPRESA
JOIN empresa_vacante EV ON V.ID_VACANTE = EV.ID_VACANTE
WHERE EV.FECHA_CREACION_VACANTE <= CURDATE()
AND (V.VENCIMIENTO IS NULL OR V.VENCIMIENTO >= CURDATE())
AND NOT EXISTS (
    SELECT 1
    FROM postulacion P
    WHERE P.ID_CANDIDATO = $idCandidato AND P.ID_VACANTE = V.ID_VACANTE
)
ORDER BY EV.FECHA_CREACION_VACANTE DESC";
$resultEmpleos = $pdo->query($sqlEmpleos);




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
    <title>Perfil Candiadto</title>
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
                    <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>" class="secciones__campo">
                        <img src="../build/img/portafolio.webp">
                        <p>Buscar Empleo</p>
                    </a>
                    <a href="PostuladosEmpleos.php?id=<?php echo $idUsuario?>&idCandidato=<?php echo $idCandidato ?>" class="secciones__campo">
                        <img src="../build/img/guardar-instagram.webp">
                        <p>Postulados</p>
                    </a>
                    <a href="recomendadosEmpleos.php" class="secciones__campo">
                        <img src="../build/img/recomendar.webp">
                        <p>Recomedados</p>
                    </a>
                </div>
                <div class="empleos__izquierda__filtado filtrado">
                    <form action="" class="filtrado__campos">
                        <div class="filtro area">
                            <label for="area">Especialidad</label>
                            <select name="area" id="area">
                                <option value="" selected>Area</option>
                            </select>
                        </div> <!--Area-->
                        <div class="filtro puesto">
                            <label for="puesto">Puesto</label>
                            <select name="puesto" id="puesto">
                                <option value="" selected>Puesto</option>
                            </select>
                        </div> <!--puesto-->
                        <div class="filtro estado">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado">
                                <option value="" selected>Estado</option>
                            </select>
                        </div> <!--estado-->
                        <div class="filtro ciudad">
                            <label for="ciudad">Ciudad</label>
                            <select name="ciudad" id="ciudad">
                                <option value="" selected>Ciudad</option>
                            </select>
                        </div> <!--estado-->
                        <div class="filtro salario">
                            <label for="salario">Salario</label>
                            <select name="salario" id="salario">
                                <option value="" selected>Salario</option>
                                <option value="6000-8000">6000 - 8000</option>
                                <option value="8000-10000">8000 - 10000</option>
                                <option value="10000-15000">10000 - 15000</option>
                                <option value="15000-20000">15000 - 20000</option>
                                <option value="20000-25000">20000 - 25000</option>
                                <option value="25000-30000">25000 - 30000</option>
                                <option value="30000-more">Más de 30000</option>
                            </select>
                        </div> <!--salario-->
                        <div class="filtro tipo">
                            <label for="tipo">Tipo de empleo</label>
                            <select name="tipo" id="tipo">
                                <option value="" selected>Tipo de empleo</option>
                                <option value="Tiempo completo">Tiempo completo</option>
                                <option value="Medio tiempo">Medio tiempo</option>
                                <option value="Contrato temporal">Contrato temporal</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Prácticas">Prácticas</option>
                            </select>
                        </div> <!--tipo-->
                        <div class="filtro lugar">
                            <label for="lugar">Lugar de empleo</label>
                            <select name="lugar" id="lugar">
                                <option value="" selected>Lugar de empleo</option <option value="presencial">Presencial</option>
                                <option value="home_office">Home office</option>
                                <option value="hibrido">Híbrido</option>
                            </select>
                        </div> <!--tipo-->
                        <div class="filtro btns">
                            <input type="submit" value="Buscar" class="boton__verde">
                        </div>
                    </form>
                </div>
            </div>
            <div class="empleos__central sombra">
                <div class="empleos__central__secciones seccionesMobile sombra">
                    <div class="seccionesMobile__secciones">
                        <a class="seccionesMobile__campo">
                            <span>
                                <img src="../build/img/portafolio.webp">
                                <p>Buscar Empleo</p>
                            </span>
                            <img src="../build/img/triangulo.webp" class="triangulo">
                        </a>

                    </div>


                </div>
                <div class="empleos__central__filtrado filtradoMobile sombra">
                    <div class="filtradoMobile__btn">
                        <p>Filtrar Vacante</p>
                    </div>
                </div>

                <div class="empleos__central__busqueda busqueda">
                    <form action="" class="busqueda__form">
                        <div class="buscar empleo">
                            <label for="empleo">
                                <img src="../build/img/lupa.webp">
                            </label>
                            <input type="text" name="empleo" id="empleo" placeholder="Empleo, área o empresa">
                        </div>
                        <div class="buscar lugar">
                            <label for="lugar">
                                <img src="../build/img/ubicacion.png">
                            </label>
                            <input type="text" name="lugar" id="lugar" placeholder="Colonia, ciudad o estado">
                        </div>

                        <div class=" btn">
                            <input type="submit" value="Buscar Empleo" class="boton__verde">
                        </div>
                    </form>
                </div>

                <div class="empleos__central__resultados resultados">
                    <?php while ($datosEmpleos = $resultEmpleos->fetch(PDO::FETCH_ASSOC)) :
                        //   echo '<pre>';
                        //    var_dump($datosEmpleos);
                        //    echo '</pre>';

                        $idVacante = $datosEmpleos['ID_VACANTE'];
                        // echo $idVacante;
                        $idEmpresa = $datosEmpleos['ID_EMPRESA'];
                    ?>
                        <a href="detalleEmpleo.php?id=<?php echo $idUsuario ?>&idVacante=<?php echo $idVacante ?>&idEmpresa=<?php echo $idEmpresa?>" class="resultados__card">
                            <div class="resultados__card__detalles">
                                <img src="../Empresa/EmpresaIMG/<?php echo $datosEmpleos['EMP_FOTOPERFIL']; ?>" alt="Logo empresa">
                                <div class="Detalles__texto">
                                    <h3><?php echo $datosEmpleos['TITULO']; ?></h3>
                                    <p class="empresa"><?php echo $datosEmpleos['EMP_EMPRESA']; ?></p>
                                    <p class="salario">$<?php echo $datosEmpleos['SALARIO']; ?>MXN</p>
                                    <p class="tipo"><?php echo $datosEmpleos['MODO_TRABAJO']; ?>, <?php echo $datosEmpleos['NUMERO_VACANTES']; ?> vacantes</p>
                                    <p class=""><?php echo $datosEmpleos['CIUDAD']; ?>, <span><?php echo $datosEmpleos['ESTADO']; ?></span></p>
                                    <p class="">Publicado el : <?php echo $datosEmpleos['FECHA_PUBLICACION']; ?></p>
                                </div>
                            </div>

                            <div class="resultados__card__flecha">
                                <img src="../build/img/izquierda.webp">
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
                        <p class="promo__test__texto">Demuestra los conocimientos que tienes con nuestros test y gana una
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

    <script src="/src/js/headerCandidato.js"></script>
    <script src="/src/js/formularioCandidato.js"></script>

</body>

</html>