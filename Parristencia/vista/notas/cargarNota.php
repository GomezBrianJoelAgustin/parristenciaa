<?php
session_start();
require_once "../../modelo/conexion.php";
require_once "../../class/Nota.php";

if (isset($_POST['alumno_id'], $_POST['nota1'], $_POST['nota2'], $_POST['nota3'])) {
    $alumnoId = $_POST['alumno_id'];
    $materiaId = $_SESSION['materia'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $nota3 = $_POST['nota3'];

    if ($nota1 < 0 || $nota1 > 10 || 
        $nota2 < 0 || $nota2 > 10 || 
        $nota3 < 0 || $nota3 > 10) {
        echo json_encode(['success' => false, 'message' => 'Las notas deben estar entre 0 y 10.']);
        exit();
    }

    $notasCargadas = $notas->asignarNota($alumnoId, $materiaId, $nota1, $nota2, $nota3);

    echo json_encode(['success' => true, 'message' => 'Nota registrada']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al registrar la nota']);
}

header('Content-Type: application/json');
?>