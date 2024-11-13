<?php

    class Alumno {
        private $conexion;
        public $id;
        public $apellido;
        public $nombre;
        public $dni;
        public $fecha_nacimiento;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function obtenerAlumnos() {
            $sql = $this->conexion->query("SELECT * FROM alumnos");
            $alumnos = [];
        
            while ($datos = $sql->fetch_object()) {
                $alumnos[] = $datos;
            }
        
            return $alumnos;
        }

        public function crearAlumno($nombre, $apellido, $fc, $dni, $materia_id){
            $sql = "INSERT INTO alumnos (nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, dni_alumno, materia_id) VALUES (?,?,?,?,?)";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("sssii", $nombre, $apellido, $fc, $dni, $materia_id);
            return $stmt->execute();
        }

        public function obtenerAlumnosPorMateria($materia_id){
            $sql = "SELECT * FROM alumnos  WHERE materia_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $materia_id);
            $stmt->execute();
            
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function editarAlumno($id, $nombre, $apellido, $fc, $dni, $materia_id){
            $sql = "UPDATE alumnos SET nombre_alumno = ?, apellido_alumno = ?, fecha_nacimiento_alumno = ?, dni_alumno = ?, materia_id = ? WHERE alumno_id = ?";            
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("sssiii", $nombre, $apellido, $fc, $dni, $materia_id, $id);
            return $stmt->execute();        
        }

        public function eliminarAlumno($id){
            $sql = "DELETE FROM alumnos WHERE alumno_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i",$id);
            return $stmt->execute();
        }
    }
    $alumnos = new Alumno($conexion);