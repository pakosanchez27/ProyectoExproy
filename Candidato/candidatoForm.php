<?php
require '../include/config.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idUsuario = $_GET['id'] ?? null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $fechaNacimiento = $_POST['nacimiento'];
    $fotoPerfil = $_FILES['fotoPerfil'];
    $fotoPortada = $_FILES['fotoPortada'];
    $codigoPostal = $_POST['postal'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $institucion = $_POST['institucion'];
    $fechaInicio = $_POST['fechaInicio'] ?? null;;
    $fechaFin = $_POST['fechaFin'];
    $titulo = $_POST['titulo'];
    $nivelEstudios = $_POST['nivel__estudios'];
    $skills = isset($_POST["etiquetas"]) ? $_POST["etiquetas"] : [];
    $idiomas = isset($_POST["idiomas"]) ? $_POST["idiomas"] : [];
    $niveles = isset($_POST["nivel"]) ? $_POST["nivel"] : [];
    $empresa = $_POST['empresa'];
    $descripcion = $_POST['descripcion'];
    $cargo = $_POST['cargo'];
    $duracion = $_POST['duracion'];
    $puesto = $_POST['puesto'];
    $area = $_POST['area'];



    $carpetaImagenes = 'CandidatoIMG/';

    if (!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    // Generar nombres únicos para las imágenes
    $Perfil = md5(uniqid(rand(), true)) . ".jpg";
    $Portada = md5(uniqid(rand(), true)) . ".jpg";

    // Subir las imágenes
    move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $carpetaImagenes . $Perfil);
    move_uploaded_file($_FILES['fotoPortada']['tmp_name'], $carpetaImagenes . $Portada);

    // Consulta preparada para la inserción de datos en la tabla Candidato
    $sqlCandidato = "INSERT INTO Candidato (can_nombre, can_apellido, can_genero, can_telefono, can_fechaNacimiento, can_fotoPerfil, can_fotoPortada, area, puesto, id_usuario) VALUES ('$nombre', '$apellido', '$genero', '$telefono', '$fechaNacimiento', '$Perfil', '$Portada', '$area', '$puesto', '$idUsuario')";
    // echo $sqlCandidato;
    $resultCan = $pdo->query($sqlCandidato);

    $sqlDomicilio = "INSERT INTO Domicilio ( ciudad, estado, codigo_postal, id_usuario) VALUES ('$ciudad', '$estado', '$codigoPostal', '$idUsuario')";
    // echo $sqlDomicilio;
    $resultDom = $pdo->query($sqlDomicilio);

    $sqlEducacion = "INSERT INTO educacion (edu_nombre_institucion, edu_fecha_inicio, edu_fecha_fin, edu_titulo, edu_nivel, id_usuario) VALUES ( '$institucion', '$fechaInicio', '$fechaFin', '$titulo', '$nivelEstudios', '$idUsuario')";
    // echo $sqlEducacion; 
    $resultEdu = $pdo->query($sqlEducacion);

    foreach ($skills as $etiqueta) {
        $sqlHabilidad = "INSERT INTO habilidad ( hab_nombre, id_usuario) VALUES ('$etiqueta', '$idUsuario')";
        //     // echo $sqlHabilidad;  
        $resultHab = $pdo->query($sqlHabilidad);
    }


    for ($i = 0; $i < count($idiomas); $i++) {
        $idioma = $pdo->quote($idiomas[$i]);
        $nivel = $pdo->quote($niveles[$i]);

        $sqlIdioma = "INSERT INTO idioma (idioma_nombre, idioma_nivel, id_usuario) VALUES ($idioma, $nivel, $idUsuario)";

        $resultIdioma = $pdo->query($sqlIdioma);
    }


    $sqlExperiencia = "INSERT INTO experiencia (EXP_NOMBRE_EMPRESA, EXP_DESCRIPCION, EXP_CARGO, EXP_DURACION, ID_USUARIO) VALUES ('$empresa', '$descripcion', '$cargo', '$duracion', '$idUsuario')";
    // echo $sqlExperiencia; 
    $resultExp = $pdo->query($sqlExperiencia);


    //  Redirigir a la página candidatoForm.php con el ID del nuevo registro
    header("Location: CandidatoPrincipal.php?id=$idUsuario");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;400;600&family=Montserrat:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/app.css">
    <title>Registrate</title>
</head>

<body>
    <div class="candidatoForm">
        <div class="candidatoForm__izquierda">
            <div class="izquierda__logo">
                <a href="/">AgoraTalent</a>
            </div>
            <div class="izquierda__paso" id="banner_izquierda">
                <h3 id="divpaso"></h3>
                <p id="descripcion"></p>
            </div>
            <div class="izquierda__flujo">
                <div class="flujo__paso">
                    <div id="flujo1" class="paso__circulo">
                        <p>1</p>
                    </div>
                    <div id="flujotexto1" class="paso__texto">
                        <p>Informacion Personal.</p>
                    </div>
                </div> <!--Paso 1-->

                <div class="flujo__paso">
                    <div id="flujo2" class="paso__circulo">
                        <p>2</p>
                    </div>
                    <div id="flujotexto2" class="paso__texto">
                        <p>Educación y Habilidades.</p>
                    </div>
                </div> <!--Paso 2-->

                <div class="flujo__paso">
                    <div id="flujo3" class="paso__circulo">
                        <p>3</p>
                    </div>
                    <div id="flujotexto3" class="paso__texto">
                        <p>Experiencia Laboral</p>
                    </div>
                </div> <!--Paso 3-->

                <div class="flujo__paso">
                    <div id="flujo4" class="paso__circulo">
                        <p>4</p>
                    </div>
                    <div id="flujotexto4" class="paso__texto">
                        <p>Foto de Perfil</p>
                    </div>
                </div> <!--Paso 4-->

                <div class="flujo__paso">
                    <div id="flujo5" class="paso__circulo">
                        <p>5</p>
                    </div>
                    <div id="flujotexto5" class="paso__texto">
                        <p>Preferencias de Empleo</p>
                    </div>
                </div> <!--Paso 5-->
            </div>
        </div>
        <div class="candidatoForm__derecha">
            <div class="derecha__contenido">
                <div class="derecha__titulo">
                    <h3 id="titulo"></h3>
                </div>
                <div class="derecha__texto">
                    <p id="textoPrincipal"></p>
                </div>
                <div class="derecha__formulario">
                    <form id="formulario" method="post" enctype="multipart/form-data">
                        <div id="grid1" class="grid1 ocultar">
                            <div class="campo nombre">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">
                            </div>
                            <div class="campo apellido">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" placeholder="Tus Apellidos">
                            </div>
                            <div class="campo genero">
                                <label for="genero">Genero</label>
                                <select name="genero" id="genero">
                                    <option disabled selected> -- selecciona el genero --</option>
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                    <option value="otro">Otro</option>
                                </select>
                            </div>
                            <div class="campo telefono">
                                <label for="telefono">Número de Teléfono</label>
                                <input type="tel" name="telefono" id="telefono" placeholder="Tu número de teléfono">
                            </div>

                            <div class="campo fechaNacimiento">
                                <label for="nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="nacimiento" id="nacimiento">
                            </div>
                            <div class="campo postal">
                                <label for="postal">Codigo Postal</label>
                                <input type="text" name="postal" id="postal" placeholder="#00000">
                            </div>
                            <div class="campo estado">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado">
                                    <option value="" disabled selected>--Selecciona un Estado--</option>
                                </select>
                            </div>
                            <div class="campo ciudad">
                                <label for="ciudad">Ciudad o Municipio</label>
                                <select name="ciudad" id="ciudad">
                                    <option value="" disabled selected>--Selecciona una Ciudad--</option>
                                </select>
                            </div>
                        </div>
                        <div id="grid2" class="grid2 ocultar">
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
                            <div class="campo skills">
                                <label for="skills">Habilidades o Skills</label>
                                <input type="text" name="skills" id="skills" placeholder="Ej. PHP, Java, Photoshop..." onkeydown="agregarEtiqueta(event)">
                            </div>

                            <div id="etiquetasContainer"></div>
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
                        <div id="grid3" class="grid3 ocultar">
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
                                    <option value="1 a 3">1 a 3 años</option>
                                    <option value="3 a 5">3 a 5 años</option>
                                    <option value="5 a 10">5 a 10 años</option>
                                    <option value="mas 10">Más de 10 años</option>
                                </select>
                            </div>
                        </div>
                        <div id="grid4" class="grid4 ocultar">
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
                                    <div class="previewPerfil__portada"></div>
                                    <div class="previewPerfil__informacion">
                                        <div class="previewPerfil__foto"></div>
                                        <div class="previewPerfil__nombre">
                                            <h3>Tu nombre</h3>
                                        </div>
                                        <div class="previewPerfil__ciudad">
                                            <p><span>Ciudad,</span> Estado</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid5 ocultar" id="grid5">
                            <div class="campo area">
                                <label for="area">Área de especialidad</label>
                                <select name="area" id="area">
                                    <option value="" disabled selected>--Selecciona un Área--</option>
                                </select>
                            </div>
                            <div class="campo puesto">
                                <label for="puesto">Puesto de Interés</label>
                                <select name="puesto" id="puesto">
                                    <option value="" disabled selected>--Selecciona un Puesto--</option>
                                </select>
                            </div>
                        </div>
                        <div class="derecha__botones">
                            <a id="atras" href="#" class="boton__blanco">Atrás</a>
                            <!--Este botón debe llevar al formulario de actualización-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="/src/js/formularioCandidato.js"></script>
    <script src="/src/js/selectEstados.js"></script>
    <script src="/src/js/selectAreas.js"></script>
    <!-- <script src="/src/js/validacionCandidato.js"></script> -->
</body>

</html>