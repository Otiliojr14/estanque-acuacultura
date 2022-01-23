<?php 

  include_once 'funciones/funciones.php';
  
  if ($_POST['registro'] == 'nuevo') {
    $nombre = $_POST['nombre_cultivo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin =  $_POST['fecha_fin'];
    $estanque = (int) $_POST['estanque'];
    $pez = (int) $_POST['pez'];
    $p_lectura = (int) $_POST['p_lectura'];
    $fecha_inicio_formateada = date('Y-m-d', strtotime($fecha_inicio));
    $fecha_fin_formateada = date('Y-m-d', strtotime($fecha_fin));
    
    try {
      $stmt = $conn->prepare("INSERT INTO cultivo (nombre, des_cultivo, f_inicio, f_fin, id_estanque, id_pez, p_lectura) VALUES (?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssiii", $nombre, $descripcion, $fecha_inicio_formateada, $fecha_fin_formateada, $estanque, $pez, $p_lectura);
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
    $nombre = $_POST['nombre_cultivo'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin =  $_POST['fecha_fin'];
    $estanque = (int) $_POST['estanque'];
    $pez = (int) $_POST['pez'];
    $p_lectura = (int) $_POST['p_lectura'];
    $fecha_inicio_formateada = date('Y-m-d', strtotime($fecha_inicio));
    $fecha_fin_formateada = date('Y-m-d', strtotime($fecha_fin));
    $id_registro = (int) $_POST['id_registro'];

    try {
      $stmt = $conn->prepare('UPDATE cultivo SET nombre = ?, des_cultivo = ?, f_inicio = ?, f_fin = ?, id_estanque = ?, id_pez = ?, p_lectura = ? WHERE id_cultivo = ? ');
      $stmt->bind_param("ssssiiii", $nombre, $descripcion, $fecha_inicio_formateada, $fecha_fin_formateada, $estanque, $pez, $p_lectura, $id_registro);
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
      $stmt = $conn->prepare('DELETE FROM cultivo WHERE id_cultivo = ? ');
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