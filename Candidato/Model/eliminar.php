<?php
use LDAP\Result;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../../include/config.php';
$idUsuario = $_GET['id'] ?? null;
$idHabilidad = $_GET['idHabilidad']?? null;
$idRed = $_GET['idRed'] ?? null;
$idIdioma = $_GET['idIdioma'] ?? null;

if ($idRed) {

    $deletSQL = "DELETE FROM redessociales WHERE id_usuario = $idUsuario AND id_red = $idRed ";
    $result = $pdo->query($deletSQL);

}

if ($idHabilidad){
    $sqlEliminar = "DELETE FROM habilidad WHERE id_usuario = $idUsuario AND ID_HABILIDAD = $idHabilidad";
    $pdo->exec($sqlEliminar);
}


if($idIdioma){
    $sqlEliminar = "DELETE FROM idioma WHERE id_usuario = $idUsuario AND ID_IDIOMA = $idIdioma";
    // var_dump($sqlEliminar);
    $result = $pdo->query($sqlEliminar);
}





 header("Location:  /Candidato/CandidatoPrincipal.php?id=$idUsuario&msj=3");


?>