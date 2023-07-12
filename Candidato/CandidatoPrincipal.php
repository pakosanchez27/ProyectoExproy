<?php

require '../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$mensaje = $_GET['msj'] ?? null;

// Agregar 

//Educacion

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

$institucion = $_POST['institucion'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$titulo = $_POST['titulo'];

$sqlEducacion = "INSERT INTO educacion (edu_nombre_institucion, edu_fecha_inicio, edu_fecha_fin, edu_titulo, edu_nivel, id_usuario) VALUES ('$institucion', '$fechaInicio', '$fechaFin', '$titulo', '$nivelEstudios', '$idUsuario')";
//  echo $sqlEducacion;
  $educacion = $pdo->query($sqlEducacion);

  if ($educacion) {
    header("Location: CandidatoPrincipal.php?id=$idUsuario&mensaje=2"  );
  }

}

// Experiencia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $empresa = $_POST['empresa'];
    $descripcion = $_POST['descripcion'];
    $cargo = $_POST['cargo'];
    $duracion = $_POST['duracion'];
    
    $sqlExperiencia = "INSERT INTO experiencia (exp_nombre_empresa, exp_descripcion, exp_cargo, exp_duracion, id_usuario) VALUES ('$empresa', '$descripcion', '$cargo', '$duracion', '$idUsuario')";
    // echo $sqlExperiencia;
    $experiencia = $pdo->query($sqlExperiencia);
    
      if ($experiencia) {
        header("Location: CandidatoPrincipal.php?id=$idUsuario&mensaje=2"  );
      }
    
    }
// Habilidades   

// Updates

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Acerca de
    if (isset($_POST['acerca'])) {
        $acercaUpdate = $_POST['acerca'];
        $upadateAcerca = "UPDATE candidato SET can_acerca = '$acercaUpdate' WHERE id_usuario = '$idUsuario'";
      
        $result = $pdo->query($upadateAcerca);
        
        if ($result) {
            header("Location: CandidatoPrincipal.php?id=$idUsuario&msj=1");
            exit();
        }
    }
    
    // Datos personales 
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['genero']) && isset($_POST['telefono']) && isset($_POST['fechaNacimiento']) && isset($_POST['postal']) && isset($_POST['estado']) && isset($_POST['ciudad'])) {
        $nombreUpdate = $_POST['nombre'];
        echo $nombreUpdate;
        $apellidoUpdate = $_POST['apellido'];
        $generoUpdate = $_POST['genero'];
        $telefonoUpdate = $_POST['telefono'];
        $fechaNacimientoUpdate = $_POST['fechaNacimiento'];
        $postalUpdate = $_POST['postal'];
        $estadoUpdate = $_POST['estado'];
        $ciudadUpdate = $_POST['ciudad'];
       
       
        
        $updatePersonal = "UPDATE candidato SET can_nombre = '$nombreUpdate', can_apellido = '$apellidoUpdate', can_genero = '$generoUpdate', can_telefono = '$telefonoUpdate', can_fechaNacimiento = '$fechaNacimientoUpdate' WHERE id_usuario = '$idUsuario'";
         echo $updatePersonal;
        $updateDomicilio = "UPDATE domicilio SET codigo_postal = '$postalUpdate', estado = '$estadoUpdate', ciudad = '$ciudadUpdate' WHERE id_usuario = '$idUsuario'";

         $result1 = $pdo->query($updatePersonal);
         $result2 = $pdo->query($updateDomicilio);

     if ($result1 && $result2) {
             header("Location: CandidatoPrincipal.php?id=$idUsuario&msj=1");
             exit();
         }
     }
}





// Datos de la tabla candidato

$sql = "SELECT * FROM candidato WHERE id_usuario = '$idUsuario'";

$result = $pdo->query($sql);
$datos = $result->fetch(PDO::FETCH_ASSOC);

$nombre = $datos["can_nombre"];
$apellido = $datos["can_apellido"];
$FotoPerfil = $datos["can_fotoPerfil"];
$FotoPortada = $datos["can_fotoPortada"];
$puesto = $datos["can_puesto"];
$acerca = $datos["can_acerca"];
$genero = $datos["can_genero"];
$telefono = $datos["can_telefono"];
$fechaNacimiento = $datos["can_fechaNacimiento"];
 var_dump($puesto) ;


// Datos de la tabla Domicilio

$queryDomicilio = "SELECT * FROM domicilio WHERE id_usuario = '$idUsuario'";
$resultDom = $pdo->query($queryDomicilio);
$datosDom = $resultDom->fetch(PDO::FETCH_ASSOC);

