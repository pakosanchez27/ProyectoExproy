<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../include/config.php';

$idUsuario = $_GET['id'] ?? null;
$idVacante = $_GET['idVacante'] ?? null;
$IdEmpresa = $_GET['idEmpresa'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){


    $TITULO = $_POST['nombreVacante'];
    $DESCRIPCION = $_POST['descripcion'];
    $SALARIO = $_POST['salario'];
    $CIUDAD = $_POST['ciudad'];
    $ESTADO = $_POST['estado'];
    $AREA = $_POST['area'];
    $PUESTO = $_POST['puesto'];
    $EDUCACION = $_POST['educacion'];
    $TIPO_CONTRATO = $_POST['tipoContrato'];
    $HORARIO = $_POST['horario'];
    $MODO_TRABAJO = $_POST['modoTrabajo'];
    $VENCIMIENTO = $_POST['vencimiento'];
    $NUMERO_VACANTES = $_POST['vacantesDisponibles'];
  
    
 $updateVacante = "UPDATE VACANTE SET 
 TITULO = '$TITULO',
 DESCRIPCION = '$DESCRIPCION',
 SALARIO = '$SALARIO',
 CIUDAD = '$CIUDAD',
 ESTADO = '$ESTADO',
 AREA = '$AREA',
 PUESTO = '$PUESTO',
 EDUCACION = '$EDUCACION',
 TIPO_CONTRATO = '$TIPO_CONTRATO',
 HORARIO = '$HORARIO',
 MODO_TRABAJO = '$MODO_TRABAJO',
 VENCIMIENTO = '$VENCIMIENTO',
 NUMERO_VACANTES = '$NUMERO_VACANTES'
 WHERE ID_VACANTE = $idVacante";

 $result = $pdo->query($updateVacante);

 header("Location: /Empresa/vacanteDetalle.php?id=$idUsuario&idVacante=$idVacante&idEmpresa=$IdEmpresa");
   
}


?>