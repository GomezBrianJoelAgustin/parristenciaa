<?php

    require_once "../../modelo/conexion.php";
    require_once "../../class/Alumno.php";
    require_once "../../class/Materia.php";

    $alumnoId = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $fc = $_POST['fc'];
    $dni = $_POST['dni'];
    $materia = $_POST['materia'];
    
    $fechaConvertida = date("Y-m-d", strtotime($fc));
    $alumnoEditado = $alumnos->editarAlumno($alumnoId, $nombre, $apellido, $fechaConvertida, $dni, $materia);

    header("location: seleccionarMateria.php");
