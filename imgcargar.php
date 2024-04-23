<?php

include 'conexion.php';

$nombre = $_GET['nombre'];

$sql = "SELECT imagen FROM usuarios WHERE nombre=?";

// preparar resultado

$res = $conn->prepare($sql);
$res->bind_param("s",$nombre);
$res->execute();

//obtener resultado
$res->store_result();
$res->bind_result($imagen);
$res->fetch();
echo base64_decode($imagen);
$conn->close();
        
?>
      
