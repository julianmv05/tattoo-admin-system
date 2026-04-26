<?php
include("conexion.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre  = $_POST['nombre_cliente'] ?? '';
    $telefono = $_POST['telefono'] ?? '';
    $artista = $_POST['tatuador'] ?? ''; 
    $zona    = $_POST['zona'] ?? '';
    $fecha   = $_POST['fecha'] ?? '';
    $pago    = $_POST['metodo_pago'] ?? '';

    if (empty($nombre) || empty($artista) || empty($fecha)) {
        echo "Por favor, llena los campos obligatorios (Nombre, Tipo de Tatuaje y Fecha).";
        exit();
    }

    $sql = "INSERT INTO citas (nombre_cliente, telefono, tatuador, zona, fecha, metodo_pago) 
            VALUES ('$nombre', '$telefono', '$artista', '$zona', '$fecha', '$pago')";


    if (mysqli_query($conexion, $sql)) {
        echo "<div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>";
        echo "<h2>¡Cita registrada correctamente!</h2>";
        echo "<p>El cliente <strong>$nombre</strong> ha sido agendado para el <strong>$fecha</strong>.</p>";
        echo "<br><a href='formulario.html' style='text-decoration: none; color: white; background: #27ae60; padding: 10px 20px; border-radius: 5px;'>Registrar otra cita</a>";
        echo "</div>";
    } else {
        echo "Error al registrar en la base de datos: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);

} else {
    echo "Acceso no permitido";
}
?>