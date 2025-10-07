<?php

/*
Procesa el formulario de registro.
Inserta los datos del usuario en la base de datos
y redirige a login.php enviando el nombre del usuario.
*/

include "logica.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$provincia = $_POST['provincia'];

if (registrarUsuario($nombre, $apellido, $provincia)) {
    echo "
    <form id='redirigir' action='login.php' method='post'>
        <input type='hidden' name='username' value='$nombre'>
    </form>
    <script>
        document.getElementById('redirigir').submit();
    </script>
    ";
} else {
    echo 'Error al insertar usuario.';
}
?>





