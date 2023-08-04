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

$sqlActivos = "SELECT * FROM vacante WHERE DATEDIFF(VENCIMIENTO, CURDATE()) >= 3  AND id_empresa = $IdEmpresa";
// echo $sqlActivos;
$resultVacante = $pdo->query($sqlActivos);

$sqlVencer = "SELECT * FROM vacante WHERE DATEDIFF(VENCIMIENTO, CURDATE()) > 0 AND DATEDIFF(VENCIMIENTO, CURDATE()) < 3 AND id_empresa = $IdEmpresa";
// echo $sqlActivos;
$resultVencer = $pdo->query($sqlVencer);

$sqlVencido = "SELECT * FROM vacante WHERE DATEDIFF(VENCIMIENTO, CURDATE()) <= 1 AND id_empresa = $IdEmpresa";
// echo $sqlVencido;
$resultVencido = $pdo->query($sqlVencido);


$pestañaActual = 'Mis Vacantes';
?>



<?php
 
 include '../include/templete/headerEmpresa.php';

?>

    <main class="vacantes">
        <div class="vacantes__contenedor contenidoPrincipal sombra">
            <div class="vacantes__header">
                <h3>Mis vacantes</h3>

                <a href="#" class="boton__verde" id="crearVacante">Publicar Vacante</a>
            </div>

            <h3>Activas</h3>
            <p>Publicaciones con mas de 3 dias para vencer</p>
            <div class="vacantes__cards">
                <?php if ($resultVacante->rowCount() > 0) : ?>
                    <?php while ($datosActivo = $resultVacante->fetch(PDO::FETCH_ASSOC)) : ?>
                        <div class="misVacantes__card">
                            <a href="/Empresa/vacanteDetalle.php?id=<?php echo $idUsuario ?>&idVacante=<?php echo $datosActivo['ID_VACANTE'];  ?>&idEmpresa=<?php echo $IdEmpresa;  ?>">
                                <div class="misVacantes__img">
                                    <img src="../Empresa/EmpresaIMG/<?php echo $datosUs['EMP_FOTOPERFIL']; ?>" alt="misVacantes">
                                </div>
                                <div class="misVacantes__datos">
                                    <h3 class="titulo"><?php echo $datosActivo['TITULO']; ?></h3>
                                    <a href="#" class="empresa"><?php echo $datosUs['EMP_EMPRESA']; ?></a>
                                    <p class="salario">$<?php echo $datosActivo['SALARIO']; ?> mensuales</p>
                                    <p class="cantidadVaca"><?php echo $datosActivo['NUMERO_VACANTES']; ?> Vacantes disponibles</p>
                                    <p class="lugar"><?php echo $datosActivo['CIUDAD']; ?>, <?php echo $datosActivo['ESTADO']; ?></p>
                                </div>
                            </a>
                        </div> <!--Fin de la tarjeta-->
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No hay vacantes con más de 3 días de vencimiento.</p>
                <?php endif; ?>

            </div>

            <h3>Por Vencer</h3>
            <p>Publicaciones con menos de 3 dias para vencer</p>
            <div class="vacantes__cards">
                <?php if ($resultVencer->rowCount() > 0) : ?>
                    <?php while ($datosActivo = $resultVencer->fetch(PDO::FETCH_ASSOC)) : ?>
                        <div class="misVacantes__card">
                            <a href="/Empresa/vacanteDetalle.php?id=<?php echo $idUsuario ?>&idVacante=<?php echo $datosActivo['ID_VACANTE'];  ?>&idEmpresa=<?php echo $IdEmpresa;  ?>">
                                <div class="misVacantes__img">
                                    <img src="../Empresa/EmpresaIMG/<?php echo $datosUs['EMP_FOTOPERFIL']; ?>" alt="misVacantes">
                                </div>
                                <div class="misVacantes__datos">
                                    <h3 class="titulo"><?php echo $datosActivo['TITULO']; ?></h3>
                                    <a href="#" class="empresa"><?php echo $datosUs['EMP_EMPRESA']; ?></a>
                                    <p class="salario">$<?php echo $datosActivo['SALARIO']; ?> mensuales</p>
                                    <p class="cantidadVaca"><?php echo $datosActivo['NUMERO_VACANTES']; ?> Vacantes disponibles</p>
                                    <p class="lugar"><?php echo $datosActivo['CIUDAD']; ?>, <?php echo $datosActivo['ESTADO']; ?></p>
                                </div>
                            </a>
                        </div> <!--Fin de la tarjeta-->
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No hay vacantes con menos de 3 días de vencimiento.</p>
                <?php endif; ?>

            </div>
            <h3>Finalizadas</h3>
            <p>Publicaciones Vencidas</p>
            <div class="vacantes__cards">
                <?php if ($resultVencido->rowCount() > 0) : ?>
                    <?php while ($datosActivo = $resultVencido->fetch(PDO::FETCH_ASSOC)) : ?>
                        <div class="misVacantes__card">
                            <a href="/Empresa/vacanteDetalle.php?id=<?php echo $idUsuario ?>&idVacante=<?php echo $datosActivo['ID_VACANTE'];  ?>&idEmpresa=<?php echo $IdEmpresa;  ?>">
                                <div class="misVacantes__img">
                                    <img src="../Empresa/EmpresaIMG/<?php echo $datosUs['EMP_FOTOPERFIL']; ?>" alt="misVacantes">
                                </div>
                                <div class="misVacantes__datos">
                                    <h3 class="titulo"><?php echo $datosActivo['TITULO']; ?></h3>
                                    <a href="#" class="empresa"><?php echo $datosUs['EMP_EMPRESA']; ?></a>
                                    <p class="salario">$<?php echo $datosActivo['SALARIO']; ?> mensuales</p>
                                    <p class="cantidadVaca"><?php echo $datosActivo['NUMERO_VACANTES']; ?> Vacantes disponibles</p>
                                    <p class="lugar"><?php echo $datosActivo['CIUDAD']; ?>, <?php echo $datosActivo['ESTADO']; ?></p>
                                </div>
                            </a>
                        </div> <!--Fin de la tarjeta-->
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>No hay vacantes finalizadas.</p>
                <?php endif; ?>

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
                <option value="" selected disabled>--Selecciona--</option>
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
                <option value="" selected disabled>--Selecciona--</option>
                    <option value="permantente">Permantente</option>
                    <option value="indeterminado">Indeterminado</option>
                    <option value="porProyecto">Por proyecto</option>
                    <option value="porHonorarios">Por honorarios</option>
                </select>
            </div>

            <div class="form-group">
                <label for="horario">Horario:</label>
                <select id="horario" name="horario">
                <option value="" selected disabled>--Selecciona--</option>
                    <option value="tiempoCompleto">Tiempo completo</option>
                    <option value="medioTiempo">Medio tiempo</option>
                    <option value="finesSemana">Fines de semana</option>
                </select>
            </div>

            <div class="form-group">
                <label for="modoTrabajo">Modo de trabajo:</label>
                <select id="modoTrabajo" name="modoTrabajo">
                <option value="" selected disabled>--Selecciona--</option>
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

            <div class="form-group descripcionVacante">
                <label for="descripcion">Descripción:</label>
                <div class="editorCodigo">
                    <textarea id="descripcion" name="descripcion" class="editorCodigo__codigo"></textarea>

                </div>
            </div>
            <button class="boton__publicar">Publicar</button>
            <a  href="#" class="ventanaEmergente__cerrar" id="ventanaEmergente__cerrar">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 6L6 18M6 6l12 12"></path>
                </svg>
                                </a>
        </form>

    </div>
   
        </div>

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