<?php
    session_start();
    require_once '../../modelo/conexion.php';
    
    $_SESSION['instituto_id_estado'] = $_POST["instituto_id_estado"];
    $_SESSION['materia_id_estado'] = $_POST["materia_id_estado"];

    header("Location: ../estado/obtenerAlumno.php");    
    exit();
?>