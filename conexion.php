<?php
$conexion = mysqli_connect("localhost", "root", "root", "estudio_tatuajes");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>