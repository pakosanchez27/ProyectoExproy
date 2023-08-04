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
$estatus = $_GET['estatus'] ?? null;

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
FROM redessociales rs
INNER JOIN candidato c ON rs.ID_USUARIO = c.ID_USUARIO
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
FROM candidato c
INNER JOIN usuario u ON c.ID_USUARIO = u.ID_USUARIO
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
FROM postulacion p
INNER JOIN candidato c ON p.ID_CANDIDATO = c.ID_CANDIDATO
INNER JOIN vacante v ON p.ID_VACANTE = v.ID_VACANTE
INNER JOIN empresa e ON v.ID_EMPRESA = e.ID_EMPRESA
WHERE e.ID_EMPRESA = $idEmpresa
AND p.ESTADO <> 'RECHAZADO';
";
$resultPostulacion = $pdo->query($sqlPostulacion);

$sqlPrueba = "SELECT * FROM pruebas WHERE id_empresa = $idEmpresa AND id_candidato = $idCandidato";
// var_dump($sqlPrueba);
$resultPrueba = $pdo->query($sqlPrueba);
$datosPrueba = $resultPrueba->fetch(PDO::FETCH_ASSOC);
$estatus = $datosPrueba['ESTATUSPRUEBA'] ?? null;

$sqlEntrevista = "SELECT STATUSENTREVISTA  FROM cita WHERE ID_EMPRESA = $idEmpresa AND ID_CANDIDATO = $idCandidato";
// var_dump($sqlEntrevista);
$resultEntrevista = $pdo->query($sqlEntrevista);
$datosEntrevista = $resultEntrevista->fetch(PDO::FETCH_ASSOC);
$statusEntrevista = $datosEntrevista['STATUSENTREVISTA'] ?? null;



$sqlDocumentos = "SELECT ESTADODOCUMENTO FROM documentos WHERE ID_EMPRESA = $idEmpresa AND ID_CANDIDATO = $idCandidato";
$resultDocumentos = $pdo->query($sqlDocumentos);
$datosDocumentos = $resultDocumentos->fetch(PDO::FETCH_ASSOC);
$statusDocumentos = $datosDocumentos['ESTADODOCUMENTO'] ?? null;

