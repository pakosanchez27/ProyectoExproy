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
$idEducacion = $_GET['idEducacion'] ?? null;
$idExperiencia = $_GET['idExperiencia'] ?? null;
$idProyecto = $_GET['idProyecto'] ?? null;
$idCertificacion = $_GET['idCertificacion'] ?? null;

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
if($idEducacion){
    $sqlEliminar = "DELETE FROM educacion WHERE id_usuario = $idUsuario AND ID_EDUCACION = $idEducacion";
    // var_dump($sqlEliminar);
    $result = $pdo->query($sqlEliminar);
}
if($idExperiencia){
    $sqlEliminar = "DELETE FROM experiencia WHERE id_usuario = $idUsuario AND ID_EXPERIENCIA = $idExperiencia";
    // var_dump($sqlEliminar);
    $result = $pdo->query($sqlEliminar);
}
if($idProyecto){
    $sqlEliminar = "DELETE FROM proyectos WHERE id_usuario = $idUsuario AND ID_PROYECTO = $idProyecto";
    // var_dump($sqlEliminar);
    $result = $pdo->query($sqlEliminar);
}

if($idCertificacion){
    $sqlEliminar = "DELETE FROM certificaciones WHERE id_usuario = $idUsuario AND ID_CERTIFICACION = $idCertificacion";
    // var_dump($sqlEliminar);
    $result = $pdo->query($sqlEliminar);
}







 header("Location:  /Candidato/CandidatoPrincipal.php?id=$idUsuario&msj=3");


?>