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

$status = 'COMPLETADA';

#consulta para actualizar el estatusprueba de la tabla de pruebas siempre y cuando coincidan el id empresa el id candidato y el id prueba
$sql = "UPDATE pruebas SET ESTATUSPRUEBA = '$status' WHERE ID_EMPRESA = $idEmpresa AND ID_CANDIDATO = $idCandidato AND ID_PRUEBA = $idPrueba";
$result = $pdo->query($sql);
if($result){
    header("Location: /Candidato/vistasEtapas/EtapaPruebas.php?id=$idUsuario&idCandidato=$idCandidato&idEmpresa=$idEmpresa");
}


?>