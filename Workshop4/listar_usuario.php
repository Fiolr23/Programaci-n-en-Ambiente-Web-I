<?php
session_start();
include "conexion.php";

$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
?>

<h2>Listado de Usuarios</h2>
<link rel="stylesheet" href="estilos.css">
<table border="1">
<tr>
    <th>ID</th><th>Nombre</th><th>Apellido</th><th>Usuario</th><th>Rol</th><th>Estado</th>
</tr>
<?php while($row = $res->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['nombre']; ?></td>
    <td><?php echo $row['apellido']; ?></td>
    <td><?php echo $row['usuario']; ?></td>
    <td><?php echo $row['rol']; ?></td>
    <td><?php echo $row['estado']; ?></td>
</tr>
<?php endwhile; ?>
</table>

<a href="opciones.php">Volver</a>

