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
$mensaje = $_GET['msj'] ?? null;

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
$puesto = $datos['PUESTO'];
$acerca = $datos['CAN_ACERCA'];
$genero = $datos['CAN_GENERO'];
$telefono = $datos['CAN_TELEFONO'];
$fechaNacimiento = $datos['CAN_FECHANACIMIENTO'];
$urlPortafolio = $datos['CAN_PORTAFOLIO'] ?? '';
//  var_dump($puesto) ;
// var_dump($nombre) ;
//  var_dump($acerca);
// Datos de la tabla Domicilio

$queryDomicilio = "SELECT * FROM domicilio WHERE id_usuario = $idUsuario";
$resultDom = $pdo->query($queryDomicilio);
$datosDom = $resultDom->fetch(PDO::FETCH_ASSOC);

$ciudad = $datosDom["CIUDAD"];
$estado = $datosDom["ESTADO"];
$postal = $datosDom["CODIGO_POSTAL"];


$queryRedes = "SELECT * FROM redessociales WHERE id_usuario = $idUsuario";
$resultRedes = $pdo->query($queryRedes);

$queryProyecto = "SELECT * FROM proyectos WHERE id_usuario = $idUsuario";
$resultProy = $pdo->query($queryProyecto);

// Datos Experiencia

$queryExp = "SELECT * FROM experiencia WHERE id_usuario = $idUsuario";
$resultExp = $pdo->query($queryExp);

$queryCer = "SELECT * FROM certificaciones WHERE id_usuario = $idUsuario";
$resultCer = $pdo->query($queryCer);
// var_dump($queryCer);
?>

<?php
 
 include '../include/templete/header.php';

