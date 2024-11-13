<?php
    class Asistencia {
        private $conexion;
        public $id;
        public $alumno_id;
        public $materia_id;
        public $fecha;


        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function registrarAsistencia($alumnoId, $materiaId, $fecha) {
            $sql = "SELECT COUNT(*) FROM asistencias WHERE alumno_id = ? AND materia_id = ? AND fecha = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("iis", $alumnoId, $materiaId, $fecha);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
        
            if ($count > 0) {
                return false; 
            }else{
                $stmt->close();
                $sql = "INSERT INTO asistencias (alumno_id, materia_id, fecha) VALUES ( ?, ?, ?)";
                $stmt = $this->conexion->prepare($sql);
                $stmt->bind_param("iis", $alumnoId, $materiaId, $fecha);
                return $stmt->execute();
            }
        }

        public function mostrarAlumnosPresentes($array) {
            $hoy = date('Y-m-d');
            $placeholders = implode(',', array_fill(0, count($array), '?'));
            $sql = "SELECT al.*, a.fecha FROM alumnos al INNER JOIN asistencias a ON al.alumno_id = a.alumno_id WHERE al.alumno_id IN ($placeholders) AND a.fecha = ?";
            $stmt = $this->conexion->prepare($sql);
            $types = str_repeat('i', count($array)) . 's'; 
            $params = array_merge($array, [$hoy]);
            $stmt->bind_param($types, ...$params); 
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        public function borrarAsistencia($alumno_id) {
            $sql = "DELETE FROM asistencias WHERE alumno_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i", $alumno_id);
            
            return $stmt->execute();
        }

        public function mostrarPorcentajeAsitencia($alumno_id, $materia_id, $dias){
            $sql = "SELECT COUNT(DISTINCT fecha) as total_asistencia FROM asistencias WHERE alumno_id = ? AND materia_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ii", $alumno_id, $materia_id); 
            $stmt->execute();
            $resultado = $stmt->get_result();
            $row = $resultado->fetch_assoc();
            $total_asistencias = $row['total_asistencia'];

            if ($dias > 0) {
                $porcentaje = ($total_asistencias / $dias) * 100;
                return round($porcentaje, 2);
            } else {
                return 0;
            }
        }
    }

    $asistencia = new Asistencia($conexion);