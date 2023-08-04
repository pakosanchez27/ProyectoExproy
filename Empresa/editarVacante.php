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
FROM vacante v
JOIN empresa_vacante ev ON v.ID_VACANTE = ev.ID_VACANTE
JOIN empresa e ON ev.ID_EMPRESA = e.ID_EMPRESA
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



<?php
 
 include '../include/templete/headerEmpresa.php';

?>

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