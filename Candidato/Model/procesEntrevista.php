<?php

use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idEmpresa  = $_GET['idEmpresa'] ?? null;
$idCandidato = $_GET['idCandidato'] ?? null;
$idPrueba = $_GET['idPrueba'] ?? null;

$status = 'CONFIRMADA';

$sql = "UPDATE cita SET STATUSENTREVISTA = '$status' WHERE ID_EMPRESA = $idEmpresa AND ID_CANDIDATO = $idCandidato";
$result = $pdo->query($sql);
if($result){
    header("Location: /Candidato/PostuladosEmpleos.php?id=$idUsuario&idCandidato=$idCandidato");
}




?>