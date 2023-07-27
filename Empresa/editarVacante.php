<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../include/config.php';

$idUsuario = $_GET['id'] ?? null;
$idVacante = $_GET['idVacante'] ?? null;
$idEmpresa = $_GET['idEmpresa'] ?? null;

$sqlUs = "SELECT * FROM empresa WHERE id_usuario = $idUsuario";
$result = $pdo->query($sqlUs);
$datosUs = $result->fetch(PDO::FETCH_ASSOC);
// var_dump($datosUs);

$sqlUs = "SELECT * FROM empresa WHERE id_usuario = $idUsuario";
$result = $pdo->query($sqlUs);
$datosUs = $result->fetch(PDO::FETCH_ASSOC);

$nombre = $datosUs['EMP_NOMBRE'];
$apellido = $datosUs['EMP_APELLIDO'];
$empresa = $datosUs['EMP_EMPRESA'];
$fotoEmpresa = $datosUs['EMP_FOTOPERFIL'];
$fotoPerfil = $datosUs['EMP_FOTORECLUTADOR'];
$IdEmpresa = $datosUs['ID_EMPRESA'];

$sqlvacante = "SELECT v.*
FROM VACANTE v
JOIN EMPRESA_VACANTE ev ON v.ID_VACANTE = ev.ID_VACANTE
JOIN EMPRESA e ON ev.ID_EMPRESA = e.ID_EMPRESA
WHERE v.ID_VACANTE = $idVacante";
$resultVacante = $pdo->query($sqlvacante);
$datosVacante = $resultVacante->fetch(PDO::FETCH_ASSOC);

// $ID_VACANTE = $datosVacante['ID_VACANTE'];
$TITULO = $datosVacante['TITULO'];
$DESCRIPCION = $datosVacante['DESCRIPCION'];
$SALARIO = $datosVacante['SALARIO'];
$CIUDAD = $datosVacante['CIUDAD'];
$ESTADO = $datosVacante['ESTADO'];
$AREA = $datosVacante['AREA'];
$PUESTO = $datosVacante['PUESTO'];
$EDUCACION = $datosVacante['EDUCACION'];
$TIPO_CONTRATO = $datosVacante['TIPO_CONTRATO'];
$HORARIO = $datosVacante['HORARIO'];
$MODO_TRABAJO = $datosVacante['MODO_TRABAJO'];
$VENCIMIENTO = $datosVacante['VENCIMIENTO'];
$NUMERO_VACANTES = $datosVacante['NUMERO_VACANTES'];
// $ID_EMPRESA = $datosVacante['ID_EMPRESA'];

// var_dump($datosVacante);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgoraTalent - Mis Vacantes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="../build/css/app.css">
</head>

<body>
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
                    <a href="/Empresa/principalEmpresa.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace ">Inicio</a>
                    <!-- <a href="#" class="headerEmpresa__enlace">Perfil</a> -->
                    <a href="/Empresa/misvacantes.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace border-botom">Mis Vacantes</a>
                    <a href="/Empresa/postulados.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Postulados</a>
                    <a href="/Empresa/chats.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Chats</a>
                    <a href="/Empresa/Enproceso.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">En Proceso</a>
                    <a href="/Empresa/Buscador.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Buscar Candidatos</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="editarVacante">
        <div class="editarVacante__contenedor">
            <form class="ventanaEmergente__formulario" method="POST" action="/Empresa/Model/actualizarEmpresa.php?id=<?php echo $idUsuario ?>&idEmpresa= <?php echo $IdEmpresa ?>&idVacante=<?php echo $idVacante ?>">
                <div class="form-group">
                    <label for="nombreVacante">Nombre de la vacante:</label>
                    <input type="text" id="nombreVacante" name="nombreVacante" value="<?php echo $TITULO ?>">
                </div>

                <div class="form-group">
                    <label for="salario">Salario:</label>
                    <input type="text" id="salario" name="salario" value="<?php echo $SALARIO ?>">
                </div>

                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select id="estado" name="estado">
                        <option value="<?php echo $ESTADO ?>" selected><?php echo $ESTADO ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ciudad">Ciudad:</label>
                    <select id="ciudad" name="ciudad">
                        <option value="<?php echo $CIUDAD ?>" selected><?php echo $CIUDAD ?></option>
                    </select>
                </div>



                <div class="form-group">
                    <label for="area">Área:</label>
                    <select id="area" name="area">
                        <option value="<?php echo $AREA ?>" selected><?php echo $AREA ?></option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="puesto">Puesto:</label>
                    <select id="puesto" name="puesto">
                        <option value="<?php echo $PUESTO ?>" selected><?php echo $PUESTO ?></option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="educacion">Educación:</label>
                    <select id="educacion" name="educacion">
                        <option value="<?php echo $EDUCACION ?>" selected><?php echo $EDUCACION ?></option>
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
                    <option value="<?php echo $TIPO_CONTRATO ?>" selected><?php echo $TIPO_CONTRATO ?></option>
                        <option value="permantente">Permantente</option>
                        <option value="indeterminado">Indeterminado</option>
                        <option value="porProyecto">Por proyecto</option>
                        <option value="porHonorarios">Por honorarios</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="horario">Horario:</label>
                    <select id="horario" name="horario">
                    <option value="<?php echo $HORARIO ?>" selected><?php echo $HORARIO ?></option>
                        <option value="tiempoCompleto">Tiempo completo</option>
                        <option value="medioTiempo">Medio tiempo</option>
                        <option value="finesSemana">Fines de semana</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="modoTrabajo">Modo de trabajo:</label>
                    <select id="modoTrabajo" name="modoTrabajo">
                    <option value="<?php echo $MODO_TRABAJO ?>" selected><?php echo $MODO_TRABAJO ?></option>
                        <option value="presencia">Presencia</option>
                        <option value="homeOffice">Home office</option>
                        <option value="hibrido">Híbrido</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="vencimiento">Vencimiento:</label>
                    <input type="date" id="vencimiento" name="vencimiento" value="<?php echo $VENCIMIENTO ?>">
                </div>

                <div class="form-group">
                    <label for="vacantesDisponibles">Vacantes disponibles:</label>
                    <input type="number" id="vacantesDisponibles" name="vacantesDisponibles" value="<?php echo $NUMERO_VACANTES ?>">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <div class="editorCodigo">
                        <textarea id="descripcion" name="descripcion" class="editorCodigo__codigo"><?php echo $DESCRIPCION ?></textarea>

                    </div>
                </div>
                <button class="boton__publicar">Actualizar</button>
                <button class="ventanaEmergente__cerrar">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6L6 18M6 6l12 12"></path>
                    </svg>
                </button>
            </form>
        </div>
    </main>



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