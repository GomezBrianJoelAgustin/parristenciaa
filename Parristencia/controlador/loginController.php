<?php

    session_start();

    if (!empty($_POST["btningresar"])){
        if (!empty($_POST["usuario"]) and !empty($_POST["password"])) {
            $usuario=$_POST["usuario"];
            $password=$_POST["password"];
            $sql=$conexion->query("SELECT * FROM profesores WHERE nombre_profesor='$usuario' and password_profesor='$password'");
            if ($datos=$sql->fetch_object()) {
                $_SESSION['nombre_profesor']=$datos->nombre_profesor;
                $_SESSION['apellido_profesor']=$datos->apellido_profesor;
                header("location: ../../vista/inicio/inicio.php");
            }else{
                echo "El usuario no existe";
            }
        }else{
            echo "Los campos estan vacios";
        }
    }