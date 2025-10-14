<?php
session_start();
include "conexion.php";

if ($_SESSION['rol'] !== 'admin') {
    header("Location: opciones.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($id == 1) {
        echo "No se puede eliminar el usuario administrador principal. <a href='opciones.php'>Volver</a>";
        exit;
    }

    $sql = "DELETE FROM usuarios WHERE id=$id";
    if ($conn->query($sql)) {
        echo "Usuario eliminado correctamente. <a href='opciones.php'>Volver</a>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "No se recibió ningún ID. <a href='opciones.php'>Volver</a>";
}
?>




