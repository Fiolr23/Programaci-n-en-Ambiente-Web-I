<?php

/*
Pantalla de login.
Recibe el nombre de usuario desde registrar.php
y lo muestra en un campo de texto bloqueado.
*/

$nombre_usuario = isset($_POST['username']) ? $_POST['username'] : "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="form-box">
    <h1>Login</h1>

    <form action="form.php" method="post">
        <label>Nombre de Usuario:</label>
        <input type="text" name="username" value="<?php echo $nombre_usuario; ?>" readonly>
        <button type="submit">Ingresar otro usuario</button>
    </form>
</div>

</body>
</html>






