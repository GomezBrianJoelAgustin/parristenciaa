<?php

    class Nota{
        public $nota_id;
        public $alumno_id;
        public $materia_id;
        public $nota1;
        public $nota2;
        public $nota3;
        private $conexion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function asignarNota($alumno_id, $materia_id, $n1, $n2, $n3) {
            $checkSql = "SELECT COUNT(*) FROM notas WHERE alumno_id = ? AND materia_id = ?";
            $checkStmt = $this->conexion->prepare($checkSql);
            $checkStmt->bind_param("ii", $alumno_id, $materia_id);
            $checkStmt->execute();
            $checkStmt->bind_result($count);
            $checkStmt->fetch();
            $checkStmt->close();
        
            if ($count > 0) {
                $updateSql = "UPDATE notas SET nota1 = ?, nota2 = ?, nota3 = ? WHERE alumno_id = ? AND materia_id = ?";
                $updateStmt = $this->conexion->prepare($updateSql);
                $updateStmt->bind_param("iiiii", $n1, $n2, $n3, $alumno_id, $materia_id);
                return $updateStmt->execute();
            } else {
                $insertSql = "INSERT INTO notas (alumno_id, materia_id, nota1, nota2, nota3) VALUES (?, ?, ?, ?, ?)";
                $insertStmt = $this->conexion->prepare($insertSql);
                $insertStmt->bind_param("iiiii", $alumno_id, $materia_id, $n1, $n2, $n3);
                return $insertStmt->execute();
            }
        }
        
        public function borrarNota($alumno_id, $materia_id){
            $sql = "DELETE FROM notas WHERE alumno_id = ? and materia_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ii",$alumno_id, $materia_id);
            return $stmt->execute();
        }

        public function obtenerNotasAlumnos($alumno_id, $materia_id){
            $sql = "SELECT * FROM notas n INNER JOIN alumnos a ON n.alumno_id = a.alumno_id WHERE n.alumno_id = ? AND n.materia_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ii",$alumno_id,$materia_id);
            $stmt->execute();
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
    }

    $notas = new Nota($conexion);