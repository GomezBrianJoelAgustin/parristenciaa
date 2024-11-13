<?php
    class Materia {
        private $conexion;
        public $materias_id;
        public $nombre_materias;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function obtenerMaterias() {
            $sql = $this->conexion->query("SELECT * FROM materias");
            $materias = [];
        
            while ($datos = $sql->fetch_object()) {
                $materias[] = $datos;
            }
        
            return $materias;
        }

        public function obtenerMateriasPorInstituto($institutoId) {
            $sql = "SELECT * FROM materias WHERE instituto_id = $institutoId";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute();
            
            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
    }
    $materias = new Materia($conexion); 
