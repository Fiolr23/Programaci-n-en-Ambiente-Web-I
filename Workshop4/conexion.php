<?php
$host = "localhost";
$user = "fiolazo25";     
$pass = "FiOrElLa25";         
$db   = "workshop4";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

