<?php
$host = "localhost"; // Servidor de la base de datos
$usuario = "root";   // Usuario de la base de datos
$password = ""; // Se cambia si hay una contraseña
$base_de_datos = "base_datos_workshop2"; // Nombre de la base de datos

// Se crea la conexión
$conexion = new mysqli($host, $usuario, $password, $base_de_datos);

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error); // Si hay error, muestra mensaje y detiene ejecución
}
?> 
