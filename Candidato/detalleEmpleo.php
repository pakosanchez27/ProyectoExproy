<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idVacante = $_GET['idVacante'] ?? null;
$idEmpresa = $_GET['idEmpresa'] ?? null;

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


$sqlVacante = "SELECT V.*, E.EMP_EMPRESA, E.EMP_FOTOPERFIL, DATE_FORMAT(EV.FECHA_CREACION_VACANTE, '%d-%m-%Y') AS FECHA_PUBLICACION
FROM VACANTE V
JOIN EMPRESA E ON V.ID_EMPRESA = E.ID_EMPRESA
JOIN EMPRESA_VACANTE EV ON V.ID_VACANTE = EV.ID_VACANTE
WHERE V.ID_EMPRESA = $idEmpresa  -- Reemplaza ? con el valor del ID de la empresa recibido por GET
  AND V.ID_VACANTE = $idVacante  -- Reemplaza ? con el valor del ID de la vacante recibido por GET
";
$resultVacante = $pdo->query($sqlVacante);
$datosVacante = $resultVacante->fetch(PDO::FETCH_ASSOC);

$ID_VACANTE = $datosVacante["ID_VACANTE"];
$TITULO = $datosVacante["TITULO"];
$DESCRIPCION = $datosVacante["DESCRIPCION"];
$SALARIO = $datosVacante["SALARIO"];
$CIUDAD = $datosVacante["CIUDAD"];
$ESTADO = $datosVacante["ESTADO"];
$AREA = $datosVacante["AREA"];
$PUESTO = $datosVacante["PUESTO"];
$EDUCACION = $datosVacante["EDUCACION"];
$TIPO_CONTRATO = $datosVacante["TIPO_CONTRATO"];
$HORARIO = $datosVacante["HORARIO"];
$MODO_TRABAJO = $datosVacante["MODO_TRABAJO"];
$VENCIMIENTO = $datosVacante["VENCIMIENTO"];
$NUMERO_VACANTES = $datosVacante["NUMERO_VACANTES"];
$ID_EMPRESA = $datosVacante["ID_EMPRESA"];
$EMP_EMPRESA = $datosVacante["EMP_EMPRESA"];
$PUBLICACION = $datosVacante["FECHA_PUBLICACION"];
$EMP_FOTOPERFIL = $datosVacante["EMP_FOTOPERFIL"];

// var_dump($datosVacante);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="../build/css/app.css" />
  <title>Perfil Candiadto</title>
</head>

