<?php
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



<?php
 
 include '../include/templete/headerEmpresa.php';

?>

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
  <script src="../src/js/app.js"></script>
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