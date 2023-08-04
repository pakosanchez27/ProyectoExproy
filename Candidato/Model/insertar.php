<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['red']) && isset($_POST['redLink'])) {

        $redNombre = isset($_POST["red"]) ? $_POST["red"] : [];
        $redLink = isset($_POST["redLink"]) ? $_POST["redLink"] : [];



        for ($i = 0; $i < count($redNombre); $i++) {
            $red = $pdo->quote($redNombre[$i]);
            $link = $pdo->quote($redLink[$i]);

            $sqlRed = "INSERT INTO redessociales (RED_NOMBRE, RED_URI, ID_USUARIO) VALUES ($red, $link, $idUsuario)";
            // var_dump($sqlRed);
            $resultRed = $pdo->query($sqlRed);
        }
    }


    if (isset($_POST['institucion']) && isset($_POST['fechaInicio']) && isset($_POST['fechaFin']) && isset($_POST['titulo']) && isset($_POST['nivel__estudios'])) {
        $institucion = $_POST['institucion'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaFin = $_POST['fechaFin'];
        $titulo = $_POST['titulo'];
        $nivel = $_POST['nivel__estudios'];
    
      
        $sqlEducacion = "INSERT INTO educacion (edu_nombre_institucion, edu_fecha_inicio, edu_fecha_fin, edu_titulo, edu_nivel, id_usuario) VALUES (:institucion, :fechaInicio, :fechaFin, :titulo, :nivel, :idUsuario)";
        $stmt = $pdo->prepare($sqlEducacion);
    
        // Bind parameters to prevent SQL injection
        $stmt->bindParam(':institucion', $institucion, PDO::PARAM_STR);
        $stmt->bindParam(':fechaInicio', $fechaInicio, PDO::PARAM_STR);
        $stmt->bindParam(':fechaFin', $fechaFin, PDO::PARAM_STR);
        $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $nivel, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
    
        // Execute the prepared statement
        $resultEdu = $stmt->execute();
    }

    if (isset($_POST['empresa']) && isset($_POST['descripcion']) && isset($_POST['cargo']) && isset($_POST['duracion'])) {
        $empresa = $_POST['empresa'];
        $descripcion = $_POST['descripcion'];
        $cargo = $_POST['cargo'];
        $duracion = $_POST['duracion'];

        $sqlExperiencia = "INSERT INTO experiencia (exp_nombre_empresa, exp_descripcion, exp_cargo, exp_duracion, id_usuario) VALUES ('$empresa', '$descripcion', '$cargo', '$duracion', '$idUsuario')";
        // echo $sqlExperiencia;
        $experiencia = $pdo->query($sqlExperiencia);
    }

    if (isset($_POST['skills'])) {
        $skills = isset($_POST["etiquetas"]) ? $_POST["etiquetas"] : [];
        foreach ($skills as $etiqueta) {
            $sqlHabilidad = "INSERT INTO habilidad ( hab_nombre, id_usuario) VALUES ('$etiqueta', '$idUsuario')";
            //   var_dump($sqlHabilidad);  
            $resultHab = $pdo->query($sqlHabilidad);
        }
    }

    if (isset($_POST['idiomas'])) {
        $idiomas = isset($_POST["idiomas"]) ? $_POST["idiomas"] : [];
        $niveles = isset($_POST["nivel"]) ? $_POST["nivel"] : [];

        for ($i = 0; $i < count($idiomas); $i++) {
            $idioma = $pdo->quote($idiomas[$i]);
            $nivel = $pdo->quote($niveles[$i]);

            $sqlIdioma = "INSERT INTO idioma (idioma_nombre, idioma_nivel, id_usuario) VALUES ($idioma, $nivel, $idUsuario)";

            $resultIdioma = $pdo->query($sqlIdioma);
        }
    }

    if (isset($_POST['nombreProyecto']) && isset($_POST['descripcionProyecto']) && isset($_POST['tecnologias']) && isset($_POST['urlProyecto']) && isset($_FILES['fotoProyecto'])) {
        $nombreProyecto = $_POST['nombreProyecto'];
        $descripcionProyecto = $_POST['descripcionProyecto'];
        $tecnologias = $_POST['tecnologias'];
        $urlProyecto = $_POST['urlProyecto'];
        $fotoProyecto = $_FILES['fotoProyecto'];


        // Codigo para guardar la foto del proyecto

        $carpetaImagenes = '../CandidatoIMG/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        // Generar nombres únicos para las imágenes
        $fotoProyectoNombre = md5(uniqid(rand(), true)) . ".jpg";

        // Subir la imagen
        move_uploaded_file($fotoProyecto['tmp_name'], $carpetaImagenes . $fotoProyectoNombre);

        $sqlProyecto = "INSERT INTO proyectos (PROY_NOMBRE, PROY_DESCRIPCION, PROY_TECNOLOGIA, PROY_URL, PROY_FOTO, ID_USUARIO) VALUES ('$nombreProyecto', '$descripcionProyecto', '$tecnologias', '$urlProyecto', '$fotoProyectoNombre', '$idUsuario')";

        $result = $pdo->query($sqlProyecto);
    }

    if (isset($_POST['nombreCertificado']) && isset($_POST['descripcionCertificado']) && isset($_POST['lugar']) && isset($_POST['fechaTermino']) && isset($_POST['horas'])) {

        $nombreCertificado = $_POST['nombreCertificado'];
        $descripcionCertificado = $_POST['descripcionCertificado'] ;
        $lugar = $_POST['lugar'];
        $fechaTermino = $_POST['fechaTermino'];
        $horas = $_POST['horas'];

        $sqlCertificado = "INSERT INTO certificaciones ( CER_NOMBRE, CER_DESCRIPCION, CER_LUGAR, CER_FECHA, CER_HORAS, ID_USUARIO) VALUES ('$nombreCertificado','$descripcionCertificado','$lugar','$fechaTermino','$horas','$idUsuario')";

        $resultCer = $pdo->query($sqlCertificado);
             


    }
    header("Location: /Candidato/CandidatoPrincipal.php?id=$idUsuario&msj=1");
}