<style>
  .principal__header__portada {
    /* border: #187e44 1px solid; */
    border-top-left-radius: 0rem;
    border-top-right-radius: 0rem;
    background-image: url("../src/img/1646811898925.jpeg");
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
  <div class="detalleMobile">
    <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>" class="detalleMobile__regresar">
      <img src="../build/img/flecha.webp">
    </a>
    <div class="detalleMobile__datos">
      <div class="detalle__contenido__datos datos">
        <div class="datos__contenedor">
          <div class="datos__bloque1">
            <div class="datos__bloque1__datos">
              <p class="fechaPublicacion"><?php echo $PUBLICACION ?></p>
              <h3 class="titulo"><?php echo $TITULO ?></h3>
              <p class="salario">$<?php echo $SALARIO ?>menusales</p>
              <p class="empresa"><?php echo $EMP_EMPRESA ?></p>
              <p class="lugar"><?php echo $CIUDAD ?>, <span><?php echo $ESTADO ?></span></p>
              
              <a href="/Candidato/Model/postular.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $ID_CANDIDATO ?>&idVacante=<?php echo $ID_VACANTE ?>" class="boton__verde">Postularme</a>
            </div>
            <div class="datos__bloque1__img">
              <img src="../Empresa/EmpresaIMG/<?php echo $EMP_FOTOPERFIL ?>" alt="">
            </div>
          </div>
          <div class="datos__bloque2">
            <h3 class="titulo">Datos Generales</h3>
            <p><span>Area:</span> <?php echo $AREA ?>.</p>
            <p><span>Puesto:</span> <?php echo $PUESTO ?>.</p>
            <p><span>Educación:</span> <?php echo $EDUCACION ?>.</p>
          </div>
          <div class="datos__bloque3">
            <h3 class="titulo">Detalles del empelo</h3>
            <p><span>Tipo de contratación:</span> <?php echo $TIPO_CONTRATO ?>.</p>
            <p><span>Horario:</span> <?php echo $HORARIO ?>.</p>
            <p><span>Modo de trabajo:</span> <?php echo $MODO_TRABAJO ?>.</p>
            <p><span>Vencimiento</span> <?php echo $VENCIMIENTO ?>.</p>
            <p><span>Vacacantes Disponibles:</span> <?php echo $NUMERO_VACANTES ?> </p>
          </div>
          <div class="datos__bloque4">
            <h3 class="titulo">Descripcion</h3>
            <p class="descripcion"><?php echo $DESCRIPCION ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="detalle">
    <a  href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>" class="detalleMobile__regresar">
      <img src="../build/img/flecha.webp">
    </a>
    <div class="detalleMobile__datos">
      <div class="detalle__contenido__datos datos">
        <div class="datos__contenedor">
          <div class="datos__bloque1">
            <div class="datos__bloque1__datos">
              <p class="fechaPublicacion"><?php echo $PUBLICACION ?></p>
              <h3 class="titulo"><?php echo $TITULO ?></h3>
              <p class="salario">$<?php echo $SALARIO ?> menusales</p>
              <p class="empresa"><?php echo $EMP_EMPRESA ?></p>
              <p class="lugar"><?php echo $CIUDAD ?>, <span><?php echo $ESTADO ?></span></p>
              <a href="/Candidato/Model/postular.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $ID_CANDIDATO ?>&idVacante=<?php echo $ID_VACANTE ?>" class="boton__verde">Postularme</a>
            </div>
            <div class="datos__bloque1__img">
            <img src="../Empresa/EmpresaIMG/<?php echo $EMP_FOTOPERFIL ?>" alt="">
            </div>
          </div>
          <div class="datos__bloque2">
            <h3 class="titulo">Datos Generales</h3>
            <p><span>Area:</span> <?php echo $AREA ?>.</p>
            <p><span>Puesto:</span> <?php echo $PUBLICACION ?>.</p>
            <p><span>Educación:</span> <?php echo $EDUCACION ?>.</p>
          </div>
          <div class="datos__bloque3">
            <h3 class="titulo">Detalles del empelo</h3>
            <p><span>Tipo de contratación:</span> <?php echo $TIPO_CONTRATO ?>.</p>
            <p><span>Horario:</span> <?php echo $HORARIO ?>.</p>
            <p><span>Modo de trabajo:</span> <?php echo $MODO_TRABAJO ?>.</p>
            <p><span>Vencimiento</span><?php echo $VENCIMIENTO ?>.</p>
            <p><span>Vacacantes Disponibles:</span> <?php echo $NUMERO_VACANTES ?></p>
          </div>
          <div class="datos__bloque4">
            <h3 class="titulo">Descripcion</h3>
            <p class="descripcion"><?php echo $DESCRIPCION ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="footer footer__candidato">
    <div class="footer__principal">
      <div class="footer__logo">
        <a href="/">AgoraTalent</a>
        <p>Simplificando la búsqueda y seleccion de talento</p>
      </div>
      <hr />
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
      <hr />
      <div class="footer__seccion">
        <nav>
          <p>Ayuda</p>
          <a href="#" class="enlace">Acerca de</a>
          <a href="#" class="enlace">Privacidad</a>
          <a href="#" class="enlace">Condiciones</a>
          <a href="#" class="enlace">FAQs</a>
        </nav>
      </div>
      <hr />
      <div class="footer__seccion">
        <nav>
          <p>Redes sociales</p>
          <div class="footer__logos">
            <a href="#" class="logos">
              <img src="/build/img/facebook-color.webp" alt="Logo de Facebook" />
            </a>
            <a href="#" class="logos">
              <img src="/build/img/twetter.webp" alt="Logo Tweeter" />
            </a>
            <a href="#" class="logos">
              <img src="/build/img/youtube-color.png" alt="Logo Youtube" />
            </a>
          </div>
          <a href="#" class="enlace">Blog</a>
          <a href="#" class="enlace">Contacto</a>
        </nav>
      </div>
      <hr />
      <div class="footer__descarga">
        <div class="footerApp btn__App">
          <div class="btn__logo">
            <img src="/build/img/google-play.webp" alt="Logo de google play" />
          </div>
          <div class="btn__texto">
            <p><span>Descarga en</span></p>
            <p>Google Play</p>
          </div>
        </div>
        <div class="btn__App footerApp">
          <div class="btn__logo">
            <img src="/build/img/logo-apple.webp" alt="Logo de google play" />
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