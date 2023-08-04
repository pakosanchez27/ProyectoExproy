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

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario

    $nombre_entrevistador = $_POST['nombreEntrevistador'];
    $telefono_entrevistador = $_POST['telEntrevistador'];
    $fecha_cita = $_POST['fechaCita'];
    $hora_cita = $_POST['horaCita'];
    $calle = $_POST['calle'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $colonia = $_POST['colonia'];
    $codigo_postal = $_POST['postal'];
    $observaciones = $_POST['observaciones'];

  
    $status_entrevista = 'AGENDADO';
    
    $sql = "INSERT INTO CITA (ID_CANDIDATO, ID_EMPRESA, NOMBRE_ENTREVISTADOR, TELEFONO_ENTREVISTADOR, FECHA_CITA, HORA_CITA, CALLE, CIUDAD, ESTADO, COLONIA, CODIGO_POSTAL, OBSERVACIONES, STATUSENTREVISTA) 
            VALUES ('$idCandidato', '$idEmpresa', '$nombre_entrevistador', '$telefono_entrevistador', '$fecha_cita', '$hora_cita', '$calle', '$ciudad', '$estado', '$colonia', '$codigo_postal', '$observaciones', '$status_entrevista')";
    
    $result = $pdo->query($sql);

    if($result){
        header("Location: /Empresa/procesoCandidato.php?id=$idUsuario&idCandidato=$idCandidato&estado=$estadoGET&idPostulacion=$idPostulacion");
    }
    

    // Recuerda realizar las validaciones y asegurarte de que los datos estén seguros antes de insertarlos en la base de datos.
}
