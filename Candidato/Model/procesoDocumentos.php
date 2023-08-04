<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idEmpresa  = $_GET['idEmpresa'] ?? null;
$idCandidato = $_GET['idCandidato'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $documentos = $_FILES["documentos"] ?? [];
    $idDocuemento = $_POST["idDocumento"] ?? [];
    $estado = 'ENTREGADO';

    for ($i = 0; $i < count($_FILES["documentos"]["name"]); $i++) {
        $carpetadocumentos = "../documentosCanidato";

        if (!is_dir($carpetadocumentos)) {
            mkdir($carpetadocumentos);
        }

        $documentoNombre = uniqid() . ".pdf";
        $documentoPath = $carpetadocumentos . "/" . $documentoNombre;

        if (is_uploaded_file($documentos['tmp_name'][$i])) {
            move_uploaded_file($documentos['tmp_name'][$i], $documentoPath);

            // Insert the file name into the database.
            $sql = "UPDATE documentos SET RUTA_DOCUMENTO = '$documentoPath',  ESTADODOCUMENTO = '$estado' WHERE ID_DOCUMENTO = $idDocuemento[$i] ";
            $result = $pdo->query($sql);
    }

    header("Location: /Candidato/vistasEtapas/EtapaDocumentos.php?id=$idUsuario&idEmpresa=$idEmpresa&idCandidato=$idCandidato&estadoDoc=$estado");
}
}
?>
