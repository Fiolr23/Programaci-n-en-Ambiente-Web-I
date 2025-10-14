<?php
session_start();
include "conexion.php";
if ($_SESSION['rol'] !== 'admin') { header("Location: opciones.php"); exit; }

// Si viene un id por GET, traemos los datos del usuario
$usuarioData = null;
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM usuarios WHERE id=$id";
    $res = $conn->query($sql);
    if ($res && $res->num_rows == 1) {
        $usuarioData = $res->fetch_assoc();
    }
}

// Si envían el formulario por POST, actualizamos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    if ($id == 1) {
        echo "No se puede editar al usuario administrador principal. <a href='listar_usuario.php'>Volver</a>";
        exit;
    }

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuarios 
            SET nombre='$nombre', apellido='$apellido', usuario='$usuario', rol='$rol' 
            WHERE id=$id";

    if ($conn->query($sql)) {
        echo "Usuario editado correctamente. <a href='listar_usuario.php'>Volver</a>";
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
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<h2>Editar Usuario</h2>

<?php if ($usuarioData): ?>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $usuarioData['id']; ?>">

    Nombre: <input type="text" name="nombre" value="<?php echo $usuarioData['nombre']; ?>" required><br>
    Apellido: <input type="text" name="apellido" value="<?php echo $usuarioData['apellido']; ?>" required><br>
    Usuario: <input type="text" name="usuario" value="<?php echo $usuarioData['usuario']; ?>" required><br>
    Rol:
    <select name="rol">
        <option value="normal" <?php if($usuarioData['rol']=='normal') echo 'selected'; ?>>Normal</option>
        <option value="admin" <?php if($usuarioData['rol']=='admin') echo 'selected'; ?>>Admin</option>
    </select><br>

    <button type="submit">Guardar Cambios</button>
</form>
<?php else: ?>
    <p>No se encontró el usuario. Revisa el <a href="listar_usuario.php">listado</a>.</p>
<?php endif; ?>

</body>
</html>





