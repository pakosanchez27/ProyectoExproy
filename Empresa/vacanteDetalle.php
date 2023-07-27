<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../include/config.php';

$idUsuario = $_GET['id'] ?? null;
$idVacante = $_GET['idVacante'] ?? null;
$IdEmpresa = $_GET['idEmpresa'] ?? null;

// Obtenemos información del usuario de la tabla "empresa"
$sqlUs = "SELECT * FROM empresa WHERE id_usuario = $idUsuario";
$result = $pdo->query($sqlUs);
$datosUs = $result->fetch(PDO::FETCH_ASSOC);

$nombre = $datosUs['EMP_NOMBRE'];
$apellido = $datosUs['EMP_APELLIDO'];
$empresa = $datosUs['EMP_EMPRESA'];
$fotoEmpresa = $datosUs['EMP_FOTOPERFIL'];
$fotoPerfil = $datosUs['EMP_FOTORECLUTADOR'];
$IdEmpresa = $datosUs['ID_EMPRESA'];

// Obtenemos información de la vacante de la tabla "vacante" y la unimos con la tabla "empresa_vacante" y "empresa"
$sqlVacante = "SELECT V.*, E.EMP_EMPRESA AS NOMBRE_EMPRESA,EMP_FOTOPERFIL, EV.FECHA_CREACION_VACANTE 
               FROM VACANTE V 
               INNER JOIN EMPRESA_VACANTE EV ON V.ID_VACANTE = EV.ID_VACANTE 
               INNER JOIN EMPRESA E ON EV.ID_EMPRESA = E.ID_EMPRESA
               WHERE V.ID_VACANTE = $idVacante AND EV.ID_EMPRESA = $IdEmpresa";

$resultVacante = $pdo->query($sqlVacante);
$datosVacante = $resultVacante->fetch(PDO::FETCH_ASSOC);

$titulo = $datosVacante['TITULO'];
$descripcion = $datosVacante['DESCRIPCION'];
$salario = (float)$datosVacante['SALARIO'];
$ciudad = $datosVacante['CIUDAD'];
$estado = $datosVacante['ESTADO'];
$fotoEmpresa = $datosVacante['EMP_FOTOPERFIL'];
$area = $datosVacante['AREA'];
$puesto = $datosVacante['PUESTO'];
$educacion = $datosVacante['EDUCACION'];
$tipoContrato = $datosVacante['TIPO_CONTRATO'];
$horario = $datosVacante['HORARIO'];
$modoTrabajo = $datosVacante['MODO_TRABAJO'];
$vencimiento = $datosVacante['VENCIMIENTO'];
$numeroVacantes = (int)$datosVacante['NUMERO_VACANTES'];
$idEmpresa = (int)$datosVacante['ID_EMPRESA'];
$nombreEmpresa = $datosVacante['NOMBRE_EMPRESA'];
$fechaCreacionVacante = $datosVacante['FECHA_CREACION_VACANTE'];








//  echo '<pre>';
//  var_dump($datosVacante);

// echo '</pre>';
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
          <a href="/Empresa/principalEmpresa.php?id=<?php echo $idUsuario ?>" class="headerEmpresa__enlace">Inicio</a>
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

  <main class="vacanteDetalle">
    <div class="vacanteDetalle__contenedor">
      <div class="detalleVacante">
        <div class="detalleEmpresa__vacante">
          <a href="/Empresa/misvacantes.php?id=<?php echo $idUsuario ?>" class="detalleMobile__regresar">
            <img src="../build/img/flecha.webp">
          </a>
          <a href="/Empresa/editarVacante.php?id=<?php echo $idUsuario ?>&idEmpresa=<?php echo $idEmpresa ?>&idVacante=<?php echo $idVacante ?>" class="detalleMobile__regresar regresarVacante">
            <img src="../build/img/lapiz (2).png">
          </a>
        </div>



        <div class="detalleMobile__datos">
          <div class="detalle__contenido__datos datos">
            <div class="datos__contenedor">
              <div class="datos__bloque1">

                <div class="datos__bloque1__datos">
                  <p class="fechaPublicacion"><?php echo $fechaCreacionVacante ?></p>
                  <h3 class="titulo"><?php echo $titulo ?></h3>
                  <p class="salario">$<?php echo $salario ?> menusales</p>
                  <p class="empresa"><?php echo $empresa ?></p>
                  <p class="lugar"><?php echo $ciudad ?>, <span><?php echo $estado ?></span></p>

                </div>
                <div class="datos__bloque1__img">
                  <img src="../Empresa/EmpresaIMG/<?php echo $fotoEmpresa ?>" alt="">
                </div>
              </div>
              <div class="datos__bloque2">
                <h3 class="titulo">Datos Generales</h3>
                <p><span>Area:</span> <?php echo $area ?>.</p>
                <p><span>Puesto:</span> <?php echo $puesto ?>.</p>
                <p><span>Educación:</span> <?php echo $educacion ?>.</p>
              </div>
              <div class="datos__bloque3">
                <h3 class="titulo">Detalles del empelo.</h3>
                <p><span>Tipo de contratación: </span> <?php echo $tipoContrato ?>.</p>
                <p><span>Horario: </span> <?php echo $horario ?>.</p>
                <p><span>Modo de trabajo: </span> <?php echo $modoTrabajo ?>.</p>
                <p><span>Vencimiento: </span><?php echo $vencimiento ?>.</p>
                <p><span>Vacacantes Disponibles: </span> <?php echo $numeroVacantes ?>. </p>
              </div>
              <div class="datos__bloque4">
                <h3 class="titulo">Descripcion</h3>
                <p class="descripcion"><?php echo $descripcion ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
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