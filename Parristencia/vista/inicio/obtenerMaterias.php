<?php
require_once "../../modelo/conexion.php";
require_once "../../class/Materia.php";

    $instituto_id = $_POST['instituto_id'];
    $materia = $materias->obtenerMateriasPorInstituto($instituto_id);
    echo json_encode($materia);
?>