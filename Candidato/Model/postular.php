<?php
use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../../include/config.php';

$idUsuario = $_GET['id'];
$idCandidato = $_GET['idCandidato'];
$idVacante = $_GET['idVacante'];

// Utilizar consultas preparadas para evitar inyección SQL
$sql = "INSERT INTO postulacion (ID_CANDIDATO, ID_VACANTE, FECHA_POSTULACION, ESTADO) VALUES (?, ?, CURDATE(), 'POSTULADO')";
$stmt = $pdo->prepare($sql);
$stmt->execute([$idCandidato, $idVacante]);

if ($stmt->rowCount() > 0) {
    header("Location: /Candidato/PostuladosEmpleos.php?id=$idUsuario&idCandidato=$idCandidato&idVacante=$idVacante");
}





?>