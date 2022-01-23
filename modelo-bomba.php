<?php 

	include_once 'funciones/funciones.php';
	
	if ($_POST['registro'] == 'nuevo') {
		$nombre = $_POST['nombre_bomba'];
		$estado = (int) $_POST['estado_bomba'];
		
		try {
			$stmt = $conn->prepare("INSERT INTO bomba_eventos (nombre, estado) VALUES (?, ?)");
			$stmt->bind_param("si", $nombre, $estado);
			$stmt->execute();
			$id_insertado = $stmt->insert_id;
			if ($id_insertado > 0) {
				$respuesta = array(
					'respuesta' => 'exito',
					'id_insertado' => $id_insertado
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
		$nombre = $_POST['nombre_bomba'];
		$estado = (int) $_POST['estado_bomba'];
		$id_registro = (int) $_POST['id_registro'];
		try {
			$stmt = $conn->prepare('UPDATE bomba_eventos SET nombre = ?, estado = ? WHERE id_bomba = ? ');
			$stmt->bind_param("sii", $nombre, $estado, $id_registro);
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
			$stmt = $conn->prepare('DELETE FROM bomba_eventos WHERE id_bomba = ? ');
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