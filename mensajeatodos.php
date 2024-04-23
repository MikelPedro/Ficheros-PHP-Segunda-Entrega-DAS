<?php

include 'conexion.php';


// Consulta para obtener los tokens de todos los usuarios con token
$query = "SELECT token FROM tokens";

// Ejecutar la consulta
$result = $conn->query($query);


	if ($result->num_rows > 0) {
		// Crear un array para almacenar los tokens
		$tokens = array();

		// Recorrer los resultados y agregar los tokens al array
		while ($row = $result->fetch_assoc()) {
			$tokens[] = $row['token'];
		}

		// Si hay tokens, enviar el mensaje
		if (!empty($tokens)){
			// Crear el mensaje y enviarlo a los tokens obtenidos
			$message = array(
				'registration_ids' => $tokens,
				'notification' => array(
					'body' => 'Hola! '.$usuario.' alguien quiere que jueges una partida.',
					'title' => 'Aviso de Preguntas',
					'icon' => 'checkbox_on_background',
				)
			);

			// Convertir el mensaje a JSON
			$messageJSON = json_encode($message);

			// Cabeceras de la solicitud HTTP
			$headers = array(
				'Authorization: key=AAAAfsjM2lA:APA91bEoIAUjtMWlWnId5-7cYJhVLMMR8vgvBBz5Ez8rkG8tG4iJ8ZLOnzhuI9UcEiLJtwaYx3oKo2aael9QGUp-uvVveEwMtr9-eMU0tuEbM6UYrCKS19_S6rOSHdELVK7WW0YOQUtp',
				'Content-Type: application/json'
			);

			// Inicializar una nueva solicitud cURL
			$ch = curl_init();

			// Establecer la URL de la solicitud y otras opciones
			curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $messageJSON);

			// Ejecutar la solicitud cURL y obtener la respuesta
			$response = curl_exec($ch);

			// Verificar si hubo errores
			if ($response === false) {
				echo 'Error al enviar la solicitud: ' . curl_error($ch);
			} else {
				// Mostrar la respuesta (puede ser útil para depuración)
				echo $response;
			}
			
			// Cerrar la solicitud cURL
			curl_close($ch);
		} else {
			// No hay tokens asociados al usuario
			echo "No hay tokens asociados al usuario.";
		}

	} else {
		// No se encontraron tokens para el usuario especificado
		echo "No se encontraron tokens para el usuario especificado.";
	}
	
?>
