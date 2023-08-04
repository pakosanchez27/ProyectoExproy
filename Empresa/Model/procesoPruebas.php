<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../include/config.php';

$idUsuario = $_GET['id'];
$idCandidato = $_GET['idCandidato'];
$idEmpresa = $_GET['idEmpresa'];
$estado = $_GET['estado'];
$idPostulacion = $_GET['idPostulacion'];

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nombrePrueba = isset($_POST["nombrePrueba"]) ? $_POST["nombrePrueba"] : [];
    $linkPrueba = isset($_POST["LinkPrueba"]) ? $_POST["LinkPrueba"] : [];
    $status = 'ENVIADO';
    
    for ($i = 0; $i < count($nombrePrueba); $i++) {
        $nombre = $pdo->quote($nombrePrueba[$i]);
        $link = $pdo->quote($linkPrueba[$i]);
        $sql = "INSERT INTO pruebas (NOMBREPRUEBA, LINKPRUEBA, ESTATUSPRUEBA, ID_EMPRESA, ID_CANDIDATO) VALUES ($nombre,$link,'$status',$idEmpresa,$idCandidato)";
     var_dump($sql);
        $result = $pdo->query($sql);

    }
    
    header("Location: /Empresa/procesoCandidato.php?id=$idUsuario&idCandidato=$idCandidato&estado=$estado&idPostulacion=$idPostulacion&estatus=$status");
   
}

?>