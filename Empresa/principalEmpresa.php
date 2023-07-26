<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../include/config.php';

$idUsuario = $_GET['id'] ?? null;

$sqlUs = "SELECT * FROM empresa WHERE id_usuario = $idUsuario";
$result = $pdo->query($sqlUs);
$datosUs = $result->fetch(PDO::FETCH_ASSOC);
// var_dump($datosUs);

$nombre = $datosUs['EMP_NOMBRE'];
$apellido = $datosUs['EMP_APELLIDO'];
$telefono = $datosUs['EMP_TELEFONO'];
$cargo = $datosUs['EMP_CARGO'];
$empresa = $datosUs['EMP_EMPRESA'];
$fotoEmpresa = $datosUs['EMP_FOTOPERFIL'];
$fotoPortada = $datosUs['EMP_FOTOPORTADA'];
$fotoPerfil = $datosUs['EMP_FOTORECLUTADOR'];
$genero = $datosUs['EMP_GENERO'];
$IdEmpresa = $datosUs['ID_EMPRESA'];
$saludo = ($genero = 'hombre') ? 'Bienvenido!' : 'Bienvenida!';

// echo $saludo;

$sqlVacantes = "SELECT * FROM vacante WHERE id_Empresa = $IdEmpresa ORDER BY id_vacante DESC LIMIT 3";
// echo $sqlVacantes;
$resultVacante = $pdo->query($sqlVacantes);




?>


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
    <link rel="stylesheet" href="../build/css/app.css">

</head>