$ciudad = $datosDom["ciudad"];
$estado = $datosDom["estado"];
$postal = $datosDom["codigo_postal"];
// var_dump($datosDom); 
// echo $FotoPerfil;


// Datos Educacion 

$queryEducacion = "SELECT * FROM educacion WHERE id_usuario = '$idUsuario'";
$resultEdu = $pdo->query($queryEducacion);

// Datos Experiencia

$queryExp = "SELECT * FROM experiencia WHERE id_usuario = '$idUsuario'";
$resultExp = $pdo->query($queryExp);







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../build/css/app.css">
    <title>Perfil Candiadto</title>
</head>

<style>
    .principal__header__portada {
        /* border: #187e44 1px solid; */
        border-top-left-radius: 0rem;
        border-top-right-radius: 0rem;
        background-image: url('../Candidato/CandidatoIMG/<?php echo $FotoPortada; ?>');
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
                        <a href="candidatoEmpleos.html">
                            <img src="../src/img/portafolio.png" alt="Logo portafolio">
                            <p>Empleo</p>
                        </a>
    
                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.html"> <img src="../src/img/evaluacion.png" alt="Logo portafolio">
                            <p>Evaluacion</p>
                        </a>
    
                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.html">
                            <img src="../src/img/comentario.png" alt="Logo portafolio">
                            <p>Chats</p>
                        </a>
    
                    </div>
                    <div class="navegacion__Perfil">
                        <a href="#" id="perfilDesktop"><img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>
                   
                </nav>
            </div>
            <div class="header__mobile " id="header__mobile">
                <nav class="candidato__navegacion__mobile">
                    <div class="navegacion__opc">
                        <a href="candidatoEmpleos.html">
                            <img src="../build/img/portafolio.webp" alt="Logo portafolio">
                        </a>
    
                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoEvaluacion.html"> <img src="../src/img/evaluacion.png" alt="Logo portafolio">
                        </a>
    
                    </div>
                    <div class="navegacion__opc">
                        <a href="candidatoChat.html">
                            <img src="../src/img/comentario.png" alt="Logo portafolio">
    
                        </a>
    
                    </div>
                    <div class="navegacion__Perfil">
                        <a href="#" id="perfilMobile"><img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil"></a>
                    </div>
                </nav>
            </div>
        </div>
        <div class="perfilDesplegable sombra ocultar" id="perfilDesplegable__mobile">
            <div class="perfilDesplegable__perfil">
                <img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?>" alt="Foto de perfil">
                <h3><?php echo $nombre; ?>/h3>
            </div>
            
            <a href="CandidatoPrincipal.html" class="boton__verde">Ver perfil</a>
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
            <img class="candiatoPerfil" src="../Candidato/CandidatoIMG/<?php echo $FotoPerfil; ?> "alt="Foto de perfil">
            <h3><?php echo $nombre ." ". $apellido; ?></h3>
        </div>
        
        <a href="CandidatoPrincipal.html" class="boton__verde">Ver perfil</a>
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
                        <h2><?php echo $nombre ." ". $apellido; ?></h2>
                        <p><?php echo $puesto; ?></p>
                        <p class="direccion" id="editarDatos"><?php echo $ciudad; ?>, <?php echo $estado; ?>. <a href="#">Informacion
                                de contacto</a>
                        </p>
                        <div class="principal__header__datos--redes">
                            <a href="#" class="social"><img src="../src/img/facebook-color.png" alt="logoFacebook"></a>
                            <a href="#" class="social"><img src="../src/img/twetter.png" alt="logo twetter"></a>
                            <a href="#" class="social"><img src="../src/img/instagram.png" alt="logo instagram"></a>
                            <a href="#" class="social"><img src="../src/img/github.png" alt="logo github"></a>
                            <a href="#" class="social"><img src="../src/img/linkedin.png" alt="logo linkedin"></a>
                            <a href="#" class="social"><img src="../src/img/youtube-color.png" alt="loo youtube"></a>
                            <a href="#" class="social"><img src="../src/img/tik-tok.png" alt="logo tik-tok"></a>
                            <a href="#" class="social"><img src="../src/img/pinterest.png" alt="logo pinterest"></a>
                            <a href="#" class="social"></a>
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
                    <div class="principal__btns"> <a href="#" id="editarAcerca"><img src="../src/img/lapiz (1).png"
                                alt="icono lapiz"></a></div>

                </div>
                <div class="acerca__texto" id="acercaContenedor">
                   <?php 
                    if($acerca == null){
                        echo "<p> Aun no tienes una descripcion </p>";
                    }else{
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
                <div class="acerca__texto" id="acercaContenedor">
  
                </div>
                <?php while($datosEdu = $resultEdu->fetch(PDO::FETCH_ASSOC)): ?>
                    <div class="principal__educacion__card">
                        
                        <div class="principal__educacion__img">
                            <img src="../build/img/banco.webp" alt="">
                        </div>
                        <a href="#" id="EducacionModificar" class="principal__educacion__informacion EducacionModificar" data = "<?php echo $datosEdu['id_educacion'] ?>">
                            <p class="educacion__institucion"><?php echo $datosEdu['edu_nombre_institucion'] ?></p>
                            <p class="educacion__carrera"><?php echo $datosEdu['edu_titulo'] ?></p>
                            <p class="educacion__periodo"><?php echo date('F Y', strtotime($datosEdu['edu_fecha_inicio'])) ?> - <?php echo date('F Y', strtotime($datosEdu['edu_fecha_fin'])) ?></p>

                        </a>

                        
                    </div>
                    <?php endwhile; 
                    if( empty($datosEdu)){
                        echo "<p class='text-left'> Aun no tienes informacion de tu educación</p>";
                    }?>
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
                <?php while($datosExp = $resultExp->fetch(PDO::FETCH_ASSOC)): ?>
                    <div  id="ExperienciaModificar" class="principal__experiencia__card">
                    
                        <p class="experiencia__titulo"><?php echo $datosExp['exp_nombre_empresa'] ?></p>
                        <p class="experiencia__puesto"><?php echo $datosExp['exp_cargo'] ?></p>
                        <p class="experiencia__descripcion"><?php echo $datosExp['exp_descripcion'] ?></p>
                        <p class="experience__duracion"><?php echo $datosExp['exp_duracion'] ?> años</p>
                       
                    </div>
                    <?php endwhile; 
                     if( empty($datosExp)){
                        echo "<p class='text-left'> Aun no tienes informacion de tu Experiencia</p>";
                    } ?>
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
                        <div class="insignia gris">
                            <p>PHP</p>
                        </div>
                        <div class="insignia gris">
                            <p>JavaScript</p>
                        </div>
                        <div class="insignia gris">
                            <p>Java</p>
                        </div>
                        <div class="insignia gris">
                            <p>Photoshop</p>
                        </div>

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
                        <a href="#" id="idiomasEditar"><img src="../src/img/anadir.png" alt="icono lapiz "></a>
                    </div>
                </div>

                <div class="idiomas__contenedor">
                    <ul>
                        <li>Ingles <span>Intermedio</span></li>
                    </ul>
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
                    
                    <a href="#" class="principal__proyectos__card">
                        <img src="../src/img/proyecto1.png" alt="imagen proyecto">
                        <p>Proyecto 1</p>
                    </a>
                    <a href="#" class="principal__proyectos__card">
                        <img src="../src/img/proyecto2.png" alt="imagen proyecto">
                        <p>Proyecto 2</p>
                    </a>
                    <a href="#" class="principal__proyectos__card">
                        <img src="../src/img/proyecto2.png" alt="imagen proyecto">
                        <p>Proyecto 3</p>
                    </a>
                    <a href="#" class="principal__proyectos__card">
                        <img src="../src/img/proyecto2.png" alt="imagen proyecto">
                        <p>Proyecto 4</p>
                    </a>
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
                    <div class="principal__certificados__card">
                        <p class="principal__certificados__titulo"><span>Nombre: </span>CSS La guia Completa</p>
                        <p class="principal__certificados__texto"><span>Lugar: </span> Udemy</p>
                        <p class="principal__certificados__texto"><span>Descripcion: </span> Curso donde aprendí
                            tecnologías como HTML, CSS, JavaScript, SASS etc. </p>
                        <p class="principal__certificados__fecha"><span>Fecha: </span> 16 agosto 2022</p>
                        <p class="principal__certificados__fecha"><span>Horas: </span>37 hrs</p>
                        <a href="#" class="principal___certificado__detalles">Ver más</a>
                        <hr>
                    </div>
                    <div class="principal__certificados__card">
                        <p class="principal__certificados__titulo"><span>Nombre: </span>CSS La guia Completa</p>
                        <p class="principal__certificados__texto"><span>Lugar: </span> Udemy</p>
                        <p class="principal__certificados__texto"><span>Descripcion: </span> Curso donde aprendí
                            tecnologías como HTML, CSS, JavaScript, SASS etc. </p>
                        <p class="principal__certificados__fecha"><span>Fecha: </span> 16 agosto 2022</p>
                        <p class="principal__certificados__fecha"><span>Horas: </span>37 hrs</p>
                        <a href="#" class="principal___certificado__detalles">Ver más</a>
                        <hr>
                    </div>
                    <div class="principal__certificados__card">
                        <p class="principal__certificados__titulo"><span>Nombre: </span>CSS La guia Completa</p>
                        <p class="principal__certificados__texto"><span>Lugar: </span> Udemy</p>
                        <p class="principal__certificados__texto"><span>Descripcion: </span> Curso donde aprendí
                            tecnologías como HTML, CSS, JavaScript, SASS etc. </p>
                        <p class="principal__certificados__fecha"><span>Fecha: </span> 16 agosto 2022</p>
                        <p class="principal__certificados__fecha"><span>Horas: </span>37 hrs</p>
                        <a href="#" class="principal___certificado__detalles">Ver más</a>
                        <hr>
                    </div>
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
                    <p class="promo__test__texto">Demuestra los conocimientos que tienes con nuestros test y gana una
                        insignia dependiendo de el nivel del test</p>
                    <a href="#" class="boton__verde btnTest ">Más información</a>
                </div>

            </div>
        </div>

    </div>
    <div class="emergente ocultar" id="personal">
        <div class="emergente__formulario">
            <form  class="emergente__formulario__contenido" method="Post">
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
                            <option  selected value="<?php echo $genero ?>" > <?php echo $genero ?></option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="campo telefono">
                        <label for="telefono">Número de Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Tu número de teléfono" value="<?php echo $telefono ?>">
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
                            <option   selected value="<?php echo $estado ?>"><?php echo $estado ?></option>
                        </select>
                    </div>
                    <div class="campo ciudad">
                        <label for="ciudad">Ciudad o Municipio</label>
                        <select name="ciudad" id="ciudad">
                        <option   selected value="<?php echo $ciudad ?>"><?php echo $ciudad ?></option>
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
            <form action="" class="emergente__formulario__contenido">
                <div class="emergente__formulario__header sombra">
                    <h3>Foto de perfil y Portada</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo fotoPerfil">
                        <label for="fotoPerfil">Selecciona una Foto de Perfil</label>
                        <input type="file" id="fotoPerfil" onchange="mostrarPerfil(event)" accept="image/*"
                            name="fotoPerfil">
                        <label for="fotoPortada">Selecciona una Foto de Portada</label>
                        <input type="file" id="fotoPortada" onchange="mostrarPortada(event)" accept="image/*"
                            name="fotoPortada">
                    </div>
                    <div class="previewPerfil">
                        <div class="previewPerfil__contenedor">
                            <div class="previewPerfil__portada"></div>
                            <div class="previewPerfil__informacion">
                                <div class="previewPerfil__foto"></div>
                                <div class="previewPerfil__nombre">
                                    <h3>Francisco Sanchez</h3>
                                </div>
                                <div class="previewPerfil__ciudad">
                                    <p><span>Nezahualcoyotl,</span> E.México</p>
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
            <form action="" class="emergente__formulario__contenido">
                <div class="emergente__formulario__header sombra">
                    <h3>Datos de Contacto</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo telefono">
                        <label for="telefono">Número de Teléfono</label>
                        <input type="tel" name="telefono" id="telefono" placeholder="Tu número de teléfono">
                    </div>
                    <div class="campo email">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" placeholder="Tu número de teléfono">
                    </div>
                    <div class="campo portafolio">
                        <label for="portafolio">Link de tu portafolio</label>
                        <input type="text" name="telefono" id="telefono" placeholder="link a tu portafolio">
                    </div>
                    <fieldset>
                        <legend>Redes Sociales</legend>
                        <div class="campo redSocial">
                            <label for="red">Elige una red social</label>
                            <select name="red" id="red">
                                <option value="" selected disabled>--Seleccionar--</option>
                                <option value="1">Facebook</option>
                                <option value="2">Twetter</option>
                                <option value="3">Instagram</option>
                                <option value="4">Linkedin</option>
                                <option value="5">GitHub</option>
                                <option value="6">Youtube</option>
                                <option value="7">TikTok</option>
                                <option value="8">Pinterest</option>
                                <option value="9">Portafolio</option>
                            </select>

                        </div>
                        <div class="campo redlink">
                            <label for="redLink">URL</label>
                            <input type="text" name="redLink" id="redLink" placeholder="URL">
                        </div>
                        <a href="#" class="boton negro">Agregar otra red social</a>
                    </fieldset>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirDatos">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="formularioAcerca">
        <div class="emergente__formulario">
            <form  class="emergente__formulario__contenido" method="Post">
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
            <form class="emergente__formulario__contenido" method="Post">
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
                    

                    
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirAgregarEducacion">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="modificarEducacion">
        <div class="emergente__formulario">
            <form action="Post" class="emergente__formulario__contenido">
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
                    
                    <a href="#" class="boton__rojo">Eliminar</a>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirEducacionModificar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <div class="emergente ocultar" id="agregarExperiencia">
        <div class="emergente__formulario">
            <form  class="emergente__formulario__contenido" method="POST">
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
                    <a href="#" class="boton__negro">Agregar Experiencia</a>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirExperienciaAgregar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="editarExperiencia">
        <div class="emergente__formulario">
            <form action="" class="emergente__formulario__contenido">
                <div class="emergente__formulario__header sombra">
                    <h3>Foto de perfil y Portada</h3>
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
                    <a href="#" class="boton__rojo">Eliminar Experiencia</a>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirExperienciaModificar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="agregarProyecto">
        <div class="emergente__formulario">
            <form action="" class="emergente__formulario__contenido">
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
                        <input type="text" name="tecnologias" id="tecnologias"
                            placeholder="html, css, JavaScript ...">
                    </div>
                    <div class="campo urlProyecto">
                        <label for="nombre">Url de tu proyecto</label>
                        <input type="text" name="nombreProyecto" id="nombre"
                            placeholder="html, css, JavaScript ...">
                    </div>
                    <div class="campo urlProyecto">
                        <label for="fotoProyecto">Agrega una foto de tu proyecto</label>
                        <input type="file" name="fotoProyecto" id="fotoProyecto">
                    </div>
                    <br>
                    <a href="#" class="boton__negro">Nuevo proyecto</a>
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
            <form action="" class="emergente__formulario__contenido">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega algún curso o certificado</h3>
                </div>
                <div class="emergente__formulario__campos">
                    <div class="campo nombre">
                        <label for="nombreCertificado">Nombre de la certificacion y/o curso.</label>
                        <input type="text" name="nombreProyecto" id="nombreProyecto" placeholder="Nombre">
                    </div>
                    <div class="campo descripcion">
                        <label for="descripcionCertificado">Descripción de la certificado y/o curso</label>
                        <textarea name="descripcionProyecto" id="descripcionProyecto" cols="30" rows="5"></textarea>
                    </div>
                    <div class="campo lugar">
                        <label for="lugar">Tecnologias Utilizadas</label>
                        <input type="text" name="lugar" id="lugar" placeholder="Udemy, Platzi... etc.">
                    </div>
                    <div class="campo fechaTermino">
                        <label for="fechaTermino">Fecha termino</label>
                        <input type="date" name="fechaTermino" id="fechaTermino" ">
                    </div>
                    <div class=" campo horas">
                        <label for="horas">Cuantas horas duro la certificacion y/o curso</label>
                        <input type="number" name="horas" id="horas">
                    </div>
                    <br>
                    <a href="#" class="boton rojo">eliminar certificacion</a>
                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salircertificadosAgregar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="editarCertificacion">
        <div class="emergente__formulario">
            <form action="" class="emergente__formulario__contenido">
                <div class="emergente__formulario__header sombra">
                    <h3>Foto de perfil y Portada</h3>
                </div>
                <div class="emergente__formulario__campos">

                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salircertificadosModificar">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
    <div class="emergente ocultar" id="agregarHabilidades">
        <div class="emergente__formulario">
            <form action="" class="emergente__formulario__contenido">
                <div class="emergente__formulario__header sombra">
                    <h3>Agrega tus habilidades</h3>
                </div>
                <div class="emergente__formulario__campos">

                </div>
                <div class="emergente__formulario__btns">
                    <input type="submit" class="boton__verde" value="Guardar">
                    <a href="#" class="boton__blanco" id="salirAgregarHabilidades">Cancelar</a>
                </div>
            </form>
        </div>
    </div>

    <?php  

    if($mensaje == 1){ 
        echo "<div class='tarjetas'>";
       echo "<div class='tarjeta sombra'>";
        echo    '<img src="../src/img/check2.png">';
        echo    '<p>Guardado</p>';
       echo '</div>';
  echo  '</div>  ';

    }else if ($mensaje == 2){
        echo "<div class='tarjetas'>";
        echo "<div class='tarjeta sombra'>";
         echo    '<img src="../src/img/check2.png">';
         echo    '<p>Creado</p>';
        echo '</div>';
       echo  '</div>  ';
    } else if ($mensaje == 3){
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
    <script src="/src/js/headerCandidato.js"></script>
    <script src="/src/js/formularioCandidato.js"></script>
    <script src="/src/js/perfilCandidato.js"></script>
    <script src="/src/js/formulariosEmergentes.js"></script>
    <script src="/src/js/mensajeFlotante.js"></script>
   
    
</body>

</html>