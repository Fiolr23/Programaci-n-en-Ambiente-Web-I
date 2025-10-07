<?php
include "logica.php";

/*
Pantalla que muestra el formulario de registro de usuario.
Carga la lista de provincias desde la base de datos.
*/

$provincias = obtenerProvincias();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-box">
    <h1>Registrar de usuario</h1>

    <form action="registrar.php" method="post">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>

        <label>Apellido:</label>
        <input type="text" name="apellido" required>

        <label>Provincia:</label>
        <select name="provincia" required>
            <option value="">Seleccione...</option>
            <?php foreach ($provincias as $prov): ?>
                <option value="<?php echo $prov['nombre']; ?>">
                    <?php echo $prov['nombre']; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Registrar</button>
    </form>
</div>

</body>
</html>




