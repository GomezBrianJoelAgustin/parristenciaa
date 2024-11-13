<?php

    class Instituto {
        private $conexion;
        public $id;
        public $CUE;
        public $nombre;
        public $direccion;

        public function __construct($conexion) {
            $this->conexion = $conexion;
        }

        public function obtenerInstitutos() {
            $sql = $this->conexion->query("SELECT * FROM institutos");
            $institutos = [];
        
            while ($datos = $sql->fetch_object()) {
                $institutos[] = $datos;
            }
        
            return $institutos;
        }
    }

    $instituto = new Instituto($conexion);
