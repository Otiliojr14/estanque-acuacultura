<?php 

	if (isset($_POST['login-user'])) {
		$usuario = $_POST['user'];
		$password = $_POST['password'];

		try {
			include_once 'funciones/funciones.php';
			$stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?;");
			$stmt->bind_param("s", $usuario);
			$stmt->execute();
			$stmt->bind_result($id_user, $user, $nombre_user, $apellido_user, $password_user, $privilegio_user);
			if ($stmt->affected_rows) {
				$existe = $stmt->fetch();
				if ($existe) {
					if (password_verify($password, $password_user)) {
						session_start();
						$_SESSION['usuario'] = $user;
						$_SESSION['nombre'] = $nombre_user;
						$_SESSION['privilegio'] = $privilegio_user;
						$respuesta = array(
						'respuesta' => 'exito',
						'usuario' => $nombre_user
						);
					} else{
						$respuesta = array(
						'respuesta' => 'error'
						);
					}
					
				} else {
					$respuesta = array(
						'respuesta' => 'error'
					);
				}
			}
			$stmt->close();
			$conn->close();
		} catch (Exception $e) {
			echo "Error: " . $e->getMessage();
		}
		die(json_encode($respuesta));
	}
