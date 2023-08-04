<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idEducacion = $_GET['idEducacion'] ?? null;
$idProyecto = $_GET['idProyecto'] ?? null;
// Updates

$sql = "SELECT * FROM candidato WHERE id_usuario = $idUsuario ";
// var_dump($sql);
$result = $pdo->query($sql);
$datos = $result->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    // Actualizar Fotos de perfil y portada
    if (isset($_FILES['fotoPortada'])) {
        $portada = $_FILES['fotoPortada'];

        $carpetaImagenes = '../CandidatoIMG/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombrePortada = '';
        if ($portada['name']) {
            // Eliminar la imagen previa si existe
            if (file_exists($carpetaImagenes . $datos['CAN_FOTOPORTADA'])) {
                unlink($carpetaImagenes . $datos['CAN_FOTOPORTADA']);
            }

            // Generar un nuevo nombre de archivo único
            $nombrePortada = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($portada['tmp_name'], $carpetaImagenes . $nombrePortada);
        } else {
            $nombrePortada = $datos['CAN_FOTOPORTADA'];
        }

        $updatePortada = "UPDATE candidato SET CAN_FOTOPORTADA = :nombrePortada WHERE id_usuario = :idUsuario";
        $stmt = $pdo->prepare($updatePortada);
        $stmt->bindParam(':nombrePortada', $nombrePortada);
        $stmt->bindParam(':idUsuario', $idUsuario);
        $result = $stmt->execute();

        $perfil = $_FILES['fotoPerfil'];


        $carpetaImagenes = '../CandidatoIMG/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombrePerfil = '';
        if ($perfil['name']) {
            // Eliminar la imagen previa si existe
            if (file_exists($carpetaImagenes . $datos['CAN_FOTOPERFIL'])) {
                unlink($carpetaImagenes . $datos['CAN_FOTOPERFIL']);
            }

            // Generar un nuevo nombre de archivo único
            $nombrePerfil = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($perfil['tmp_name'], $carpetaImagenes . $nombrePerfil);
        } else {
            $nombrePerfil = $datos['CAN_FOTOPERFIL'];
        }

        $updatePerfil = "UPDATE candidato SET CAN_FOTOPERFIL = '$nombrePerfil' WHERE id_usuario = $idUsuario";
        $result = $pdo->query($updatePerfil);

        // if ($result) {
        //     header("Location: /Candidato/CandidatoPrincipal.php?id=$idUsuario&msj=1");
        //     exit();
        // }
    }
    // Actualizar informacion Personal
    if (isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['genero']) && isset($_POST['fechaNacimiento']) && isset($_POST['postal']) && isset($_POST['estado']) && isset($_POST['ciudad'])) {
        $nombreUpdate = $_POST['nombre'];
        //     echo $nombreUpdate;
        $apellidoUpdate = $_POST['apellido'];
        $generoUpdate = $_POST['genero'];
        // $telefonoUpdate = $_POST['telefono'];
        $fechaNacimientoUpdate = $_POST['fechaNacimiento'];
        $postalUpdate = $_POST['postal'];
        $estadoUpdate = $_POST['estado'];
        $ciudadUpdate = $_POST['ciudad'];

        $updatePersonal = "UPDATE candidato SET can_nombre = '$nombreUpdate', can_apellido = '$apellidoUpdate', can_genero = '$generoUpdate', can_fechaNacimiento = '$fechaNacimientoUpdate' WHERE id_usuario = $idUsuario";
        $result1 = $pdo->query($updatePersonal);
        // echo $updatePersonal;
        $updateDomicilio = "UPDATE domicilio SET codigo_postal = '$postalUpdate', estado = '$estadoUpdate', ciudad = '$ciudadUpdate' WHERE id_usuario = '$idUsuario'";
        $result2 = $pdo->query($updateDomicilio);
    }

    // Actualizar Informacion de contacto

    if (isset($_POST['telefono'])) {
        $telefono = $_POST['telefono'];

        // UPDATE
        $updateContacto = "UPDATE candidato SET can_telefono = '$telefono' WHERE id_usuario = $idUsuario";
        // var_dump($updateContacto);
        $resultTel = $pdo->query($updateContacto);



        // Resto del código para procesar los datos adicionales de los campos de red y redLink
    }


    if (isset($_POST['email'])) {
        $email = $_POST['email'];


        // Consulta para obtener el correo actual del usuario
        $updateEmail = "UPDATE usuario SET CORREO = '$email' WHERE id_usuario = $idUsuario";
        // var_dump($updateEmail);
        $resultTel = $pdo->query($updateEmail);
    }

    if (isset($_POST['urlPortafolio'])) {
        $portafolio = $_POST['urlPortafolio'];
        $updatePortafolio = "UPDATE candidato SET CAN_PORTAFOLIO = '$portafolio' WHERE id_usuario = $idUsuario";
        // var_dump($updateEmail);
        $resultPort = $pdo->query($updatePortafolio);
    }

    if (isset($_POST['acerca'])) {
        $acercaTexto = $_POST['acerca'];

        // Prepare the SQL statement with a placeholder for the parameter
        $updateAcerca = "UPDATE candidato SET can_acerca = :acercaTexto WHERE id_usuario = :idUsuario";
        $stmt = $pdo->prepare($updateAcerca);

        // Bind the parameters
        $stmt->bindParam(':acercaTexto', $acercaTexto, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);

        // Execute the statement
        $resultAcerca = $stmt->execute();
    }

    if (isset($_POST['institucion']) && isset($_POST['fechaInicio']) && isset($_POST['titulo']) && isset($_POST['titulo']) && isset($_POST['nivel__estudios'])) {
        $institucion = $_POST['institucion'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $titulo = $_POST['titulo'];
        $nivelEstudios = $_POST['nivel__estudios'];

        $updateEducacion = "UPDATE educacion SET EDU_NOMBRE_INSTITUCION = '$institucion', EDU_FECHA_INICIO = '$fechaInicio', EDU_FECHA_FIN = '$fechaFin', EDU_TITULO = '$titulo', EDU_NIVEL = '$nivelEstudios' WHERE id_usuario = $idUsuario AND ID_EDUCACION = $idEducacion;           ";
        // echo $updateEducacion;
        $resultEdu = $pdo->query($updateEducacion);
    }

    if (isset($_POST['empresa']) && isset($_POST['descripcion']) && isset($_POST['cargo']) && isset($_POST['duracion'])) {

        $empresa = $_POST['empresa'];
        $descripcion = $_POST['descripcion'];
        $cargo = $_POST['cargo'];
        $duracion = $_POST['duracion'];

        $updateExperiencia = "UPDATE experiencia SET EXP_NOMBRE_EMPRESA = '$empresa', EXP_DESCRIPCION = '$descripcion', EXP_CARGO = '$cargo', EXP_DURACION = '$duracion' WHERE id_usuario = '$idUsuario' AND ID_EXPERIENCIA = '$idExperiencia'";
        // echo $updateEducacion;
        $resultExp = $pdo->query($updateExperiencia);
    }
    if (isset($_POST['nombreProyecto']) && isset($_POST['descripcionProyecto'])  && isset($_POST['tecnologias'])  && isset($_POST['urlProyecto']) && isset($_FILES['fotoProyecto'])) {

        $nombreProyecto = $_POST['nombreProyecto'];
        $descripcion = $_POST['descripcionProyecto'];
        $tecnologias = $_POST['tecnologias'];
        $urlProyecto = $_POST['urlProyecto'];
        $fotoProyecto = $_FILES['fotoProyecto'];

        $sqlProyecto = "SELECT * FROM proyectos WHERE id_usuario = '$idUsuario'";
        $resultProyecto = $pdo->query($sqlProyecto);
        $datos = $resultProyecto->fetch(PDO::FETCH_ASSOC);

        $perfil = $_FILES['fotoProyecto'];

        $carpetaImagenes = '../CandidatoIMG/';
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombrePerfil = '';
        if ($perfil['name']) {
            // Eliminar la imagen previa si existe
            if (file_exists($carpetaImagenes . $datos['PROY_FOTO'])) {
                unlink($carpetaImagenes . $datos['PROY_FOTO']);
            }

            // Generar un nuevo nombre de archivo único
            $nombrePerfil = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($perfil['tmp_name'], $carpetaImagenes . $nombrePerfil);
        } else {
            $nombrePerfil = $datos['PROY_FOTO'];
        }

        $updateProyecto = "UPDATE proyectos SET PROY_NOMBRE = '$nombreProyecto', PROY_DESCRIPCION = '$descripcion', PROY_TECNOLOGIA = '$tecnologias', PROY_URL = '$urlProyecto', PROY_FOTO = '$nombrePerfil' WHERE id_usuario = '$idUsuario' AND ID_PROYECTO = $idProyecto";
        // echo $updateProyecto;
        $resultProy = $pdo->query($updateProyecto);
    }


    header("Location: /Candidato/CandidatoPrincipal.php?id=$idUsuario&msj=1");
}
