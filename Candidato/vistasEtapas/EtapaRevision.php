<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../../../../../../../../build/css/app.css">
    <title>Perfil Candiadto</title>
</head>

<style>
    .principal__header__portada {
        /* border: #187e44 1px solid; */
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        background-image: url('../../../../Candidato/CandidatoIMG/<?php echo $FotoPortada; ?>');
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
        background-image: url('../../../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>');
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
                        <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>">
                            <img src="../../../../../../../../src/img/portafolio.png" alt="Logo portafolio">
                            <p>Empleo</p>
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.php?id=<?php echo $idUsuario ?>"> <img src="../../../../src/img/evaluacion.png" alt="Logo portafolio">
                            <p>Evaluacion</p>
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.php?id=<?php echo $idUsuario ?>">
                            <img src="../../../../../../../../src/img/comentario.png" alt="Logo portafolio">
                            <p>Chats</p>
                        </a>

                    </div>
                    <div class="navegacion__Perfil">
                        <a href="/Candidato/CandidatoPrincipal.php?id=<?php echo $idUsuario ?>" id="perfilDesktop"><img class="candiatoPerfil" src="../../../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>

                </nav>
            </div>
            <div class="header__mobile " id="header__mobile">
                <nav class="candidato__navegacion__mobile">
                    <div class="navegacion__opc">
                        <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>">
                            <img src="../../../../build/img/portafolio.webp" alt="Logo portafolio">
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.php?id=<?php echo $idUsuario ?>"> <img src="../../../../src/img/evaluacion.png" alt="Logo portafolio">
                        </a>

                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.php?id=<?php echo $idUsuario ?>">
                            <img src="../../../../src/img/comentario.png" alt="Logo portafolio">

                        </a>

                    </div>
                    <div class="navegacion__Perfil">
                        <a href="/Candidato/CandidatoPrincipal.php?id=<?php echo $idUsuario ?>" id="perfilMobile"><img class="candiatoPerfil" src="../../../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="perfilDesplegable sombra ocultar" id="perfilDesplegable__mobile">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../../../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil">
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

            <a href="/cerrar-sesion.php" class="boton__rojo">Cerrar Sesión</a>

        </div>
        <div class="perfilDesplegable sombra ocultar " id="perfilDesplegable__desktop">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../../../../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?> " alt="Foto de perfil">
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

            <a href="/cerrar-sesion.php" class="boton__rojo">Cerrar Sesión</a>

        </div>
    </header>

<main class="etapaVista">
    <div class="etapaVista__contenedor ">
    <div class="vistaProceso__contenedor ">
            <div class="vistaProceso__flujo sombra">
                <div class="vistaProceso__flujo__datosEmpresa">
                    <img src="../../build/img/microsoft.png">
                    <div class="vistaProceso__flujo__datos">
                        <h3 class="titulo">Desarrollador Web</h3>
                        <p class="empresa">Microsof
                        <p class="proceso">Postulación</p>
                    </div>

                </div>
                <div class="vistaProceso__circulos">
                    <div class="vistaProceso__circulo " id="proceso1">
                        <div class="circulo activo">
                            <p>1</p>
                        </div>
                        <div class="circulo__texto">
                            <p>Postulación</p>
                        </div>

                    </div>
                    <div class="vistaProceso__circulo" id="proceso2">
                        <div class="circulo activo">
                            <p>2</p>
                        </div>
                        <div class="circulo__texto">
                            <p>Revisión de CV</p>
                        </div>
                    </div>
                    <div class="vistaProceso__circulo" id="proceso3">
                        <div class="circulo">
                            <p>3</p>
                        </div>
                        <div class="circulo__texto">
                            <p>Pruebas Psicometricas</p>
                        </div>
                    </div>
                    <div class="vistaProceso__circulo" id="proceso4">
                        <div class="circulo">
                            <p>4</p>
                        </div>
                        <div class="circulo__texto">
                            <p>Entrevista Personal</p>
                        </div>
                    </div>
                    <div class="vistaProceso__circulo" id="proceso5">
                        <div class="circulo">
                            <p>5</p>
                        </div>
                        <div class="circulo__texto">
                            <p>Documentación</p>
                        </div>
                    </div>
                    <div class="vistaProceso__circulo" id="proceso6">
                        <div class="circulo">
                            <p>6</p>
                        </div>
                        <div class="circulo__texto">
                            <p>Contratación</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="proceso__postulado">
                <div class="proceso__postulado__contenedor">
                    <div class="proceso__postulado__salir">
                        <a href="#" id="salirPostulado"><img src="../../build/img/eliminar.webp"></a>
                    </div>

                    <h2 class="titulo">¡FELICIDADES POR PASAR LA PRIMERA ETAPA! 🎉📋</h2>
                    <p class="mensaje">

                        ¡La empresa ha validado tu currículum y ahora estás a la espera de las pruebas psicométricas! ⌛️
                        ¡Mantén la calma y prepárate para mostrar tus habilidades en el siguiente desafío! ¡Estás un
                        paso más cerca de tu meta profesional! 💪🚀
                    </p>
                    <img class="imagen" src="/../../build/img/segunda.png" alt="">

                </div>

            </div>
        </div>
</main>



</body>
</html>