?>

    <div class="contenedor__candidato ">
        <!-- Formularios -->

        <div class="contenedor__principal ">
            <div class="principal__header sombra">
                <div class="principal__header__portada">
                    <div class="portada__editar">
                        <a href="#" id="editarFoto"><img src="../src/img/lapiz.png" alt="Logo lapiz"></a>
                    </div>
                </div>
                <div class="principal__header__info">
                    <div class="principal__header__foto">
                        <img src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil">


                    </div>
                    <div class="principal__header__datos">
                        <h2><?php echo $nombre . " " . $apellido; ?></h2>
                        <p><?php echo $puesto; ?></p>
                        <p class="direccion" id="editarDatos"><?php echo $ciudad; ?>, <?php echo $estado; ?>. <a href="#">Informacion
                                de contacto</a>
                        </p>
                        <div class="principal__header__datos--redes">


                            <?php while ($datosRedes = $resultRedes->fetch(PDO::FETCH_ASSOC)) : ?>

                                <a href="<?php echo $datosRedes['RED_URI'] ?>" target="_blank" class="social"><img src="../build/img/<?php echo $datosRedes['RED_NOMBRE'] ?>.webp" alt="LogoRed"></a>


                            <?php endwhile; ?>

                            <a href="#" id="redesAgregar"><img src="../build/img/agregar.webp" alt="BTN agregar"></a>
                        </div>
                    </div>

                    <div class="principal__header__info--editar">
                        <a href="#"><img src="../src/img/ver.png" alt="logo ver"></a>
                        <a href="#" id="editarPersonal"><img src="../src/img/lapiz (1).png" alt="Logo lapiz"></a>
                    </div>
                </div>
            </div>
            <div class="principal__acerca sombra contenedor" id="acerca">
                <div class="principal__titulo">
                    <h3>Acerca de</h3>
                    <div class="principal__btns"> <a href="#" id="editarAcerca"><img src="../src/img/lapiz (1).png" alt="icono lapiz"></a></div>
                </div>
                <div class="acerca__texto" id="acercaContenedor">
                    <?php
                    if ($acerca == null) {
                        echo "<p> Aun no tienes una descripción </p>";
                    } else {
                        echo "<p>" . $acerca . "</p>";
                    }
                    ?>
                </div>
            </div>

            <div class="principal__educacion sombra contenedor">
                <div class="principal__titulo">
                    <h3>Educacion</h3>
                    <div class="principal__btns">
                        <a href="#" id="EducacionAgregar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                        <!-- <a href="#" "><img src="../src/img/lapiz (1).png" alt="icono lapiz "></a> -->
                    </div>

                </div>
                <div class="principal__educacion__contenedor">



                    <?php
                    $queryEducacion = "SELECT * FROM educacion WHERE id_usuario = $idUsuario";
                    $resultEdu = $pdo->query($queryEducacion);



                    if ($resultEdu->rowCount() === 0) {
                        echo '<p class="text-left">No hay información de tu educación disponible.</p>';
                    } else {
                        while ($datosEdu = $resultEdu->fetch(PDO::FETCH_ASSOC)) :
                            $idEducacion = $datosEdu['ID_EDUCACION'];
                            // echo $idEducacion;
                    ?>
                            <div class="principal__educacion__card">

                                <div class="principal__educacion__img">
                                    <img src="../build/img/banco.webp" alt="">
                                </div>
                                <a href="/Candidato/vistasModificar/ModificarEducacion.php?id=<?php echo $idUsuario ?>&idEducacion=<?php echo $idEducacion ?>" class="principal__educacion__informacion EducacionModificar">
                                    <p class="educacion__institucion"><?php echo $datosEdu['EDU_NOMBRE_INSTITUCION'] ?></p>
                                    <p class="educacion__carrera"><?php echo $datosEdu['EDU_TITULO'] ?></p>
                                    <p class="educacion__periodo"><?php echo date('F Y', strtotime($datosEdu['EDU_FECHA_INICIO'])) ?> - <?php echo date('F Y', strtotime($datosEdu['EDU_FECHA_FIN'])) ?></p>

                                </a>
                            </div>
                    <?php endwhile;
                    } ?>

                </div>

            </div>
            <div class="principal__experiencia contenedor sombra">
                <div class="principal__titulo">
                    <h3>Experiencia</h3>
                    <div class="principal__btns">

                        <a href="#" id="ExperienciaAgregar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                        <!-- <a href="#" id="ExperienciaModificar"><img src="../src/img/lapiz (1).png"
                                alt="icono lapiz "></a> -->
                    </div>

                </div>
                <div class="principal__experiencia__contenedor">
                    <?php
                    while ($datosExp = $resultExp->fetch(PDO::FETCH_ASSOC)) :
                        $idExperiencia = $datosExp['ID_EXPERIENCIA']

                    ?>
                        <a href="/Candidato/vistasModificar/ModificarExperiencia.php?id=<?php echo $idUsuario ?>&idExperiencia=<?php echo $idExperiencia ?>" class="principal__experiencia__card">
                            <p class="experiencia__titulo"><?php echo $datosExp['EXP_NOMBRE_EMPRESA'] ?></p>
                            <p class="experiencia__puesto"><?php echo $datosExp['EXP_CARGO'] ?></p>
                            <p class="experiencia__descripcion"><?php echo $datosExp['EXP_DESCRIPCION'] ?></p>
                            <p class="experience__duracion"><?php echo $datosExp['EXP_DURACION'] ?> años</p>
                        </a>
                    <?php
                    endwhile;

                    if ($resultExp->rowCount() === 0) {
                        echo "<p class='text-left'>No tenemos información de tu experiencia laboral</p>";
                    }
                    ?>

                </div>
            </div>
            <div class="principal__habilidad contenedor sombra">
                <div class="principal__titulo">
                    <h3>Habilidades</h3>
                    <div class="principal__btns">
                        <a href="#" id="insigniasEditar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                    </div>
                </div>
                <div class="principal__insignias__contenedor">
                    <?php
                    $sqlHabilidades = "SELECT * FROM habilidad WHERE id_usuario = $idUsuario";
                    $resultHab = $pdo->query($sqlHabilidades);

                    if ($resultHab->rowCount() > 0) {

                        $sqlHabilidades = "SELECT * FROM habilidad WHERE id_usuario = $idUsuario";
                        $resultHab = $pdo->query($sqlHabilidades);

                        while ($datoHab = $resultHab->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                            <div class="insignia gris">
                                <p><?= $datoHab['HAB_NOMBRE'] ?></p>
                                <a class="eliminar-habilidad" user-id="<?= $idUsuario ?>" data-id="<?= $datoHab['ID_HABILIDAD'] ?>">X</a>
                            </div>
                        <?php endwhile;
                    } else {
                        // Si no hay habilidades, mostrar leyenda
                        ?>
                        <p>No hay habilidades aún</p>
                    <?php
                    }
                    ?>
                </div>





            </div>
            <div class="principal__habilidad contenedor sombra">
                <div class="principal__titulo">
                    <h3>Insignias</h3>
                    <div class="principal__btns">
                        <a href="#" id="insigniasEditar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                    </div>
                </div>
                <div class="principal__insignias">
                    <div class="principal__insignias__titulo">
                        <p>Insignias</p>
                        <div class="descripcion__insignias">
                            <div class="descripcion__insignias">
                                <div class="desInsignia bronce"></div>
                                <p>Basico</p>
                            </div>
                            <div class="descripcion__insignias">
                                <div class="desInsignia plata"></div>
                                <p>Intermedio</p>
                            </div>
                            <div class="descripcion__insignias">
                                <div class="desInsignia oro"></div>
                                <p>Avanzado</p>
                            </div>

                        </div>
                    </div>
                    <div class="principal__insignias__contenedor">
                        <div class="insignia bronce">
                            <p>PHP</p>
                        </div>
                        <div class="insignia plata">
                            <p>JavaScript</p>
                        </div>
                        <div class="insignia oro">
                            <p>Java</p>
                        </div>
                        <div class="insignia plata">
                            <p>Photoshop</p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="princiapl__idiomas contenedor sombra idomas">
                <div class="principal__titulo">
                    <h3>Idiomas</h3>
                    <div class="principal__btns">
                        <a href="#" id="idiomasAgregar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                    </div>
                </div>

                <div class="idiomas__contenedor">
                    <table class="idiomas__tabla">
                        <tr class="idiomas__fila">
                            <th class="idiomas__celda"></th>
                            <th class="idiomas__celda"></th>
                            <th class="idiomas__celda"></th>
                        </tr>
                        <?php
                        $sqlIdioma = "SELECT * FROM idioma WHERE id_usuario = $idUsuario";
                        $resultIdioma = $pdo->query($sqlIdioma);
                        while ($datosIdioma = $resultIdioma->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <tr class="idiomas__fila">
                                <td class="idiomas__celda idiomas__celda--idioma"><?php echo $datosIdioma['IDIOMA_NOMBRE'] ?></td>
                                <td class="idiomas__celda idiomas__celda--nivel"><?php echo $datosIdioma['IDIOMA_NIVEL'] ?></td>
                                <td class="idiomas__celda idiomas__celda--eliminar">
                                    <a href="/Candidato/Model/eliminar.php?id=<?php echo $datosUs['ID_USUARIO']; ?>&idIdioma=<?php echo $datosIdioma['ID_IDIOMA'] ?>"><img src="../build/img/eliminar.png" alt="Eliminar"></a>
                                </td>
                            </tr>

                        <?php endwhile; ?>
                    </table>
                </div>

            </div>
            <div class="principal__proyectos contenedor sombra">
                <div class="principal__titulo">
                    <h3>Proyectos</h3>
                    <div class="principal__btns">
                        <a href="#" id="proyectoAgregar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                    </div>
                </div>
                <div class="principal__proyectos__contenedor">
                    <?php
                    if ($resultProy->rowCount() > 0) {
                        while ($datosProy = $resultProy->fetch(PDO::FETCH_ASSOC)) :
                            $idProyecto = $datosProy['ID_PROYECTO'];
                    ?>
                            <a href="/Candidato/vistasModificar/ModificarProyecto.php?id=<?php echo $idUsuario ?>&idProyecto=<?php echo $idProyecto ?>" class="principal__proyectos__card proyectoModificar">
                                <img src="../Candidato/CandidatoIMG/<?php echo $datosProy['PROY_FOTO'] ?>" alt="imagen proyecto" data-id-proyecto="<?php echo $datosProy['ID_PROYECTO'] ?>" id="proyectoImagen">
                                <p><?php echo $datosProy['PROY_NOMBRE'] ?></p>
                            </a>
                        <?php
                        endwhile;
                    } else {
                        // Mostrar mensaje si no hay proyectos aún
                        ?>
                        <p>No hay proyectos aún</p>
                    <?php } ?>
                </div>

            </div>
            <div class="principal__certificados contenedor sombra">
                <div class="principal__titulo">
                    <h3>Cursos o Certificaciones</h3>
                    <div class="principal__btns">
                        <a href="#" id="certificadosAgregar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>

                    </div>

                </div>
                <div class="principal__certificados__contenedor">
                    <?php if ($resultCer->rowCount() === 0) : ?>
                        <p>Aun no hay certificaciones o cursos</p>
                    <?php else : ?>
                        <?php while ($datosCer = $resultCer->fetch(PDO::FETCH_ASSOC)) : 
                            
                            $idCertificacion = $datosCer['ID_CERTIFICACION'];
                            ?>
                            <div class="principal__certificados__card">
                                <a href="/Candidato/vistasModificar/ModificarCertificacion.php?id=<?php echo $idUsuario ?>&idCertificacion=<?php echo $idCertificacion ?>">
                                    <p class="principal__certificados__titulo"><span>Nombre: </span><?php echo $datosCer['CER_NOMBRE'] ?></p>
                                    <p class="principal__certificados__texto"><span>Lugar: </span><?php echo $datosCer['CER_LUGAR'] ?></p>
                                    <p class="principal__certificados__texto"><span>Descripcion: </span><?php echo $datosCer['CER_DESCRIPCION'] ?></p>
                                    <p class="principal__certificados__fecha"><span>Fecha: </span><?php echo $datosCer['CER_FECHA'] ?></p>
                                    <p class="principal__certificados__fecha"><span>Horas: </span><?php echo $datosCer['CER_HORAS'] ?></p>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <div class="contenedor__aside">
            <div class="entrada__blog contenedor sombra">
                <h3 class="entrada__titulo">AgoraTalent Blog</h3>
                <div class="entrada__blog__cards">
                    <a href="#" class="entrada__blog__card">
                        <img src="../src/img/blog.jpg" alt="foto entrada">
                        <div class="card__info">
                            <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                            <P class="card__info__autor">Escrito el : <span>20/01/2020 </span>por: </span>Admin</span></p>
                            <P class="card__info__descripcion">Consejos para mejorar el tu CV </p>
                        </div>
                    </a>
                    <a href="#" class="entrada__blog__card">
                        <img src="../src/img/blog.jpg" alt="foto entrada">
                        <div class="card__info">
                            <p class="card__info__titulo">Mejora tu cv en AgoraTalent</p>
                            <P class="card__info__autor">Escrito el : <span>20/01/2020 </span>por: </span>Admin</span></p>
                            <P class="card__info__descripcion">Consejos para mejorar el tu CV</p>
                        </div>
                    </a>

                </div>
            </div>
            <div class="promo__test contenedor sombra">
                <div class="promo__test__img">

                </div>
                <div class="promo__test__contenido">
                    <p class="promo__test__titulo">Realiza nuestros Test de conocimientos</p>
                    <p class="promo__test__texto">Demuestra los conocimientos que tienes con nuestros test y gana una
                        insignia dependiendo de el nivel del test</p>
                    <a href="#" class="boton__verde btnTest ">Más información</a>
                </div>

            </div>
        </div>

    </div>
    <div class="emergente ocultar" id="personal">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="POST" action="/Candidato/Model/actualizar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Informacion Personal</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo nombre">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre" value="<?php echo $nombre ?>">
                    </div>
                    <div class="campo apellido">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Tus Apellidos" value="<?php echo $apellido ?>">
                    </div>
                    <div class="campo genero">
                        <label for="genero">Genero</label>
                        <select name="genero" id="genero">
                            <option selected value="<?php echo $genero ?>"> <?php echo $genero ?></option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="campo fechaNacimiento">
                        <label for="nacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="nacimiento" value="<?php echo $fechaNacimiento ?>">
                    </div>
                    <div class="campo postal">
                        <label for="postal">Codigo Postal</label>
                        <input type="text" name="postal" id="postal" placeholder="#00000" value="<?php echo $postal ?>">
                    </div>
                    <div class="campo estado">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado">
                            <option selected value="<?php echo $estado ?>"><?php echo $estado ?></option>
                        </select>
                    </div>
                    <div class="campo ciudad">
                        <label for="ciudad">Ciudad o Municipio</label>
                        <select name="ciudad" id="ciudad">
                            <option selected value="<?php echo $ciudad ?>"><?php echo $ciudad ?></option>
                        </select>
                    </div>
                </div>

                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirPersonal">Cancelar</a>
                </div>

            </form>
        </div>
    </div>

    <div class="emergente ocultar" id="fotos">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="post" enctype="multipart/form-data" action="/Candidato/Model/actualizar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Foto de perfil y Portada</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo">
                        <label for="fotoPerfil">Selecciona una Foto de Perfil</label>
                        <div class="input-wrapper">
                            <input class="inputFotoPerfil" type="file" id="fotoPerfil" onchange="mostrarNombreArchivo('fotoPerfil')" accept="image/*" name="fotoPerfil">
                            <label class="custom-file-upload" for="fotoPerfil">Seleccionar Archivo</label>
                        </div>
                    </div>

                    <div class="campo">
                        <label for="fotoPortada">Selecciona una Foto de Portada</label>
                        <div class="input-wrapper">
                            <input class="inputFotoPortada" type="file" id="fotoPortada" onchange="mostrarNombreArchivo('fotoPortada')" accept="image/*" name="fotoPortada">
                            <label class="custom-file-upload" for="fotoPortada">Seleccionar Archivo</label>
                        </div>
                    </div>
                    <div class="previewPerfil">
                        <div class="previewPerfil__contenedor">
                            <div class="previewPerfil__portada principal__header__portada"></div>
                            <div class="previewPerfil__informacion">
                                <div class="previewPerfil__foto principal__header__perfil"></div>
                                <div class="previewPerfil__nombre">
                                    <h3><?php echo $nombre . " " . $apellido; ?></h3>
                                </div>
                                <div class="previewPerfil__ciudad">
                                    <p><span><?php echo $ciudad ?>, </span><?php echo $estado; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" id="salirFoto" class="boton__blanco">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="formularioContacto">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="POST" action="/Candidato/Model/actualizar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Datos de Contacto</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo telefono">
                        <label for="telefono">Número de Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Tu número de teléfono" value="<?php echo $telefono ?>">
                    </div>
                    <div class="campo email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Tu número de teléfono" value="<?php echo $email ?>">
                    </div>
                    <div class="campo portafolio">
                        <label for="portafolio">Link de tu portafolio</label>
                        <input type="text" name="urlPortafolio" id="urlPortafolio" placeholder="link a tu portafolio" value="<?php echo $urlPortafolio ?>">
                    </div>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirDatos">Cancelar</a>
                </div>
            </form>

        </div>
    </div>
    <div class="emergente ocultar" id="formularioRedes">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="POST" action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Redes Sociales</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo redes">


                        <div class="campo">
                            <?php

                            $queryRedes2 = "SELECT * FROM REDESSOCIALES WHERE id_usuario = $idUsuario ";
                            $resultRed = $pdo->query($queryRedes2);

                            ?>
                            <?php while ($datosRed = $resultRed->fetch(PDO::FETCH_ASSOC)) : ?>
                                <label for="red1">Red social</label>
                                <input type="text" name=" id=" red1" value="<?php echo $datosRed['RED_NOMBRE']; ?>">
                                <label for="redLink1">URL</label>
                                <input type="text" name="" id="redLink1" value="<?php echo $datosRed['RED_URI']; ?>">
                                <a href="../Candidato/Model/eliminar.php?id= <?php echo $datosUs['ID_USUARIO']; ?>&idRed=<?php echo $datosRed['ID_RED']; ?>" class="boton__rojo" id="EliminarRed">Eliminar Red</a>
                            <?php endwhile;  ?>


                        </div>
                        <fieldset>
                            <legend style="font-weight: bold;">Agregar Redes Sociales</legend>
                            <div class="redSocial">
                                <div class="campo">
                                    <label for="red1">Elige una red social</label>
                                    <select name="red[]" id="red1">
                                        <option value="" selected disabled>--Seleccionar--</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="twitter">Twitter</option>
                                        <option value="instagram">Instagram</option>
                                        <option value="linkedIn">LinkedIn</option>
                                        <option value="gitHub">GitHub</option>
                                        <option value="youtube">YouTube</option>
                                        <option value="tikTok">TikTok</option>
                                        <option value="pinterest">Pinterest</option>
                                    </select>
                                </div>
                                <div class="campo">
                                    <label for="redLink1">URL</label>
                                    <input type="text" name="redLink[]" id="redLink1" placeholder="URL">
                                </div>
                            </div>
                            <a href="#" class="boton negro" id="agregarRedSocial">Agregar otra red social</a>
                        </fieldset>
                    </div>
                    <div class="emergente__formulario__btns">
                        <input type="submit" class="boton__verde" value="Guardar">
                        <a href="#" class="boton__blanco" id="salirRedes">Cancelar</a>
                    </div>
            </form>

        </div>
    </div>
    </div>

    <div class="emergente ocultar" id="formularioAcerca">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="post" action="/Candidato/Model/actualizar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Acerca de.</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo nombre">
                        <label for="acerca">Acerca de</label>
                        <textarea name="acerca" id="acerca" cols="30" rows="10"><?php echo $acerca ?></textarea>
                    </div>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirAcerca">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="agregarEducacion">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="Post" action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Educacion.</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo institucion">
                        <label for="institucion">Institución Educativa</label>
                        <input type="text" name="institucion" id="institucion" placeholder="Nombre de tu escuela">
                    </div>
                    <div class="campo fechaInicio">
                        <label for="fechaInicio">Fecha de Inicio</label>
                        <input type="date" name="fechaInicio" id="fechaInicio">
                    </div>
                    <div class="campo fechaFin">
                        <label for="fechaFin">Fecha de Fin</label>
                        <input type="date" name="fechaFin" id="fechaFin">
                    </div>
                    <div class="campo titulo">
                        <label for="titulo">Título / Certificado</label>
                        <input type="text" name="titulo" id="titulo" placeholder="Certificado o título obtenido">
                    </div>
                    <div class="campo nivel__estudios">
                        <label for="nivel__estudios">Nivel</label>
                        <select name="nivel__estudios" id="nivel__estudios">
                            <option value="Sin estudios">Sin estudios</option>
                            <option value="Educacion primaria">Educación Primaria</option>
                            <option value="Educacion secundaria">Educación Secundaria</option>
                            <option value="bachillerato">Bachillerato</option>
                            <option value="Educacion Universitaria">Educación Universitaria</option>
                            <option value="posgrado">Posgrado</option>
                        </select>

                    </div>


                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirAgregarEducacion">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <div class="emergente ocultar" id="agregarExperiencia">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="POST" action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega una nueva experiencia laboral</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo empresa">
                        <label for="empresa">Empresa</label>
                        <input type="text" name="empresa" id="empresa" placeholder="Empresa actual o anterior">
                    </div>
                    <div class="campo descripcion">
                        <label for="descripcion">Descripción de actividades</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5"></textarea>
                    </div>
                    <div class="campo cargo">
                        <label for="cargo">Cargo Desempeñado</label>
                        <input type="text" name="cargo" id="cargo" placeholder="Cargo desempeñado">
                    </div>
                    <div class="campo duracion">
                        <label for="duracion">Duración</label>
                        <select name="duracion" id="duracion">
                            <option disabled selected>--Selecciona--</option>
                            <option value="actual">Actual</option>
                            <option value="menos1">Menos de 1 año</option>
                            <option value="1a3">1 a 3 años</option>
                            <option value="3a5">3 a 5 años</option>
                            <option value="5a10">5 a 10 años</option>
                            <option value="mas10">Más de 10 años</option>
                        </select>
                    </div>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirExperienciaAgregar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <div class="emergente ocultar" id="agregarProyecto">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="POST" action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>" enctype="multipart/form-data">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega un proyecto nuevo.</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo nombre">
                        <label for="nombreProyecto">Nombre del proyecto</label>
                        <input type="text" name="nombreProyecto" id="nombreProyecto" placeholder="Tu Nombre">
                    </div>
                    <div class="campo descripcion">
                        <label for="descripcionProyecto">Descripción del Proyecto</label>
                        <textarea name="descripcionProyecto" id="descripcionProyecto" cols="30" rows="5"></textarea>
                    </div>
                    <div class="campo tecnologias">
                        <label for="tecnologias">Tecnologias Utilizadas</label>
                        <input type="text" name="tecnologias" id="tecnologias" placeholder="html, css, JavaScript ...">
                    </div>
                    <div class="campo urlProyecto">
                        <label for="nombre">Url de tu proyecto</label>
                        <input type="text" name="urlProyecto" id="nombre" placeholder="www.tu_proyecto.com">
                    </div>
                    <div class="campo foto">
                        <div class="input-wrapper">
                            <input class="inputFotoPortada" type="file" id="fotoProyecto" accept="image/*" name="fotoProyecto" onchange="mostrarNombreArchivo('fotoProyecto')">
                            <label class="custom-file-upload" for="fotoProyecto">Foto de tu proyecto</label>

                        </div>
                    </div>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirProyectoAgregar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>



    <div class="emergente ocultar" id="agregarCertificacion">
        <div class="emergente__formulario">
            <form action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>" class="emergente__formulario__contenido" method="POST">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega algún curso o certificado</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo nombre">
                        <label for="nombreCertificado">Nombre de la certificacion y/o curso.</label>
                        <input type="text" name="nombreCertificado" id="nombreCertificado" placeholder="Nombre">
                    </div>
                    <div class="campo descripcion">
                        <label for="descripcionCertificado">Descripción de la certificado y/o curso</label>
                        <textarea name="descripcionCertificado" id="descripcionCertificado" cols="30" rows="5"></textarea>
                    </div>
                    <div class="campo lugar">
                        <label for="lugar">Tecnologias Utilizadas</label>
                        <input type="text" name="lugar" id="lugar" placeholder="Udemy, Platzi... etc.">
                    </div>
                    <div class="campo fechaTermino">
                        <label for="fechaTermino">Fecha termino</label>
                        <input type="date" name="fechaTermino" id="fechaTermino">
                    </div>
                    <div class=" campo horas">
                        <label for="horas">Cuantas horas duro la certificacion y/o curso</label>
                        <input type="number" name="horas" id="horas">
                    </div>

                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salircertificadosAgregar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    
    <div class="emergente ocultar" id="agregarHabilidades">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="post" action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega tus habilidades</h3>
                </div>

                <div class="emergente__formulario__campos">
                    <div class="campo skills">
                        <label for="skills">Habilidades o Skills</label>
                        <input type="text" name="skills" id="skills" placeholder="Ej. PHP, Java, Photoshop..." onkeydown="agregarEtiqueta(event)">
                    </div>
                    <div id="etiquetasContainer"></div>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirAgregarHabilidades">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="agregarIdiomas">
        <div class="emergente__formulario">
            <form class="emergente__formulario__contenido" method="post" action="/Candidato/Model/insertar.php?id=<?php echo $idUsuario ?>">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega un Idioma</h3>
                </div>

                <div class="emergente__formulario__campos">
                    <div class="campo idiomas">
                        <label for="idiomas">Idiomas</label>
                        <input type="text" name="idiomas[]" id="idiomas" placeholder="Que idiomas dominas">
                    </div>
                    <div class="campo nivel">
                        <label for="nivel">Nivel</label>
                        <select name="nivel[]" id="nivel">
                            <option disabled selected> -- selecciona el nivel --</option>
                            <option value="basico">Básico</option>
                            <option value="intermedio">Intermedio</option>
                            <option value="avanzado">Avanzado</option>
                        </select>
                    </div>
                    <div id="nuevos-idiomas"></div>
                    <button type="button" class="agregar boton__negro" onclick="agregarIdioma()">Agregar idioma</button>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirIdioma">Cancelar</a>
                </div>
            </form>
        </div>
    </div>


    <?php

    if ($mensaje == 1) {
        echo "<div class='tarjetas'>";
        echo "<div class='tarjeta sombra'>";
        echo    '<img src="../src/img/check2.png">';
        echo    '<p>Guardado</p>';
        echo '</div>';
        echo  '</div>  ';
    } else if ($mensaje == 2) {
        echo "<div class='tarjetas'>";
        echo "<div class='tarjeta sombra'>";
        echo    '<img src="../src/img/check2.png">';
        echo    '<p>Creado</p>';
        echo '</div>';
        echo  '</div>  ';
    } else if ($mensaje == 3) {
        echo "<div class='tarjetas'>";
        echo "<div class='tarjeta sombra'>";
        echo    '<img src="../src/img/eliminar.png">';
        echo    '<p>Eliminado</p>';
        echo '</div>';
        echo  '</div>  ';
    }

    ?>




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
                    <a href="CandidatoPrincipal.php" class="enlace">Inicio</a>
                    <a href="candidatoEmpleos.php" class="enlace">Empleos</a>
                    <a href="candidatoEvaluacion.php" class="enlace">Evaluaciones</a>
                    <a href="candidatoChat.php" class="enlace">Chats</a>
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
    <script src="../src/js/app.js"></script>
    <script src="../src/js/perfilCandidato.js"></script>
    <script src="../src/js/validacionesFormularios.js"></script>
    <script src="../src/js/headerCandidato.js"></script>
    <script src="../src/js/formularioCandidato.js"></script>
    <script src="../src/js/formulariosEmergentes.js"></script>
    <script src="../src/js/mensajeFlotante.js"></script>


</body>

</html>