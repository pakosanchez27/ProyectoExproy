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
$idCandidato = $_GET['idCandidato'] ?? null;
$estadoGET = $_GET['estado'] ?? null;
$idPostulacion = $_GET['idPostulacion'] ?? null;

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


$sqlRedes = "SELECT rs.ID_RED, rs.RED_NOMBRE, rs.RED_URI
FROM REDESSOCIALES rs
INNER JOIN CANDIDATO c ON rs.ID_USUARIO = c.ID_USUARIO
WHERE c.ID_CANDIDATO = $idCandidato";
$resultRedes = $pdo->query($sqlRedes);



$sqlDatosCanidadato = "SELECT 
c.ID_CANDIDATO,
c.CAN_NOMBRE,
c.CAN_APELLIDO,
c.CAN_TELEFONO,
c.CAN_GENERO,
c.CAN_FECHANACIMIENTO,
TIMESTAMPDIFF(YEAR, c.CAN_FECHANACIMIENTO, CURDATE()) AS EDAD,
c.AREA,
c.PUESTO,
c.CAN_FOTOPERFIL,
c.CAN_FOTOPORTADA,
c.CAN_CURRICULUM,
c.CAN_ACERCA,
c.CAN_PORTAFOLIO,
u.CORREO
FROM CANDIDATO c
INNER JOIN USUARIO u ON c.ID_USUARIO = u.ID_USUARIO
WHERE c.ID_CANDIDATO = $idCandidato";
$resultDatosCandidato = $pdo->query($sqlDatosCanidadato);
$datosCandidato = $resultDatosCandidato->fetch(PDO::FETCH_ASSOC);
// var_dump($datosCandidato);

$nombreCandidato = $datosCandidato['CAN_NOMBRE'];
$apellidoCandidato = $datosCandidato['CAN_APELLIDO'];
$telefonoCandidato = $datosCandidato['CAN_TELEFONO'];
$fotoCandidato = $datosCandidato['CAN_FOTOPERFIL'];
$puestoCandidato = $datosCandidato['PUESTO'];
$correoCandidato = $datosCandidato['CORREO'];
$edadCandidato = $datosCandidato['EDAD'];

$sqlPostulacion = "SELECT p.ID_POSTULACION, c.ID_CANDIDATO, c.CAN_NOMBRE, c.CAN_APELLIDO, c.CAN_FOTOPERFIL, c.CAN_FOTOPORTADA, v.TITULO, v.DESCRIPCION, p.FECHA_POSTULACION, p.ESTADO
FROM POSTULACION p
INNER JOIN CANDIDATO c ON p.ID_CANDIDATO = c.ID_CANDIDATO
INNER JOIN VACANTE v ON p.ID_VACANTE = v.ID_VACANTE
INNER JOIN EMPRESA e ON v.ID_EMPRESA = e.ID_EMPRESA
WHERE e.ID_EMPRESA = $idEmpresa
AND p.ESTADO <> 'RECHAZADO';
";
$resultPostulacion = $pdo->query($sqlPostulacion);

?>



<?php

include '../include/templete/headerEmpresa.php';

?>


