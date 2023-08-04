<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../include/config.php';

$idUsuario = $_GET['id'] ?? null;
$idEmpresa = $_GET['idEmpresa'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombreVacante = $_POST['nombreVacante'];
    $salario = $_POST['salario'];
    $estado = $_POST['estado'];
    $ciudad = $_POST['ciudad'];
    $area = $_POST['area'];
    $puesto = $_POST['puesto'];
    $educacion = $_POST['educacion'];
    $horario = $_POST['horario'];
    $modoTrabajo = $_POST['modoTrabajo'];
    $vencimiento = $_POST['vencimiento'];
    $vacantesDisponibles = $_POST['vacantesDisponibles'];
    $descripcion = $_POST['descripcion'];
    $tipoContrato = $_POST['tipoContrato'];

    // Consulta para insertar la nueva vacante en la tabla "vacante"
    $sqlVacante = "INSERT INTO vacante (TITULO, SALARIO, ESTADO, CIUDAD, AREA, PUESTO, EDUCACION, HORARIO, MODO_TRABAJO, VENCIMIENTO, NUMERO_VACANTES, DESCRIPCION, TIPO_CONTRATO, ID_EMPRESA)
    VALUES ('$nombreVacante', '$salario', '$estado', '$ciudad', '$area', '$puesto', '$educacion', '$horario', '$modoTrabajo', '$vencimiento', '$vacantesDisponibles', '$descripcion', '$tipoContrato', '$idEmpresa')";

    // Ejecutar la consulta de inserción en la tabla "vacante"
    $result = $pdo->query($sqlVacante);

    // Obtener el ID de la última vacante insertada
    $idVacante = $pdo->lastInsertId();

    // Consulta para insertar la relación entre la empresa y la nueva vacante en la tabla "empresa_vacante"
    $sqlVacanteEmpresa = "INSERT INTO empresa_vacante (ID_EMPRESA, ID_VACANTE, FECHA_CREACION_VACANTE) VALUES ('$idEmpresa', '$idVacante', CURDATE())";

    // Ejecutar la consulta de inserción en la tabla "empresa_vacante"
    $resultVacanteEmpresa = $pdo->query($sqlVacanteEmpresa);

    // Redireccionar a la página de Mis Vacantes
    header("location: /Empresa/misvacantes.php?id=$idUsuario");
    exit();
}
?>

