<?php
    session_start();
    require_once "../../modelo/conexion.php";
    require_once "../../class/Nota.php";

    header('Content-Type: application/json');

    if (isset($_POST['alumno_id'])) {        
        $alumno_id = $_POST['alumno_id'];
        $materia_id = $_SESSION['materia'];
        $notaEliminada = $notas->borrarNota($alumno_id, $materia_id);

        if ($notaEliminada) {
            echo json_encode(['success' => true, 'message' => 'Nota borrada con éxito']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al borrar la nota']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ID del alumno no proporcionado']);
    }
?>