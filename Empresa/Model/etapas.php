<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$idUsuario = $_GET['id'];
// $idVacante = $_GET['idVacante'];
$idCandidato = $_GET['idCandidato'];
$idPostulacion = $_GET['idPostulacion'];
$etapa = $_GET['etapa'];

require '../../include/config.php';

if($etapa == 'POSTULADO'){
    $etapa = 'REVICION';
}elseif($etapa == 'REVICION'){
    $etapa = 'ENTREVISTA';
}elseif($etapa == 'ENTREVISTA'){
    $etapa = 'PRUEBA';
}elseif($etapa == 'PRUEBA'){
    $etapa = 'CONTRATACION';
}elseif($etapa == 'CONTRATACION'){
    $etapa = 'CONTRATADO';
}elseif($etapa == 'RECHAZADO'){
    $etapa = 'RECHAZADO';
}


$updateEtapa = "UPDATE POSTULACION SET ESTADO = '$etapa' WHERE ID_CANDIDATO = $idCandidato AND ID_POSTULACION = $idPostulacion";
 $result = $pdo->query($updateEtapa);
var_dump($updateEtapa);

header("Location: /Empresa/Enproceso.php?id=$idUsuario");


?> 