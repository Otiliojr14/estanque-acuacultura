<?php 

	include_once 'funciones/funciones.php';
	
	if ($_POST['registro'] == 'nuevo') {
		$nombre = $_POST['nombre_estanque'];
		$bomba = (int) $_POST['bomba'];
		$tipo_estanque = $_POST['tipo_estanque'];
		$profundidad = (float) $_POST['profundidad'];
		$l_may_r = (float) $_POST['l_may_r'];
		$l_men = (float) $_POST['l_men'];
		
		try {
			$stmt = $conn->prepare("INSERT INTO estanque (nombre, id_bomba, tipo_estanque, profundidad, l_mayor_r, l_menor) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->bind_param("sisddd", $nombre, $bomba, $tipo_estanque, $profundidad, $l_may_r, $l_men);
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
		$nombre = $_POST['nombre_estanque'];
		$bomba = (int) $_POST['bomba'];
		$tipo_estanque = $_POST['tipo_estanque'];
		$profundidad = (float) $_POST['profundidad'];
		$l_may_r = (float) $_POST['l_may_r'];
		$l_men = (float) $_POST['l_men'];
		$id_registro = (int) $_POST['id_registro'];
		try {
			$stmt = $conn->prepare('UPDATE estanque SET nombre = ?, id_bomba = ?, tipo_estanque = ?, profundidad = ?, l_mayor_r = ?, l_menor = ? WHERE id_estanque = ? ');
			$stmt->bind_param("sisdddi", $nombre, $bomba, $tipo_estanque, $profundidad, $l_may_r, $l_men, $id_registro);
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
			$stmt = $conn->prepare('DELETE FROM estanque WHERE id_estanque = ? ');
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