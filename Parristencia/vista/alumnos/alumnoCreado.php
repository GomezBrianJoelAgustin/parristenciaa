<?php

    require_once "../../modelo/conexion.php";
    require_once "../../class/Alumno.php";

    $response = array('success' => false, 'message' => '');

    $nombre_alumno = $_POST['nombre_alumno'];
    $apellido_alumno = $_POST['apellido_alumno'];
    $fecha_nacimiento_alumno = $_POST['fecha_nacimiento_alumno'];
    $dni_alumno = $_POST['dni_alumno'];
    $materia_id = $_POST['materia_id'];
    
    $crearAlumno = $alumnos->crearAlumno($nombre_alumno, $apellido_alumno, $fecha_nacimiento_alumno, $dni_alumno, $materia_id);

    if ($crearAlumno) {
        $response['succes']= true;
        $response['message'] = 'Alumno creado con éxito.';
    }else{
        $response['message'] = 'Error al crear el alumno.';
    }
    
    header('Content-Type: application/json');
    echo json_encode($response);
    header('location: seleccionarMateria.php');