$sqlPerfil = "SELECT ID_USUARIO
FROM candidato
WHERE CAN_NOMBRE = '$nombreCandidato' AND CAN_APELLIDO = '$apellidoCandidato'
";
$resultPerfil = $pdo->query($sqlPerfil);
$datosPerfil = $resultPerfil->fetch(PDO::FETCH_ASSOC);
$idPerfil = $datosPerfil['ID_USUARIO'] ?? null;




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
                                <?php if ($estatus === null) : ?>
                                    <a href="#" id="btnPrueba" class="boton__azul">Enviar</a>
                                <?php else : ?>
                                    <a href="#" id="btnPruebaVer" class="boton__azul">Ver</a>
                                <?php endif; ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>
                        <div class="formularioEmegente ocultar" id="pruebaPsicometrica">
                            <div class="formularioEmegente__contenedor">
                                <h2>Pruebas Psicometricas</h2>
                                <p>Envia al candidato los link a las pruebas piscometricas que usa tu empresa</p>
                                <p>nota: si tu empresa no usa pruebas psicometricas en linea o prefieres omitirlas solo aprueba en este proceso a tu candidato.</p>
                                <form action="/Empresa/Model/procesoPruebas.php?id=<?php echo $idUsuario ?>&idEmpresa=<?php echo $idEmpresa ?>&idCandidato=<?php echo $idCandidato ?>&idPostulacion=<?php echo $idPostulacion ?>&estado=<?php echo $estadoGET ?>" class="formularioEmegente__campos" method="POST">
                                    <div class="campo nombrePrueba">
                                        <label for="nombrePrueba">Nombre de la prueba</label>
                                        <input type="text" name="nombrePrueba[]" id="nombrePrueba" placeholder="Nombre de la prueba psicometrica">
                                    </div>
                                    <div class="campo LinkPrueba">
                                        <label for="LinkPrueba">Link a la prueba piscometrica</label>
                                        <input type="text" name="LinkPrueba[]" id="LinkPrueba" placeholder="Link a la prueba psicometrica">
                                    </div>

                                    <div class="masPruebas"></div>
                                    <a href="#" id="agregarPrueba" class="boton__negro">Agregar Prueba</a>
                                    <div class="campo btns">
                                        <input type="submit" class="boton__verde" value="Enviar Pruebas">
                                        <a href="#" id="cerrarPruebas" class="boton__blanco ">Cancelar</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="formularioEmegente ocultar " id="resultadosPsicometrica">
                            <div class="formularioEmegente__contenedor">
                                <h2>Confirmacion de Psicometricas</h2>
                                <p>Aqui podras ver cuando tu candidato complete las pruebas Psicometricas</p>

                                <div class="resultadosPruebas">
                                    <table class="resultadosPruebas__tabla">
                                        <thead>
                                            <tr>
                                                <th>Nombre Prueba</th>
                                                <th>Status Prueba</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql = "SELECT * FROM pruebas WHERE id_empresa = $idEmpresa AND id_candidato = $idCandidato";
                                            $result = $pdo->query($sql);
                                            while ($datos = $result->fetch(PDO::FETCH_ASSOC)) :
                                                $nombre = $datos['NOMBREPRUEBA'];
                                                $status = $datos['ESTATUSPRUEBA'];


                                                if ($status == 'ENVIADO') {
                                                    $status = "NO RESUELTO";
                                                }
                                            ?>
                                                <tr>

                                                    <td><?php echo $nombre ?></td>
                                                    <td class="estadoPrueba"><?php echo $status ?></td>

                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>

                                    <a href="#" id="cerrarPruebasVer" class="boton__rojo">Cerrar</a>
                                </div>


                            </div>

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
                                <?php if ($statusEntrevista === null) : ?>
                                    <a href="#" id="btnAgendar" class="boton__azul">Agendar</a>
                                <?php else : ?>
                                    <a href="#" id="btnAgendarVer" class="boton__azul">Ver</a>
                                <?php endif; ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>

                        <div class="formularioEmegente ocultar" id="datosEntrevista">
                            <div class="formularioEmegente__contenedor">
                                <h2>Entrevista Precencial</h2>
                                <p>Agenda una cita con tu candidato, llena los siguientes campo, recuerda que en el apartado de observaciones puedes agregar algun requisieto que necesite para su entrevista.</p>
                                <form action="/Empresa/Model/procesoEntrevista.php?id=<?php echo $idUsuario ?>&idEmpresa=<?php echo $idEmpresa ?>&idCandidato=<?php echo $idCandidato ?>&idPostulacion=<?php echo $idPostulacion ?>&estado=<?php echo $estadoGET ?>" class="entrevista__campos" method="POST">
                                    <div class="campo nombreEntrevistador">
                                        <label for="nombreEntrevistador">¿Quien entrevistara al candidato?</label>
                                        <input type="text" name="nombreEntrevistador" id="nombreEntrevistador">
                                    </div>
                                    <div class="campo telEntrevistador">
                                        <label for="telEntrevistador">Telefono del Entrevistador</label>
                                        <input type="tel" name="telEntrevistador" id="telEntrevistador">
                                    </div>
                                    <div class="campo fechaCita">
                                        <label for="fechaCita">Fecha de la Cita <span>* La cita debe de tener por lo menos un dia de anticipación</span></label>
                                        <input type="date" name="fechaCita" id="fechaCita">
                                    </div>
                                    <div class="campo horaCita">
                                        <label for="horaCita">Hora de la Cita <span>* La hora de la cita debe ser en un horario laborla (8 am a 8 pm)</span></label>
                                        <input type="time" name="horaCita" id="horaCita" min="08:00" max="20:00">
                                    </div>
                                    <div class="campo observaciones">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea name="observaciones" id="observaciones"></textarea>
                                    </div>
                                    <fieldset>
                                        <legend>Lugar de la cita</legend>
                                        <div class="campo calle">
                                            <label for="calle">Calle y numero</label>
                                            <input type="text" name="calle" id="calle">
                                        </div>
                                        <div class="campo postal">
                                            <label for="postal">Codigo Postal</label>
                                            <input type="text" name="postal" id="postal">
                                        </div>
                                        <div class="campo estado">
                                            <label for="estado">Estado</label>
                                            <select name="estado" id="estado">
                                                <option value="" selected disabled>--selecciona un estado--</option>
                                            </select>
                                        </div>
                                        <div class="campo ciudad">
                                            <label for="ciudad">Ciudad o Municipio</label>
                                            <select name="ciudad" id="ciudad">
                                                <option value="" selected disabled>--selecciona una ciudad--</option>
                                            </select>
                                        </div>
                                        <div class="campo colonia">
                                            <label for="colonia">Colonia o Delegacion</label>
                                            <input type="text" name="colonia" id="colonia">
                                        </div>
                                    </fieldset>

                                    <div class="campo bts">
                                        <input type="submit" value="Agendar" class="boton__verde">
                                        <a href="#" id="cerrarEntrevista" class="boton__blanco">Cancelar</a>
                                    </div>
                                </form>



                            </div>

                        </div>
                        <div class="formularioEmegente ocultar " id="datosEntrevistaVer">
                            <div class="formularioEmegente__contenedor">
                                <h2>Estado de la entrevista</h2>
                                <p>Cuando el candidato confirme la entrevista veras aqui el estatus.</p>
                                <?php if ($statusEntrevista === 'CONFIRMADA') :  ?>
                                    <div class="estatusEntrevista">
                                        <h3>El candidato confirmo la entrevista</h3>
                                        <img src="/build/img/undraw_order_confirmed_re_g0if.svg">
                                    </div>
                                <?php else : ?>
                                    <div class="estatusEntrevista">
                                        <h3>Aun no ha sido confirmada la entrevista</h3>
                                        <img src="/build/img/esperaEntrevista.svg">
                                    </div>
                                <?php endif; ?>
                                <div class=" bts">
                                    <a href="#" id="cerrarEntrevistaVer" class="boton__rojo">Cerrar</a>
                                </div>
                            </div>

                        </div>
                    </div> <!-- Etapa 4 -->

                    <!-- Etapa 5 - Documentación -->
                    <div class="procesoCard__Etapa " data-etapa="DOCUMENTOS">
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

                                <?php if ($statusDocumentos === null) : ?>
                                    <a href="#" id="btnDocumentos" class="boton__azul">Solicitar</a>
                                <?php else : ?>
                                    <a href="#" id="btnDocumentosVer" class="boton__azul">Descargar</a>
                                <?php endif; ?>
                                <a href="/Empresa/Model/etapas.php?id=<?php echo $idUsuario ?>&idCandidato=<?php echo $idCandidato ?>&etapa=<?php echo $estadoGET ?>&idPostulacion=<?php echo $idPostulacion ?>" class="boton__verde">Aprobar</a>
                            <?php endif; ?>
                        </div>

                        <div class="formularioEmegente ocultar " id="solicitarDocumentos">
                            <div class="formularioEmegente__contenedor">
                                <h2>Documentación</h2>
                                <p>Agrega los documentos que requieres de tu candidato <span>* Recuerda que se solicitara al candidato los documentos en PDF</span>.</p>
                                <form class="formularioDocumentos" action="/Empresa/Model/procesoDocuementos.php?id=<?php echo $idUsuario ?>&idEmpresa=<?php echo $idEmpresa ?>&idCandidato=<?php echo $idCandidato ?>&idPostulacion=<?php echo $idPostulacion ?>&estado=<?php echo $estadoGET ?>" class="entrevista__campos" method="POST">

                                    <div class="campo documento">
                                        <label for="documento1">Documento 1:</label>
                                        <input type="text" name="documentos[]" required placeholder="Ej. Acta de nacimiento">
                                    </div>
                                    <div class="campo documento">
                                        <label for="documento2">Documento 2:</label>
                                        <input type="text" name="documentos[]" required placeholder="Ej. Comprobante de Domicilio">
                                    </div>
                                    <!-- Aquí se agregarán más campos de documentos si es necesario -->
                                    <div id="documentosAdicionales"></div>

                                    <button class="boton__negro" type="button" id="agregarDocumento">Agregar otro documento</button>
                                    <button class="boton__verde" type="submit">Enviar</button>
                                </form>

                                <a href="#" id="cerrarDocumentos" class="boton__rojo">Cerra</a>
                            </div>

                        </div>
                        <div class="formularioEmegente ocultar " id="descargaDocuementos">
                            <div class="formularioEmegente__contenedor">
                                <h2>Documentación</h2>
                                <p>Descarga los docuementos solicitado <span>* Una vez que el candidato suba sus documento se habilitara el boton para descargar.</span>.</p>
                                <table class="resultadosPruebas__tabla">
                                    <thead>
                                        <tr>
                                            <th>Nombre del documento</th>
                                            <th>Descargar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        #consulta para traer los documentos que pertenescan de la relacion entre candidato empresa y postulacion
                                        $consultaDocumentos = "SELECT * FROM documentos WHERE ID_CANDIDATO = $idCandidato AND ID_EMPRESA = $idEmpresa AND ID_POSTULACION = $idPostulacion";
                                        $resultadoConsultaDocumentos = $pdo->query($consultaDocumentos);
                                        while($row = $resultadoConsultaDocumentos->fetch(PDO::FETCH_ASSOC)):
                                            $nombreDocumento = $row['NOMBRE_DOCUMENTO'];
                                            $rutaDocuemento = $row['RUTA_DOCUMENTO'];

                                        
                                       
                                        ?>
                                        <tr>
                                            <td><?php echo $nombreDocumento; ?></td>
                                            <?php if($rutaDocuemento === null): ?>
                                                <td><button class="boton__rojo" disabled>Descargar</button></td>
                                            <?php else: ?>
                                            <td><a href="<?php echo $rutaDocuemento ?>" download><button class="boton__verde">Descargar</button></a></td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php endwhile; ?>
                                     
                                    </tbody>
                                </table>

                                <a href="#" id="cerrarDescargaDocumentos" class="boton__rojo">Cerrar</a>
                            </div>

                        </div>
                    </div> <!-- Etapa 5 -->

                    <!-- Etapa 6 - Contratación -->
                    <div class="procesoCard__Etapa " data-etapa="CONTRATACION">
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
                <a href="/Empresa/perfilCanidadatoEmpresa.php?id=<?php echo $idUsuario ?>&idPerfil=<?php echo $idPerfil ?>" class="boton__verde">Ver Perfil</a>
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
<script src="../src/js/procesoEmpresa.js"></script>
<script src="../src/js/selectEstados.js"></script>


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