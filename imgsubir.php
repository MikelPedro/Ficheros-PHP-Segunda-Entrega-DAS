<?php

include 'conexion.php';

    // Recibir datos del formulario
    $nombre_usuario = $_GET['nombre'];
    $imagen64  = $_GET['foto64'];

    $sql = "UPDATE usuarios SET imagen='$imagen64' WHERE nombre='$nombre_usuario'";
       $resultado = $conn->query($sql);

                if ($resultado) {
                        echo "success";
                } else {
                        echo "failure";
		}
    $conn->close();

?>
