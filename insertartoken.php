<?php

include 'conexion.php';

$nombreUsuario = $_GET['nombreUsuario'];
$token = $_GET['token'];

// Preparar la consulta SQL para insert
$query = "INSERT INTO tokens (nombre, token) VALUES ('$nombreUsuario', '$token')";

// Ejecutar la consulta
if ($conn->query($query) === TRUE) {
    echo "Nuevo registro insertado correctamente";
} else {
    echo "Error al insertar el registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();

?>
