<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../include/config.php';

$idUsuario = $_GET['id'] ?? null;
$idEmpresa = $_GET['idEmpresa'] ?? null;
$idCandidato = $_GET['idCandidato'] ?? null;
$estadoGET = $_GET['estado'] ?? null;
$idPostulacion = $_GET['idPostulacion'] ?? null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recuperar los documentos del formulario
    $documentos = $_POST["documentos"];
    $estadoDocuemento = 'ENVIADO';

    // $documentos es un arreglo asociativo que contiene los nombres de los documentos enviados

    // Ejemplo: Imprimir los nombres de los documentos en pantalla
    foreach ($documentos as $key => $documento) {
        // echo "Documento " . ($key + 1) . ": " . $documento . "<br>";
        #sql para insertar en la tabla
        $sql = "INSERT INTO DOCUMENTOS (ID_CANDIDATO, ID_EMPRESA,ID_POSTULACION,ESTADODOCUMENTO, NOMBRE_DOCUMENTO) 
            VALUES ('$idCandidato', '$idEmpresa', '$idPostulacion', '$estadoDocuemento', '$documento')";
        // echo '<pre>';
        // var_dump($sql);    
        // echo '</pre>';
        $result = $pdo->query($sql);
        if($result){
            header("Location: /Empresa/procesoCandidato.php?id=$idUsuario&idCandidato=$idCandidato&estado=$estadoGET&idPostulacion=$idPostulacion&estadoDocumento=$estadoDocuemento");
        }
    }
}

?>