<body>
    <style>
        .datosEmpresa__portada {
            background-image: url('../Empresa/EmpresaIMG/<?php echo $fotoPortada ?>');
        }
    </style>
    <header class="headerEmpresa sombra animate__animated animate__fadeInDown">
        <div class="headerEmpresa__contenedor">
            <div class="headerEmpresa__encabezado">
                <div class="headerEmpresa__logo">
                    <a href="principalEmpresa.php" class="logo">AgoraTalent</a>
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
                    <a href="#" class="headerEmpresa__perfil">
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
                    <a href="/Empresa/principalEmpresa.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace border-botom">Inicio</a>
                    <!-- <a href="#" class="headerEmpresa__enlace">Perfil</a> -->
                    <a href="/Empresa/misvacantes.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Mis Vacantes</a>
                    <a href="/Empresa/postulados.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Postulados</a>
                    <a href="/Empresa/chats.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Chats</a>
                    <a href="/Empresa/Enproceso.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">En Proceso</a>
                    <a href="/Empresa/Buscador.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Buscar Candidatos</a>
                </nav>
            </div>
        </div>
    </header>

    <body>

        <main class="dash animate__animated animate__fadeIn">
            <div class="dash__contenedor">
                <div class="dash__contenidoPrincipal contenidoPrincipal">
                    <div class="contenidoPrincipal__bienvenida sombra ">
                        <p>Hola, <?php echo $nombre; ?> <?php echo $saludo; ?></p>
                        <a href="#" class="boton__verde">Publicar Vacante</a>
                    </div>
                    <div class="contenidoPrincipal__misVacantes misVacantes">
                        <div class="tituloContenedor">
                            <h2 class="tituloModulo">Mis vacantes</h2>
                            <a href="#" class="verTodo">Ver todo</a>
                        </div>
                        <div class="misVacantes__contenedor">

                            <?php
                            $contador = 0; // Initialize the counter variable
                            while ($datosVacante = $resultVacante->fetch(PDO::FETCH_ASSOC)) :
                                $contador++;
                                if ($contador <= 3) : // Display only three records
                            ?>
                                    <div class="misVacantes__card">
                                        <a href="/Empresa/vacanteDetalle.php?id=<?php echo $idUsuario?>&idVacante=<?php echo $datosVacante['ID_VACANTE'];  ?>&idEmpresa=<?php echo $IdEmpresa;  ?>" >
                                        <div class="misVacantes__img">
                                            <img src="../Empresa/EmpresaIMG/<?php echo $datosUs['EMP_FOTOPERFIL']; ?>" alt="misVacantes">
                                        </div>
                                        <div class="misVacantes__datos">
                                            <h3 class="titulo"><?php echo $datosVacante['TITULO']; ?></h3>
                                            <a href="#" class="empresa"><?php echo $datosUs['EMP_EMPRESA']; ?></a>
                                            <p class="salario">$<?php echo $datosVacante['SALARIO']; ?> mensuales</p>
                                            <p class="cantidadVaca"><?php echo $datosVacante['NUMERO_VACANTES']; ?> Vacantes disponibles</p>
                                            <p class="lugar"><?php echo $datosVacante['CIUDAD']; ?>, <?php echo $datosVacante['ESTADO']; ?></p>
                                        </div>
                                        </a>
                                    </div> <!--Fin de la tarjeta-->
                            <?php
                                endif;
                            endwhile;
                            ?>

                        </div>
                    </div>

                    <!-- Modulo de enproceso -->
                    <div class="contenidoPrincipal__enProceso enProceso">
                        <div class="tituloContenedor">
                            <h2 class="tituloModulo">En proceso</h2>
                            <a href="#" class="verTodo">Ver todo</a>
                        </div>
                        <div class="enProceso__contenedor">
                            <table class="enProceso__tabla">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nombre</th>
                                        <th>Vacante Postulada</th>
                                        <th>Fecha de Postulación</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                    <tr>
                                        <td class="enProceso__img">
                                            <img src="../build/img/perfil.webp" alt="enProceso">
                                        </td>
                                        <td>Francisco Sánchez</td>
                                        <td>Desarrollador web</td>
                                        <td>20/03/2023</td>
                                        <td class="enProceso__estado">En proceso</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="dash__aside">
                    <div class="dahs__aside__datosEmpresa datosEmpresa sombra">
                        <div class="datosEmpresa">
                            <div class="datosEmpresa__portada">
                                <div class="datos__editar">
                                    <a href="#"><img src="../build/img/lapiz.png" alt="Editar"></a>
                                </div>
                            </div>
                            <div class="datosEmpresa__datos datos">
                                <img src="../Empresa/EmpresaIMG/<?php echo $fotoEmpresa; ?>" alt="LogoEmpresa">
                                <a href="#"><?php echo $empresa; ?>.</a>
                                <div class="datosEmpresa__redesSociales">
                                    <a href="#" class="redSocial"> <img src="../build/img/facebook-color.png" alt="Facebook"></a>
                                    <a href="#" class="redSocial"> <img src="../build/img/instagram.webp" alt="Instagram"></a>
                                    <a href="#" class="redSocial"> <img src="../build/img/pinterest.webp" alt="Pinterest"></a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="datosReclutador sombra">
                        <div class="editarBtn">
                            <button class="editarIconBtn">
                                <i class="editarIcono"></i>
                            </button>
                        </div>
                        <img class="fotoPerfil" src="../Empresa/EmpresaIMG/<?php echo $fotoPerfil; ?>" alt="Foto Perfil">
                        <p class="nombre"> <?php echo $nombre . " " . $apellido; ?></p>
                        <p class="puesto"> <?php echo $cargo; ?></p>
                        <p class="numero">+52 <?php echo $telefono; ?> </p>
                        <div class="datosEmpresa__redesSociales">
                            <a href="#" class="redSocial"> <img src="../build/img/facebook-color.png" alt="Facebook"></a>
                            <a href="#" class="redSocial"> <img src="../build/img/instagram.webp" alt="Instagram"></a>
                            <a href="#" class="redSocial"> <img src="../build/img/pinterest.webp" alt="Pinterest"></a>
                        </div>
                    </div>
                    <div class="blogEmpresa sombra">
                        <h3 class="entrada__titulo">AgoraTalent Blog</h3>
                        <div class="entrada__blog__cards">
                            <a href="#" class="entrada__blog__card">
                                <img src="../src/img/blog.jpg" alt="foto entrada">
                                <div class="card__info">
                                    <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                    <P class="card__info__autor">Escrito el : <span>20/01/2020 </span>por: </span>Admin</span></p>
                                    <P class="card__info__descripcion">Consejos para mejorar el tu CV </p>
                                </div>
                            </a>
                            <a href="#" class="entrada__blog__card">
                                <img src="../src/img/blog.jpg" alt="foto entrada">
                                <div class="card__info">
                                    <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                    <P class="card__info__autor">Escrito el : <span>20/01/2020 </span>por: </span>Admin</span></p>
                                    <P class="card__info__descripcion">Consejos para mejorar el tu CV</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
        </main>

        <div class="ventanaEmergente">
            <h2 class="ventanaEmergente__titulo">Publicar Vacante</h2>
            <form class="ventanaEmergente__formulario" method="POST" action="/Empresa/Model/insertarEmpresa.php?id=<?php echo $idUsuario ?>&idEmpresa= <?php echo $IdEmpresa ?>">
                <div class="form-group">
                    <label for="nombreVacante">Nombre de la vacante:</label>
                    <input type="text" id="nombreVacante" name="nombreVacante">
                </div>

                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <input type="text" id="salario" name="salario">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado">
                        <option value="" selected disabled>--Selecciona un Estado--</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <select id="ciudad" name="ciudad">
                        <option value="" selected disabled>--Selecciona un Ciudad--</option>
                    </select>
                </div>



                <div class="form-group">
                    <label for="area">Área:</label>
                    <select id="area" name="area">
                        <option value="" selected disabled>--Selecciona un Área--</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="puesto">Puesto:</label>
                    <select id="puesto" name="puesto">
                        <option value="" selected disabled>--Selecciona un Puesto--</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="educacion">Educación:</label>
                    <select id="educacion" name="educacion">
                        <option value="bachillerato">Bachillerato</option>
                        <option value="tecnico">Técnico superior universitario</option>
                        <option value="universidad">Universidad</option>
                        <option value="maestria">Maestría</option>
                        <option value="doctorado">Doctorado</option>
                        <option value="ninguna">Ninguna</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tipoContrato">Tipo de contrato:</label>
                    <select id="tipoContrato" name="tipoContrato">
                        <option value="permantente">Permantente</option>
                        <option value="indeterminado">Indeterminado</option>
                        <option value="porProyecto">Por proyecto</option>
                        <option value="porHonorarios">Por honorarios</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="horario">Horario:</label>
                    <select id="horario" name="horario">
                        <option value="tiempoCompleto">Tiempo completo</option>
                        <option value="medioTiempo">Medio tiempo</option>
                        <option value="finesSemana">Fines de semana</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="modoTrabajo">Modo de trabajo:</label>
                    <select id="modoTrabajo" name="modoTrabajo">
                        <option value="presencia">Presencia</option>
                        <option value="homeOffice">Home office</option>
                        <option value="hibrido">Híbrido</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vencimiento">Vencimiento:</label>
                    <input type="date" id="vencimiento" name="vencimiento">
                </div>

                <div class="form-group">
                    <label for="vacantesDisponibles">Vacantes disponibles:</label>
                    <input type="number" id="vacantesDisponibles" name="vacantesDisponibles">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <div class="editorCodigo">
                        <textarea id="descripcion" name="descripcion" class="editorCodigo__codigo"></textarea>

                    </div>
                </div>
                <button class="boton__publicar">Publicar</button>
                <button class="ventanaEmergente__cerrar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18M6 6l12 12"></path>
                    </svg>
                </button>
            </form>

        </div>

        <script src="../src/js/EmpresaPrincipal.js"></script>
        <script src="../src/js/selectEstados.js"></script>
        <script src="../src/js/selectAreas.js"></script>

        <script>
            var currentDateElement = document.getElementById('currentDate');
            var currentDate = new Date();

            var options = {
                day: '2-digit',
                month: 'short',
                year: 'numeric'
            };
            currentDateElement.textContent = currentDate.toLocaleDateString('es-ES', options);
        </script>
    </body>

</html>