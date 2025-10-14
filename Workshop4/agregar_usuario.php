<?php
session_start();
include "conexion.php";
if ($_SESSION['rol'] !== 'admin') { header("Location: opciones.php"); exit; }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);
    $rol = $_POST['rol'];

    $sql = "INSERT INTO usuarios (nombre, apellido, usuario, password, rol, estado) 
            VALUES ('$nombre','$apellido','$usuario','$password','$rol','activo')";
    if ($conn->query($sql)) {
        echo "Usuario agregado correctamente. <a href='opciones.php'>Volver</a>";
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<h2>Agregar Usuario</h2>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Apellido: <input type="text" name="apellido" required><br>
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="password" required><br>
    Rol: 
    <select name="rol">
        <option value="normal">Normal</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">Agregar</button>
</form>

</body>
</html>
