<?php

use LDAP\Result;

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
$idCandidato = $_GET['idCandidato'] ?? null;

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

$sql2 = "SELECT V.ID_VACANTE, V.TITULO, 
E.ID_EMPRESA, E.EMP_EMPRESA, E.EMP_FOTOPERFIL,
P.ESTADO AS ESTADO_POSTULACION
FROM vacante V
JOIN empresa E ON V.ID_EMPRESA = E.ID_EMPRESA
JOIN empresa_vacante EV ON V.ID_VACANTE = EV.ID_VACANTE
JOIN postulacion P ON V.ID_VACANTE = P.ID_VACANTE
WHERE P.ID_CANDIDATO = $idCandidato
ORDER BY EV.FECHA_CREACION_VACANTE DESC;
";
$result2 = $pdo->query($sql2);

#consulta para traer el id de postulacion segun sea el id de candidato y de empresa y de vacante


// var_dump($datos2);



?>

<?php
 
 include '../include/templete/header.php';

?>
    <main class="empleos">
        <div class="empleos__contenedor">
            <div class="empleos__izquierda">
                <div class="empleos__izquierda__secciones secciones">
                <a href="candidatoEmpleos.php?id=<?php echo $idUsuario ?>" class="secciones__campo">
                        <img src="../build/img/portafolio.webp">
                        <p>Buscar Empleo</p>
                    </a>
                    <a href="PostuladosEmpleos.php?id=<?php echo $idUsuario?>&idCandidato=<?php echo $idCandidato ?>" class="secciones__campo">
                        <img src="../build/img/guardar-instagram.webp">
                        <p>Postulados</p>
                    </a>
                    <a href="recomendadosEmpleos.html" class="secciones__campo">
                        <img src="../build/img/recomendar.webp">
                        <p>Recomedados</p>
                    </a>
                </div>

            </div>
            <div class="empleos__central sombra postulados__central">

                <div class="empleos__central__postulados postulados">

                    <?php while ($datos2 = $result2->fetch(PDO::FETCH_ASSOC)) :
                        $vacante = $datos2['TITULO'];
                        $empresa = $datos2['EMP_EMPRESA'];
                        $estado  = $datos2['ESTADO_POSTULACION'];
                        $FotoPerfil = $datos2['EMP_FOTOPERFIL'];
                        $idEmpresa = $datos2['ID_EMPRESA'];
                        
                        
                        // var_dump($estado);
                        ?>
                    <?php 
                    $urlEtapa;
                    if ($estado === 'POSTULADO') {
                        $urlEtapa = "/Candidato/vistasEtapas/EtapaPostulacion.php?id=$idUsuario&idCandidato=$idCandidato";
                    }elseif($estado === 'REVICION'){
                        $urlEtapa = "/Candidato/vistasEtapas/EtapaRevision.php?id=$idUsuario&idCandidato=$idCandidato";
                    }elseif($estado === 'PRUEBA'){
                        $urlEtapa = "/Candidato/vistasEtapas/EtapaPruebas.php?id=$idUsuario&idCandidato=$idCandidato&idEmpresa=$idEmpresa";
                    }
                    ?>
                        <a href="<?php echo $urlEtapa ?>" class="postulados__card" data-id="1">
                            <div class="postulados__card__detalles">
                                <div class="postulados__texto">
                                    <h3 class="titulo"><?php echo $vacante ?> </h3>
                                    <p class="empresa"><?php echo $empresa ?></p>
                                    <p class="procesoCan"><?php echo $estado ?></p>
                                </div>
                                <div class="postulados__flujo">
                                    <div class="postulados__circulo <?php echo $estado === 'POSTULADO' ? 'activo' : ''; ?>">
                                        <span>1</span>
                                    </div>
                                    <div class="postulados__circulo <?php echo $estado === 'REVICION' ? 'activo' : ''; ?>">
                                        <span>2</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'PRUEBA' ? 'activo' : ''; ?>">
                                        <span>3</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'ENTREVISTA' ? 'activo' : ''; ?>">
                                        <span>4</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'DOCUMENTOS' ? 'activo' : ''; ?>">
                                        <span>5</span>
                                    </div>

                                    <div class="postulados__circulo <?php echo $estado === 'CONTRATADO' ? 'activo' : ''; ?>">
                                        <span>6</span>
                                    </div>

                                </div>

                            </div>
                            <div class="postulados__card__img">
                                <img src="../Empresa/EmpresaIMG/<?php echo $FotoPerfil ?>">
                            </div>
                        </a> <!--Fin de card-->
                    <?php endwhile; ?>



                </div>
            </div>
            <div class="empleos__derecha">
                <div class="entrada__blog contenedor sombra">
                    <h3 class="entrada__titulo">AgoraTalent Blog</h3>
                    <div class="entrada__blog__cards">
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>
                        <a href="#" class="entrada__blog__card">
                            <img src="../src/img/blog.jpg" alt="foto entrada">
                            <div class="card__info">
                                <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                                <P class="card__info__autor">Autor - fecha </p>
                            </div>
                        </a>

                    </div>
                </div>

                <div class="promo__test contenedor sombra">
                    <div class="promo__test__img">

                    </div>
                    <div class="promo__test__contenido">
                        <p class="promo__test__titulo">Realiza nuestros Test de conocimientos</p>
                        <p class="promo__test__texto">Demuestra los conocimientos que tienes con nuestros test y gana
                            una
                            insignia dependiendo de el nivel del test</p>
                        <a href="#" class="boton__verde btnTest ">Más información</a>
                    </div>

                </div>
            </div>
        </div>

    </main>



    <footer class="footer footer__candidato">
        <div class="footer__principal">
            <div class="footer__logo">
                <a href="/">AgoraTalent</a>
                <p>Simplificando la búsqueda y seleccion de talento</p>
            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Contenido</p>
                    <a href="CandidatoPrincipal.html" class="enlace">Inicio</a>
                    <a href="candidatoEmpleos.html" class="enlace">Empleos</a>
                    <a href="candidatoEvaluacion.html" class="enlace">Evaluaciones</a>
                    <a href="candidatoChat.html" class="enlace">Chats</a>
                    <a href="#" class="enlace">Cerrar Sesión</a>
                </nav>
            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Ayuda</p>
                    <a href="#" class="enlace">Acerca de</a>
                    <a href="#" class="enlace">Privacidad</a>
                    <a href="#" class="enlace">Condiciones</a>
                    <a href="#" class="enlace">FAQs</a>
                </nav>

            </div>
            <hr>
            <div class="footer__seccion">
                <nav>
                    <p>Redes sociales</p>
                    <div class="footer__logos">
                        <a href="#" class="logos">
                            <img src="/build/img/facebook-color.webp" alt="Logo de Facebook">
                        </a>
                        <a href="#" class="logos">
                            <img src="/build/img/twetter.webp" alt="Logo Tweeter">
                        </a>
                        <a href="#" class="logos">
                            <img src="/build/img/youtube-color.png" alt="Logo Youtube">
                        </a>
                    </div>
                    <a href="#" class="enlace">Blog</a>
                    <a href="#" class="enlace">Contacto</a>
                </nav>

            </div>
            <hr>
            <div class="footer__descarga">
                <div class="footerApp btn__App ">
                    <div class="btn__logo">
                        <img src="/build/img/google-play.webp" alt="Logo de google play">
                    </div>
                    <div class="btn__texto">
                        <p><span>Descarga en</span></p>
                        <p>Google Play</p>
                    </div>
                </div>
                <div class="btn__App footerApp">
                    <div class="btn__logo">
                        <img src="/build/img/logo-apple.webp" alt="Logo de google play">
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

    <script src="../src/js/headerCandidato.js"></script>
    <script src="../src/js/formularioCandidato.js"></script>

    <script>
        function handleFileChange(event) {
            const fileInput = event.target;
            const fileName = fileInput.files[0].name;

            const label = fileInput.previousElementSibling;
            label.textContent = fileName;
        }
    </script>

</body>

</html>