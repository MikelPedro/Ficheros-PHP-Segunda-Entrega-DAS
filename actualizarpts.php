<?php

include 'conexion.php';

$usuario = $_GET['usuario']; 
$ptsGlobal = $_GET['ptsGlobal']; 

// Actualizar los puntos del usuario
$sql = "UPDATE usuarios SET ptsGlobal = ptsGlobal + '$ptsGlobal' WHERE nombre = '$usuario'";

if ($conn->query($sql) === TRUE) {
    echo "Puntos actualizados correctamente";
} else {
    echo "Error al actualizar puntos: " . $conn->error;
}

?>
