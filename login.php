<?php
include 'conexion.php';

// Recibir datos del formulario
$nombre_usuario = $_GET['nombre'];
$contraseña = $_GET['contraseña'];

// Consulta SQL para obtener la contraseña almacenada en la base de datos para el usuario dado
$sql = "SELECT contraseña FROM usuarios WHERE nombre='$nombre_usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se encontró el usuario en la base de datos
    $row = $result->fetch_assoc();
    $contraseña_bd = $row['contraseña'];

    // Verificar si la contraseña proporcionada coincide con la almacenada en la base de datos
    if (password_verify($contraseña, $contraseña_bd)) {
        echo "Inicio de sesión exitoso";
    } else {
        echo "Usuario o contraseña incorrectos";
    }
} else {
    echo "Usuario o contraseña incorrectos";
}
?>
