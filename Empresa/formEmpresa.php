<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../include/config.php';

$idUsuario = $_GET['id'] ?? null;
// Variables para almacenar mensajes de error
$errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores enviados por el formulario
    $empresa = $_POST['empresa'];
    $descripcion = $_POST['descripcion'];
    $url = $_POST['url'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $postal = $_POST['postal'];
    $ciudad = $_POST['ciudad'];

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $genero = $_POST['genero'];
    $telefono = $_POST['telefono'];
    $nacimiento = $_POST['nacimiento'];
    $cargo = $_POST['cargo'];
    $fotoPerfil = $_FILES['fotoPerfil'];
    $fotoPortada = $_FILES['fotoPortada'];
    $fotoPerfilR = $_FILES['fotoPerfilR'];

    $carpetaImagenes = 'EmpresaIMG/';

    if (!is_dir($carpetaImagenes)) {
        mkdir($carpetaImagenes);
    }

    // Generar nombres únicos para las imágenes
    $PerfilEmpresa = md5(uniqid(rand(), true)) . ".jpg";
    $Portada = md5(uniqid(rand(), true)) . ".jpg";
    $PerfilReclutador = md5(uniqid(rand(), true)) . ".jpg";

    // Subir las imágenes
    move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $carpetaImagenes . $PerfilEmpresa);
    move_uploaded_file($_FILES['fotoPortada']['tmp_name'], $carpetaImagenes . $Portada);
    move_uploaded_file($_FILES['fotoPerfilR']['tmp_name'], $carpetaImagenes . $PerfilReclutador);


    // // Validaciones para cada campo
     if (empty($empresa)) {
         $errors['empresa'] = "El campo Nombre de la Empresa es obligatorio.";
     }

     if (empty($descripcion)) {
         $errors['descripcion'] = "El campo Descripción es obligatorio.";
     }

     if (empty($url)) {
         $errors['url'] = "El campo URL de la empresa es obligatorio.";
     }

     if (empty($direccion)) {
         $errors['direccion'] = "El campo Dirección es obligatorio.";
     }

     if (empty($estado)) {
         $errors['estado'] = "Debes seleccionar un estado.";
     }

     if (empty($postal)) {
         $errors['postal'] = "El campo Código Postal es obligatorio.";
     }

     if (empty($ciudad)) {
         $errors['ciudad'] = "Debes seleccionar una ciudad.";
     }

     if (empty($nombre)) {
         $errors['nombre'] = "El campo Nombre es obligatorio.";
     }

     if (empty($apellido)) {
         $errors['apellido'] = "El campo Apellido es obligatorio.";
     }

     if (empty($genero)) {
         $errors['genero'] = "Debes seleccionar un género.";
     }

     if (empty($telefono)) {
         $errors['telefono'] = "El campo Número de Teléfono es obligatorio.";
     }

     if (empty($nacimiento)) {
         $errors['nacimiento'] = "El campo Fecha de nacimiento es obligatorio.";
     }

     if (empty($cargo)) {
         $errors['cargo'] = "El campo Cargo es obligatorio.";
    }

   

    // Si no hay errores, puedes procesar los datos recibidos
    if (empty($errors)) {
   
        $sqlEmpresa = "INSERT INTO empresa (EMP_NOMBRE, EMP_APELLIDO,EMP_GENERO, EMP_TELEFONO, EMP_NACIMIENTO, EMP_EMPRESA, EMP_ACERCA,EMP_CARGO, EMP_URL, EMP_FOTOPERFIL,EMP_FOTOPORTADA,EMP_FOTORECLUTADOR, ID_USUARIO ) VALUES ('$nombre', '$apellido', '$genero', '$telefono', '$nacimiento', '$empresa', '$descripcion', '$cargo','$url','$PerfilEmpresa','$Portada','$PerfilReclutador','$idUsuario')";

        $result = $pdo->query($sqlEmpresa);

        $sqlDomicilio = "INSERT INTO domicilio (CALLE,CIUDAD,ESTADO, CODIGO_POSTAL,ID_USUARIO) VALUES ('$direccion','$ciudad','$estado','$postal','$idUsuario')";
        $result = $pdo->query($sqlDomicilio);

        header("Location: /Empresa/principalEmpresa.php?id=$idUsuario");
    }
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
    <link rel="stylesheet" href="../build/css/app.css">
    <title>Registrate</title>
</head>

