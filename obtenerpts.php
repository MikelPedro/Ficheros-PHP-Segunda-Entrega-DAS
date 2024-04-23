<?php

include 'conexion.php';

$usuario = $_GET['usuario']; // ID del usuario del que se quieren recuperar los puntos

// Consulta SQL para recuperar los puntos del usuario
$sql = "SELECT ptsGlobal FROM usuarios WHERE nombre = '$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Al existir usuario, se obtienen los puntos
    $row = $result->fetch_assoc();
    $ptsGlobal = $row["ptsGlobal"];
    echo $ptsGlobal;
} else {
    echo "Usuario no encontrado";
}

?>
