<?php 

	include_once 'funciones/funciones.php';
	


	if ($_POST['registro'] == 'nuevo') {
		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$password = $_POST['password'];
		$privilegio = (int) $_POST['privilegio_usuario'];
		$opciones = array(
			'cost' => 12
		);

		$password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

		try {
			$stmt = $conn->prepare("INSERT INTO usuarios (usuario, nombre, apellido, password, privilegio) VALUES (?, ?, ?, ?, ?)");
			$stmt->bind_param("ssssi", $usuario, $nombre, $apellido, $password_hashed, $privilegio);
			$stmt->execute();
			$id_registro = $stmt->insert_id;
			if ($id_registro > 0) {
				$respuesta = array(
					'respuesta' => 'exito',
					'id_usuario' => $id_registro
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error'
				);
			}
			
			$stmt->close();
			$conn->close();

		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
		die(json_encode($respuesta));
	}

	if ($_POST['registro'] == 'actualizar') {
		$id_registro = $_POST['id_registro'];
		$usuario = $_POST['usuario'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$password = $_POST['password'];
		$privilegio = (int) $_POST['privilegio_usuario'];
		$opciones = array(
			'cost' => 12
		);

		try {
			$hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
			$stmt = $conn->prepare('UPDATE usuarios SET usuario = ?, nombre = ?, apellido = ?, password = ?, privilegio = ? WHERE id_usuario = ? ');
			$stmt->bind_param("ssssii", $usuario, $nombre, $apellido, $hash_password, $privilegio, $id_registro);
			$stmt->execute();
			if ($stmt->affected_rows) {
				$respuesta = array(
					'respuesta' => 'exito',
					'id_actualizado' => $stmt->insert_id
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error'
				);
			}
			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			$respuesta = array(
				'respuesta' => $e->getMessage()
			);
		}
		die(json_encode($respuesta));
	}

	if ($_POST['registro'] == 'eliminar') {
		$id_borrar = $_POST['id'];
		try {
			$stmt = $conn->prepare('DELETE FROM usuarios WHERE id_usuario = ? ');
			$stmt->bind_param('i', $id_borrar);
			$stmt->execute();
			if ($stmt->affected_rows) {
				$respuesta = array(
					'respuesta' => 'exito',
					'id_eliminado' => $id_borrar
				);
			} else {
				$respuesta = array(
					'respuesta' => 'error'
				);
			}
		} catch (Exception $e) {
			$respuesta = array(
				'respuesta' => $e->getMessage()
			);
		}
		die(json_encode($respuesta));
	}
