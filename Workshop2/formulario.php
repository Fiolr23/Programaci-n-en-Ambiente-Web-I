<?php
include "conexion.php"; // Se importa la conexión

// Inicializamos mensaje vacío
$mensaje = "";

// Verificamos si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];

    // Consulta SQL
    $stmt = $conexion->prepare("INSERT INTO contactos (nombre, apellido, correo, telefono) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $apellido, $correo, $telefono);

    // Ejecutar la consulta y redirigir con mensaje
    if ($stmt->execute()) {
        // Redirigir a la misma página con un parámetro de éxito
        header("Location: " . $_SERVER['PHP_SELF'] . "?exito=1");
        exit();
    } else {
        // Redirigir con mensaje de error
        header("Location: " . $_SERVER['PHP_SELF'] . "?error=" . urlencode($stmt->error));
        exit();
    }

    // Cerrar la conexión
    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Estudiantes UTN</title>
    <link rel="stylesheet" href="estilos.css?v=1.0">
</head>
<body>

   <div class="form-container">
        <h1 class="form-title">Formulario para Estudiantes UTN</h1>

        <?php
        // Mostrar mensaje según redirección
        if (isset($_GET['exito'])) {
            echo "<p><strong>Datos insertados correctamente.</strong></p>";
        }
        if (isset($_GET['error'])) {
            echo "<p><strong>Error al insertar datos: " . htmlspecialchars($_GET['error']) . "</strong></p>";
        }
        ?>

        <form action="" method="post">
            <div class="input-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            
            <div class="input-group">
                <label for="apellido">Apellido</label>
                <input type="text" id="apellido" name="apellido" required>
            </div>
            
            <div class="input-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            
            <div class="input-group">
                <label for="telefono">Teléfono</label>
                <input type="tel" id="telefono" name="telefono" required>
            </div>
            
            <div class="separator"></div>
            
            <button type="submit" class="btn-submit">Enviar</button>
        </form>
    </div>
</body>
</html>
