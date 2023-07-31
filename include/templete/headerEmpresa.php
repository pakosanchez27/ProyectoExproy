

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgoraTalent - Inicio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../../build/css/app.css">
    <!-- <script src="/src/js/app.js"></script> -->

</head>

<body>
    <style>
        .datosEmpresa__portada {
            background-image: url('../Empresa/EmpresaIMG/<?php echo $fotoPortada ?>');
            background-position: center center;
        }
    </style>
    <header class="headerEmpresa sombra animate__animated animate__fadeInDown">
        <div class="headerEmpresa__contenedor">
            <div class="headerEmpresa__encabezado">
                <div class="headerEmpresa__logo">
                    <a href="/Empresa/principalEmpresa.php?id=<?php echo $idUsuario?>" class="logo">AgoraTalent</a>
                </div>
                <div class="headerEmpresa__datos">
                    <p>Hoy es <time id="currentDate"></time></p>
                    <div class="headerEmpresa__notificaciones">
                        <div class="headerEmpresa__notificacion headerEmpresa__notificacion--campana">
                            <img src="../build/img/notificacion.webp" alt="notificacion">
                        </div>
                        <div class="headerEmpresa__notificacion headerEmpresa__notificacion--msj">
                            <img src="../build/img/msj.webp" alt="notificacion">
                        </div>
                    </div>
                    <a href="#" class="headerEmpresa__perfil" id="menu">
                        <img src="../Empresa/EmpresaIMG/<?php echo $fotoPerfil ?>" alt="Foto de perfil">
                        <p><?php echo $nombre ?></p>
                        <svg fill="none" viewBox="0 0 24 24" height="24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path xmlns="http://www.w3.org/2000/svg" d="M5.29289 9.29289C5.68342 8.90237 6.31658 8.90237 6.70711 9.29289L12 14.5858L17.2929 9.29289C17.6834 8.90237 18.3166 8.90237 18.7071 9.29289C19.0976 9.68342 19.0976 10.3166 18.7071 10.7071L12.7071 16.7071C12.3166 17.0976 11.6834 17.0976 11.2929 16.7071L5.29289 10.7071C4.90237 10.3166 4.90237 9.68342 5.29289 9.29289Z" fill="#0D0D0D"></path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="headerEmpresa__navegacion">
                <nav class="headerEmpresa__menu">
                <a href="/Empresa/principalEmpresa.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace <?php echo obtenerClaseActiva($pestañaActual, "Inicio"); ?>">Inicio</a>
                    <!-- <a href="#" class="headerEmpresa__enlace">Perfil</a> -->
                    <a href="/Empresa/misvacantes.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace <?php echo obtenerClaseActiva($pestañaActual, "Mis Vacantes"); ?>">Mis Vacantes</a>
                    <a href="/Empresa/postulados.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace <?php echo obtenerClaseActiva($pestañaActual, "Postulados"); ?>">Postulados</a>
                    <a href="/Empresa/chats.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace <?php echo obtenerClaseActiva($pestañaActual, "Chats"); ?>">Chats</a>
                    <a href="/Empresa/Enproceso.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace <?php echo obtenerClaseActiva($pestañaActual, "En Proceso"); ?>">En Proceso</a>
                    <a href="/Empresa/Buscador.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace <?php echo obtenerClaseActiva($pestañaActual, "Buscar Candidatos"); ?>">Buscar Candidatos</a>
                </nav>
            </div>
        </div>

        <div class="desplegableEmpresa sombra ocultarMenu" id="menuMobile">
            <div class="desplegableEmpresa__contenedor">
                <div class="desplegableEmpresa__reclutador">
                    <img src="/Empresa/EmpresaIMG/<?php echo $fotoPerfil ?>">
                    <h3><?php echo $nombre . " " . $apellido ?></h3>
                </div>
                <br>
                <a href="/Empresa/principalEmpresa.php?id=<?php echo $idUsuario ?>" class="boton__verde">Ver perfil</a>
                <hr>
                <nav class="desplegableEmpresa__menu">
                    <a href="#" class="">Ayuda</a>
                    <a href="#" class="">blog</a>
                    <a href="#" class="">Idioma</a>
                </nav>
                <hr>
                <a href="/cerrar-sesion.php" class="boton__rojo">Cerrar Sesión</a>
            </div>
        </div>
    </header>
