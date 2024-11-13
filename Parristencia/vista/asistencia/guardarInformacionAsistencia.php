<?php
    session_start();
    date_default_timezone_set('America/Argentina/Buenos_Aires'); 
    require_once '../../modelo/conexion.php';
    require_once '../../class/Asistencia.php'; 
    
    $_SESSION['checkAsistencia'] = $_POST["checkAsistencia"];
    $asistencia = new Asistencia($conexion); 
    $fecha = date('Y-m-d'); 
    $materiaId = $_SESSION['materia_id']; 
    
    $_SESSION['fecha'] = $fecha;
    
    foreach ($_SESSION['checkAsistencia'] as $alumnoId) {
        $asistencia->registrarAsistencia($alumnoId, $materiaId, $fecha); 

    }
    
    header("location:asistenciaExitosa.php");
    exit();
?>