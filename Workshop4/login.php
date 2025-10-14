<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password' AND estado='activo'";
    $res = $conn->query($sql);

    if ($res && $res->num_rows == 1) {
        $row = $res->fetch_assoc();
        $_SESSION['id'] = $row['id'];
        $_SESSION['usuario'] = $row['usuario'];
        $_SESSION['rol'] = $row['rol'];
        header("Location: opciones.php");
        exit;
    } else {
        $error = "Credenciales inválidas o usuario deshabilitado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
<h2>Iniciar Sesión</h2>
<form method="POST">
    Usuario: <input type="text" name="usuario" required><br>
    Contraseña: <input type="password" name="password" required><br>
    <button type="submit">Ingresar</button>
</form>
<?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>

