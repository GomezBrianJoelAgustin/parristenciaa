<?php
    session_start();
    require_once '../../modelo/conexion.php';
    
    $_SESSION['instituto_id'] = $_POST["instituto_id"];
    $_SESSION['materia_id'] = $_POST["materia_id"];

    header("Location: ../asistencia/asistencia.php");    
    exit();
?>