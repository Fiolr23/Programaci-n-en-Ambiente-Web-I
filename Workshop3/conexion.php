<?php
function crearConexion() {
    $host = "localhost";
    $usuario = "fiolazo25";     
    $password = "FiOrElLa25";    
    $base_datos = "base_datos_workshop3";

    $conn = new mysqli($host, $usuario, $password, $base_datos);

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    return $conn;
}
?>


