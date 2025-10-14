<?php 
session_start();
include "conexion.php";

// Verificar sesión activa
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

// Consultar todos los usuarios
$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>

<h1>Bienvenido <?php echo $_SESSION['usuario']; ?> (<?php echo $_SESSION['rol']; ?>)</h1>

<?php if ($_SESSION['rol'] === 'admin'): ?>
    <div class="botones-admin">
        <a class="btn" href="agregar_usuario.php">
            <i class="fa-solid fa-user-plus"></i> Agregar Usuario
        </a>
        <a class="btn" href="listar_usuario.php">
            <i class="fa-solid fa-users"></i> Ver Listado de Usuarios
        </a>
    </div>
<?php endif; ?>

<br>

<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Usuario</th>
        <th>Rol</th>
        <th>Estado</th>
        <?php if ($_SESSION['rol'] === 'admin'): ?>
            <th>Acciones</th>
        <?php endif; ?>
    </tr>

    <?php while($row = $res->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['nombre']); ?></td>
            <td><?php echo htmlspecialchars($row['apellido']); ?></td>
            <td><?php echo htmlspecialchars($row['usuario']); ?></td>
            <td><?php echo htmlspecialchars($row['rol']); ?></td>
            <td><?php echo htmlspecialchars($row['estado']); ?></td>

            <?php if ($_SESSION['rol'] === 'admin'): ?>
                <td>
                    <?php if ($row['id'] != 1): ?>
                        <?php if ($row['estado'] == 'activo'): ?>
                            <a href="editar_usuario.php?id=<?php echo $row['id']; ?>">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a> |
                            <a href="deshabilitar_usuario.php?id=<?php echo $row['id']; ?>" 
                               onclick="return confirm('¿Seguro que deseas deshabilitar este usuario?');">
                                <i class="fa-solid fa-user-slash"></i> Deshabilitar
                            </a> |
                            <a href="eliminar_usuario.php?id=<?php echo $row['id']; ?>" 
                               onclick="return confirm('¿Seguro que deseas eliminar este usuario? Esta acción no se puede deshacer.');">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </a>
                        <?php else: ?>
                            (Usuario deshabilitado)
                        <?php endif; ?>
                    <?php else: ?>
                        (Admin principal)
                    <?php endif; ?>
                </td>
            <?php endif; ?>
        </tr>
    <?php endwhile; ?>
</table>

<br>
<a href="salir.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>

</body>
</html>

