<?php
session_start();
include "conexion.php";

if ($_SESSION['rol'] !== 'admin') {
    header("Location: opciones.php");
    exit;
}

if (!isset($_GET['id'])) {
    echo "No se recibió ningún ID. <a href='opciones.php'>Volver</a>";
    exit;
}

$id = intval($_GET['id']);

// No permitir deshabilitar al admin principal
if ($id == 1) {
    echo "No se puede deshabilitar al usuario administrador principal. <a href='opciones.php'>Volver</a>";
    exit;
}

$sql = "UPDATE usuarios SET estado='deshabilitado' WHERE id=$id";
if ($conn->query($sql)) {
    echo "Usuario deshabilitado correctamente. <a href='opciones.php'>Volver</a>";
} else {
    echo "Error: " . $conn->error;
}
?>