<body>
    <div class="registroEmpresa">
        <div class="registroEmpresa__contenedor">
            <div class="registroEmpresa__izquierda">
                <a href="/" class="logo">AgoraTalent</a>
            </div>
            <div class="registroEmpresa__derecha">
                <div class="registroEmpresa__bienvenida">
                    <h2>¡Bienvenido(a) al registro de AgoraTalent!</h2>
                    <p>Completa el formulario de registro y sé parte de nuestra comunidad de reclutadores en AgoraTalent. Convierte la búsqueda de talento en una experiencia más efectiva y exitosa.</p>
                </div>
                <form class="registroEmpresa__formulario" method="POST"  enctype="multipart/form-data">
                    <fieldset class="registroEmpresa__empresaform empresaForm sombra">
                        <legend>Datos de la empresa</legend>
                        <div class="empresaForm__campos">
                            <div class="campo empresa">
                                <label for="empresa">Nombre de la Empresa</label>
                                <input type="text" name="empresa" id="empresa" placeholder="Nombre de la empresa">
                                <?php if (isset($errors['empresa'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['empresa']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo descripcion">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" placeholder="Descripción de la empresa"></textarea>
                                <?php if (isset($errors['descripcion'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['descripcion']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo url">
                                <label for="url">URL de la empresa</label>
                                <input type="text" name="url" id="url" placeholder="www.empresa.com">
                                <?php if (isset($errors['url'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['url']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo direccion">
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion" placeholder="Calle y número">
                                <?php if (isset($errors['direccion'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['direccion']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo estado">
                                <label for="estado">Estado</label>
                                <select name="estado" id="estado">
                                    <option value="" disabled selected>--Selecciona un estado--</option>
                                    <!-- Opciones para seleccionar los estados -->
                                </select>
                                <?php if (isset($errors['estado'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['estado']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo postal">
                                <label for="postal">Código Postal</label>
                                <input type="number" name="postal" id="postal" maxlength="6">
                                <?php if (isset($errors['postal'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['postal']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo ciudad">
                                <label for="ciudad">Ciudad</label>
                                <select name="ciudad" id="ciudad">
                                    <option value="" disabled selected>--Selecciona una ciudad--</option>
                                    <!-- Opciones para seleccionar las ciudades -->
                                </select>
                                <?php if (isset($errors['ciudad'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['ciudad']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="registroEmpresa__reclutadorform reclutadorForm">
                        <legend>Datos del reclutador</legend>

                        <div class="reclutadorForm__campos">
                            <div class="campo nombre">
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">
                                <?php if (isset($errors['nombre'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['nombre']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo apellido">
                                <label for="apellido">Apellido</label>
                                <input type="text" name="apellido" id="apellido" placeholder="Tus Apellidos">
                                <?php if (isset($errors['apellido'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['apellido']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo genero">
                                <label for="genero">Género</label>
                                <select name="genero" id="genero">
                                    <option value="" disabled selected> -- Selecciona el género --</option>
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                    <option value="otro">Otro</option>
                                </select>
                                <?php if (isset($errors['genero'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['genero']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo telefono">
                                <label for="telefono">Número de Teléfono</label>
                                <input type="tel" name="telefono" id="telefono" placeholder="Tu número de teléfono">
                                <?php if (isset($errors['telefono'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['telefono']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo fechaNacimiento">
                                <label for="nacimiento">Fecha de nacimiento</label>
                                <input type="date" name="nacimiento" id="nacimiento">
                                <?php if (isset($errors['nacimiento'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['nacimiento']; ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="campo cargo">
                                <label for="cargo">Cargo</label>
                                <input type="text" name="cargo" id="cargo" placeholder="Cargo que tienes en tu empresa">
                                <?php if (isset($errors['cargo'])) : ?>
                                    <p class="error mensajeError"><?php echo $errors['cargo']; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="registroEmpresa__reclutadorform reclutadorForm">
                        <legend>Fotos Empresa</legend>
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

                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="registroEmpresa__reclutadorform reclutadorForm">
                        <legend>Fotos Reclutador</legend>
                        <div class="campo">
                            <label for="fotoPerfil">Selecciona una Foto de Perfil Reclutador</label>
                            <div class="input-wrapper">
                            <input class="inputFotoPerfil" type="file" id="fotoPerfilR" onchange="mostrarPerfilR(event)" accept="image/*" name="fotoPerfilR">

                                <label class="custom-file-upload" for="fotoPerfilR">Seleccionar Archivo</label>
                            </div>
                            <?php if (isset($errors['fotoPerfilR'])) : ?>
                                <p class="mensajeError"><?php echo $errors['fotoPerfilR']; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="previewPerfil">
                            <div class="previewPerfil__contenedor">
                                <div class="previewPerfil__portada"></div>
                                <div class="previewPerfil__informacion">
                                    <div class="previewPerfil__foto__R"></div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="campo btnEmpresa">
                        <input type="submit" value="Guardar" class="boton__verde">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="../src/js/selectEstados.js"></script>
    <script src="../src/js/formularioCandidato.js"></script>
    <!-- <script src="../src/js/selectAreas.js"></script> -->
</body>

</html>