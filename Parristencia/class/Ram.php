<?php 

    class Ram{
        private $conexion;
        public $notaRegular;
        public $notaPromocion;
        public $porcentajeRegular;
        public $porcentajePromocion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function obtenerRam(){
            $sql = "SELECT * FROM ram";
            $ram = [];
            $result = $this->conexion->query($sql);
            if ($result) {
                while ($datos = $result->fetch_object()) {
                    $ram[] = $datos;
                }
            } else {
                echo "Error executing query: " . $this->conexion->error;
            }
            return $ram;
        }

        public function ramPorInstituto($instituto_id){
            $sql = "SELECT * FROM ram WHERE instituto_id = ?";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("i",$instituto_id);
            $stmt->execute();

            return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }
    }

    $ram = new Ram($conexion);