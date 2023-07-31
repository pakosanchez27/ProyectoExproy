<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../include/funciones.php';
$auth = estaAutenticado();
$usuario = $_SESSION['usuario'];
if (!$auth) {
    header('Location: /Candidato/loginCandidato.php');
}


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
$idEmpresa = $datosUs['ID_EMPRESA'];

$sqlPostulacion = "SELECT p.ID_POSTULACION, c.CAN_NOMBRE, c.CAN_APELLIDO, c.CAN_FOTOPERFIL, c.CAN_FOTOPORTADA, v.TITULO, v.DESCRIPCION, p.FECHA_POSTULACION, p.ESTADO
FROM POSTULACION p
INNER JOIN CANDIDATO c ON p.ID_CANDIDATO = c.ID_CANDIDATO
INNER JOIN VACANTE v ON p.ID_VACANTE = v.ID_VACANTE
INNER JOIN EMPRESA e ON v.ID_EMPRESA = e.ID_EMPRESA
WHERE e.ID_EMPRESA = $idEmpresa
AND p.ESTADO = 'POSTULADO';
";

$resultPostulacion = $pdo->query($sqlPostulacion);



$pestañaActual = 'Postulados';


?>




<?php
 
 include '../include/templete/headerEmpresa.php';

?>

    <main class="prospectos">
        <div class="prospectos__contenedor">
            <h3>Postulados</h3>
            <div class="prospectos__cards">
                <?php while ($datosPostulacion = $resultPostulacion->fetch(PDO::FETCH_ASSOC)) :
                    //  var_dump($datosPostulacion);
                    $nombre = $datosPostulacion['CAN_NOMBRE'];
                    $apellido = $datosPostulacion['CAN_APELLIDO'];
                    $vacante = $datosPostulacion['TITULO'];
                    $fotoPerfil = $datosPostulacion['CAN_FOTOPERFIL'];
                    $fotoPortada = $datosPostulacion['CAN_FOTOPORTADA'];
                ?>

             
                    <div class="prospectos__card">

                        <div class="prospectos__card__portada"></div>
                        <div class="prospectos__card__infoProspecto infoProspecto">
                            <img src="../Candidato/CandidatoIMG/<?php echo $fotoPerfil ?>" alt="FotoPerfil">
                            <p class="infoProspecto__nombre"><?php echo $nombre . " " . $apellido ?></p>
                            <p class="infoProspecto__puesto"><?php echo $vacante ?></p>
                            <!-- <p class="infoProspecto__vacante">Desarrollador Web Jr</p> -->
                            <a href="#" class="boton__verde__postulacion">Ver perfil</a>
                        </div>
                    </div>

                <?php endwhile; ?>

            </div>
        </div>
    </main>
    <script src="../src/js/app.js"></script>

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