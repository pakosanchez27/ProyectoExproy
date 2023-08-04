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

$sqlPostulacion = "SELECT p.ID_POSTULACION, c.ID_CANDIDATO, c.CAN_NOMBRE, c.CAN_APELLIDO, c.CAN_FOTOPERFIL, c.CAN_FOTOPORTADA, v.TITULO, v.DESCRIPCION, p.FECHA_POSTULACION, p.ESTADO
FROM postulacion p
INNER JOIN candidato c ON p.ID_CANDIDATO = c.ID_CANDIDATO
INNER JOIN vacante v ON p.ID_VACANTE = v.ID_VACANTE
INNER JOIN empresa e ON v.ID_EMPRESA = e.ID_EMPRESA
WHERE e.ID_EMPRESA = $idEmpresa
AND p.ESTADO <> 'RECHAZADO';
";
$resultPostulacion = $pdo->query($sqlPostulacion);

$sqlRechazados = "SELECT p.ID_POSTULACION, c.ID_CANDIDATO, c.CAN_NOMBRE, c.CAN_APELLIDO, c.CAN_FOTOPERFIL, c.CAN_FOTOPORTADA, v.TITULO, v.DESCRIPCION, p.FECHA_POSTULACION, p.ESTADO
FROM POSTULACION p
INNER JOIN CANDIDATO c ON p.ID_CANDIDATO = c.ID_CANDIDATO
INNER JOIN VACANTE v ON p.ID_VACANTE = v.ID_VACANTE
INNER JOIN EMPRESA e ON v.ID_EMPRESA = e.ID_EMPRESA
WHERE e.ID_EMPRESA = $idEmpresa
AND p.ESTADO = 'RECHAZADO'";
$resultRechazados = $pdo->query($sqlRechazados);    




$pestañaActual = 'En Proceso';

?>



<?php
 
 include '../include/templete/headerEmpresa.php';

?>

    <main class="proceso">
        <div class="proceso__contenedor">
            <h3>En proceso</h3>
            <div class="proceso__tabla">
                <table class="enProceso__tabla">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Vacante Postulada</th>
                            <th>Fecha de Postulación</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($datosPostulacion = $resultPostulacion->fetch(PDO::FETCH_ASSOC)) :
                    //  var_dump($datosPostulacion);
                    $nombre = $datosPostulacion['CAN_NOMBRE'];
                    $apellido = $datosPostulacion['CAN_APELLIDO'];
                    $vacante = $datosPostulacion['TITULO'];
                    $fotoPerfil = $datosPostulacion['CAN_FOTOPERFIL'];
                    $fechaPostulacion = $datosPostulacion['FECHA_POSTULACION'];
                    $estado = $datosPostulacion['ESTADO'];
                    $idCandidato = $datosPostulacion['ID_CANDIDATO'];
                    $idPostulacion = $datosPostulacion['ID_POSTULACION'];
                    
                ?>
                        <tr>
                            <td class="enProceso__img">
                                <img src="../Candidato/CandidatoIMG/<?php echo $fotoPerfil ?>" alt="enProceso">
                            </td>
                            <td><?php echo $nombre . " " . $apellido ?></td>
                            <td><?php echo $vacante ?></td>
                            <td><?php echo $fechaPostulacion ?></td>
                            <td class="enProceso__estado"><?php echo $estado?></td>
                            <td><a href="/Empresa/procesoCandidato.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&estado=<?php echo $estado ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Ver Estado</a></td>
                            <td><a href="#" class="boton__rojo">Rechazar</a></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="proceso__contenedor">
            <h3>Candidatos Rechazados</h3>
            <div class="proceso__tabla">
                <table class="enProceso__tabla">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Vacante Postulada</th>
                            <th>Fecha de Postulación</th>
                            <th>Estado</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while ($datosPostulacion = $resultRechazados->fetch(PDO::FETCH_ASSOC)) :
                    //  var_dump($datosPostulacion);
                    $nombre = $datosPostulacion['CAN_NOMBRE'];
                    $apellido = $datosPostulacion['CAN_APELLIDO'];
                    $vacante = $datosPostulacion['TITULO'];
                    $fotoPerfil = $datosPostulacion['CAN_FOTOPERFIL'];
                    $fechaPostulacion = $datosPostulacion['FECHA_POSTULACION'];
                    $estado = $datosPostulacion['ESTADO'];
                    $idCandidato = $datosPostulacion['ID_CANDIDATO'];
                    $idPostulacion = $datosPostulacion['ID_POSTULACION'];
                    
                ?>
                        <tr>
                            <td class="enProceso__img">
                                <img src="../Candidato/CandidatoIMG/<?php echo $fotoPerfil ?>" alt="enProceso">
                            </td>
                            <td><?php echo $nombre . " " . $apellido ?></td>
                            <td><?php echo $vacante ?></td>
                            <td><?php echo $fechaPostulacion ?></td>
                            <td class="enProceso__estado"><?php echo $estado?></td>
                            <td><a href="/Empresa/Model/etapas.php?" class="boton__rojo">ELIMINAR</a></td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>


    </main>
    <script src="../src/js/app.js"></script>

    <script>
        var currentDateElement = document.getElementById('currentDate');
        var currentDate = new Date();

        var options = { day: '2-digit', month: 'short', year: 'numeric' };
        currentDateElement.textContent = currentDate.toLocaleDateString('es-ES', options);
    </script>
</body>

</html>
