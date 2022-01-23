<?php 

	include_once 'funciones/funciones.php';
	
	if ($_POST['registro'] == 'nuevo') {
		$nombre = $_POST['nombre_pez'];
		$descripcion = $_POST['descripcion'];
		$t_max = (float) $_POST['t_max'];
		$t_min = (float) $_POST['t_min'];
		$o_max = (float) $_POST['o_max'];
		$o_min = (float) $_POST['o_min'];
		$ph_max = (float) $_POST['ph_max'];
		$ph_min = (float) $_POST['ph_min'];
		
		try {
			$stmt = $conn->prepare("INSERT INTO pez (nombre, descripcion, t_max, t_min, o_max, o_min, ph_max, ph_min) VALUES (?, ?, ?, ?, ?, ?, ?, ?) ");
			$stmt->bind_param("ssdddddd", $nombre, $descripcion, $t_max, $t_min, $o_max, $o_min, $ph_max, $ph_min);
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
		$nombre = $_POST['nombre_pez'];
		$descripcion = $_POST['descripcion'];
		$t_max = (float) $_POST['t_max'];
		$t_min = (float) $_POST['t_min'];
		$o_max = (float) $_POST['o_max'];
		$o_min = (float) $_POST['o_min'];
		$ph_max = (float) $_POST['ph_max'];
		$ph_min = (float) $_POST['ph_min'];
		$id_registro = (int) $_POST['id_registro'];
		try {
			$stmt = $conn->prepare('UPDATE pez SET nombre = ?, descripcion = ?, t_max = ?, t_min = ?, o_max = ?, o_min = ?, ph_max = ?, ph_min = ? WHERE id_pez = ? ');
			$stmt->bind_param("ssddddddi", $nombre, $descripcion, $t_max, $t_min, $o_max, $o_min, $ph_max, $ph_min, $id_registro);
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
			$stmt = $conn->prepare('DELETE FROM pez WHERE id_pez = ? ');
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