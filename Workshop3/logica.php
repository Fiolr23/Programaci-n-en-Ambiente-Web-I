<?php
include "conexion.php";

/*
Contiene la lógica de negocio:
Obtener la lista de provincias desde la base de datos.
Registrar un nuevo usuario en la tabla usuarios.
*/

function obtenerProvincias() {
    $conn = crearConexion();
    $query = "SELECT id, nombre FROM provincias";
    $result = $conn->query($query);
    $provincias = [];

    while ($row = $result->fetch_assoc()) {
        $provincias[] = $row;
    }

    $conn->close();
    return $provincias;
}

function registrarUsuario($nombre, $apellido, $provincia) {
    $conn = crearConexion();
    $sql = "INSERT INTO usuarios (nombre, apellido, provincia)
            VALUES ('$nombre', '$apellido', '$provincia')";

    $resultado = $conn->query($sql);
    $conn->close();
    return $resultado;
}
?>
