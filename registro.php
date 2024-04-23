<?php
include 'conexion.php'; 

// Recibir datos del formulario
$nombre_usuario = $_GET['nombre'];
$contraseña = $_GET['contraseña'];
//Se hashea la contraseña para mayor seguridad
$contra_hash = password_hash($contraseña, PASSWORD_BCRYPT);

// Se verifica	si el nombre de usuario ya existe
$sql_check = "SELECT nombre FROM usuarios WHERE nombre = '$nombre_usuario'";
$result_check = $conn->query($sql_check);

if ($result_check->num_rows > 0) {
	echo "usuario_existe";
} else {
	// Consulta SQL para insertar nuevo usuario
	$sql_insert = "INSERT INTO usuarios (nombre, contraseña) VALUES ('$nombre_usuario', '$contra_hash')";

	if ($conn->query($sql_insert) === TRUE) {
		echo "registro_exitoso";
	} else {
		echo "error_registro";
	}
}

?>
