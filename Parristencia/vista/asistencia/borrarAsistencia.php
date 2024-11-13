<?php

    require_once '../../modelo/conexion.php'; 
    require_once '../../class/Asistencia.php'; 

    $response = array('success' => false, 'message' => '');

    $alumno_id = $_POST['alumno_id'];

    if ($asistencia->borrarAsistencia($alumno_id)) {
        $response['success'] = true;
        $response['message'] = 'Asistencia borrada con éxito.';
    } else {
        $response['message'] = 'Error al borrar la asistencia.';
    }

    header('Content-Type: application/json');
    echo json_encode($response);
