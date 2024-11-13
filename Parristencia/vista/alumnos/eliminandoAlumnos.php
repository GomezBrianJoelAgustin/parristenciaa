<?php
    require_once "../../modelo/conexion.php";
    require_once "../../class/Alumno.php";

    header('Content-Type: application/json');

    if (isset($_POST['alumno_id'])) {        
        $alumno_id = $_POST['alumno_id'];
        $alumnoEliminado = $alumnos->eliminarAlumno($alumno_id);

        if ($alumnoEliminado) {
            echo json_encode(['success' => true, 'message' => 'Alumno borrado con éxito']); 
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al borrar al alumno']); 
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ID del alumno no proporcionado']);
    }
?>