<main class="procesoCandidato">
    <div class="procesoCandidato__contenedor">
        <div class="procesoCandidato__principal">
            <h2>Flujo de Contratacion</h2>
            <div class="procesoCandidato__tabla">
                <?php
                // Obtener el valor del paso actual, asegurándote de que esté en minúsculas para comparar de manera insensible a mayúsculas
                $estadoGET = ($estadoGET);
                ?>

                <div class="proceso__tabla__card procesoCard sombra">
                    <!-- Etapa 1 - Postulación -->
                    <div class="procesoCard__Etapa" data-etapa="POSTULADO">
                        <div class="procesoCard__paso">
                            <img src="../build/img/gerente.webp">
                            <div class="procesoCard__texto">
                                <h3>Etapa 1. Postulación</h3>
                                <p>El candidato está interesado en tu Vacante.</p>
                            </div>
                        </div>
                        <div class="procesoCard__btns">
                            <?php if ($estadoGET !== 'POSTULADO') : ?>
                                <a href="#" class="boton__rojo opacity50" disabled>Rechazar</a>
                                <a href="#" class="boton__verde opacity50" disabled>Aprobar</a>
                            <?php else : ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=RECHAZADO&idPostulacion=<?php echo $idPostulacion ?>" class="boton__rojo">Rechazar</a>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- Etapa 1 -->

                    <!-- Etapa 2 - Revisión de CV -->
                    <div class="procesoCard__Etapa ocultar" data-etapa="REVISION">
                        <div class="procesoCard__paso">
                            <img src="../build/img/revision.webp">
                            <div class="procesoCard__texto">
                                <h3>Etapa 2. Revisión de CV</h3>
                                <p>Entra al perfil del candidato y verifica si es apto para tu vacante.</p>
                            </div>
                        </div>
                        <div class="procesoCard__btns">
                            <?php if ($estadoGET !== 'REVICION') : ?>
                                <a href="#" class="boton__rojo opacity50" disabled>Rechazar</a>
                                <a href="#" class="boton__verde opacity50" disabled>Aprobar</a>
                            <?php else : ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=RECHAZADO&idPostulacion=<?php echo $idPostulacion ?>" class="boton__rojo">Rechazar</a>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- Etapa 2 -->

                    <!-- Etapa 3 - Pruebas Psicométricas -->
                    <div class="procesoCard__Etapa ocultar" data-etapa="PRUEBAS">
                        <div class="procesoCard__paso">
                            <img src="../build/img/prueba.webp">
                            <div class="procesoCard__texto">
                                <h3>Etapa 3. Pruebas Psicométricas</h3>
                                <p>Envía las pruebas psicométricas al candidato.</p>
                            </div>
                        </div>
                        <div class="procesoCard__btns">
                            <?php if ($estadoGET !== 'PRUEBA') : ?>
                                <a href="#" class="boton__rojo opacity50" disabled>Rechazar</a>
                                <a href="#" class="boton__verde opacity50" disabled>Aprobar</a>
                            <?php else : ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=RECHAZADO&idPostulacion=<?php echo $idPostulacion ?>" class="boton__rojo">Rechazar</a>
                                <a href="#" class="boton__azul">Enviar</a>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- Etapa 3 -->

                    <!-- Etapa 4 - Entrevista -->
                    <div class="procesoCard__Etapa ocultar" data-etapa="ENTREVISTA">
                        <div class="procesoCard__paso">
                            <img src="../build/img/entrevista.webp">
                            <div class="procesoCard__texto">
                                <h3>Etapa 4. Entrevista</h3>
                                <p>Agenda una entrevista con tu candidato.</p>
                            </div>
                        </div>
                        <div class="procesoCard__btns">
                            <?php if ($estadoGET !== 'ENTREVISTA') : ?>
                                <a href="#" class="boton__rojo opacity50" disabled>Rechazar</a>
                                <a href="#" class="boton__verde opacity50" disabled>Aprobar</a>
                            <?php else : ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=RECHAZADO&idPostulacion=<?php echo $idPostulacion ?>" class="boton__rojo">Rechazar</a>
                                <a href="#" class="boton__azul">Agendar</a>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- Etapa 4 -->

                    <!-- Etapa 5 - Documentación -->
                    <div class="procesoCard__Etapa ocultar" data-etapa="DOCUMENTOS">
                        <div class="procesoCard__paso">
                            <img src="../build/img/documentos.webp">
                            <div class="procesoCard__texto">
                                <h3>Etapa 5. Documentación</h3>
                                <p>Te ayudamos a recolectar los documentos generales.</p>
                            </div>
                        </div>
                        <div class="procesoCard__btns">
                            <?php if ($estadoGET !== 'DOCUMENTOS') : ?>
                                <a href="#" class="boton__rojo opacity50" disabled>Rechazar</a>
                                <a href="#" class="boton__verde opacity50" disabled>Aprobar</a>
                            <?php else : ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=RECHAZADO&idPostulacion=<?php echo $idPostulacion ?>" class="boton__rojo">Rechazar</a>
                                <a href="#" class="boton__azul">Ver</a>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- Etapa 5 -->

                    <!-- Etapa 6 - Contratación -->
                    <div class="procesoCard__Etapa ocultar" data-etapa="CONTRATACION">
                        <div class="procesoCard__paso">
                            <img src="../build/img/exito.webp">
                            <div class="procesoCard__texto">
                                <h3>Etapa 6. Contratación</h3>
                                <p>Indícanos si has contratado a este candidato.</p>
                            </div>
                        </div>
                        <div class="procesoCard__btns">
                            <?php if ($estadoGET !== 'CONTRATADO') : ?>
                                <a href="#" class="boton__rojo opacity50" disabled>Rechazar</a>
                                <!-- <a href="#" class="boton__azul">Ver</a> -->
                                <a href="#" class="boton__verde opacity50" disabled>Aprobar</a>
                            <?php else : ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=RECHAZADO&idPostulacion=<?php echo $idPostulacion ?>" class="boton__rojo">Rechazar</a>
                                <!-- <a href="#" class="boton__azul">Ver</a> -->
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Contratado</a>
                            <?php endif; ?>
                        </div>
                    </div> <!-- Etapa 6 -->
                </div>

            </div>
        </div>
        <div class="procesoCandidato__aside sombra">
            <div class="procesoCandidato__PerfilCard">
                <img src="../Candidato/CandidatoIMG/<?php echo $fotoCandidato ?>">
                <h3><?php echo $nombreCandidato . " " . $apellidoCandidato ?></h3>
                <p class="procesoCandidato__puesto"><?php echo $puestoCandidato ?></p>
                <!-- <p class="procesoCandidato__vacante">Desarrollador Jr JavaScript</p> -->

                <div class="procesoCandidato__redes">
                    <?php foreach ($resultRedes as $datosRedes) : ?>
                        <a href="<?php echo $datosRedes['RED_URI'] ?>"><img src="../build/img/<?php echo $datosRedes['RED_NOMBRE'] ?>.webp"></a>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="procesoCandidato__datos">
                <div class="procesoCandidato__dato">
                    <img src="../build/img/tel.png">
                    <p>Telefono: <span><?php echo $telefonoCandidato ?></span></p>
                </div>
                <div class="procesoCandidato__dato">
                    <img src="../build/img/email.webp">
                    <p>Email: <span><?php echo $correoCandidato ?></span></p>
                </div>
                <div class="procesoCandidato__dato">
                    <img src="../build/img/años.webp">
                    <p>Edad: <span><?php echo $edadCandidato ?> años</span></p>
                </div>
            </div>

        </div>
    </div>
</main>

<script>
    // Obtener el valor del estado desde PHP (PHP lo asigna a la variable $estadoGET)
    const estadoGET = <?php echo json_encode($estadoGET); ?>;

    // Función para mostrar la etapa según el estado proporcionado
    function mostrarEtapaPorEstado(estado) {
        const etapas = document.querySelectorAll('.etapa');
        etapas.forEach(etapa => {
            // Obtener el nombre de la etapa desde el atributo data-etapa
            const nombreEtapa = etapa.dataset.etapa;
            // Mostrar etapa si el estado coincide con el nombre de la etapa
            if (nombreEtapa === estado) {
                etapa.classList.remove('ocultar');
                etapa.classList.add('mostrarMenu');
            }
        });
    }

    // Llamar a la función para mostrar la etapa según el estado proporcionado
    mostrarEtapaPorEstado(estadoGET);
</script>
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