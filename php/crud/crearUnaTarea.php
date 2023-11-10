<?php
    require_once "../conexion.php";

    $nombre = $_POST['input_nombre'];
    $descripcion = $_POST['input_descripcion'];
    $estatusId = $_POST['input_status'];
    $prioridadId = $_POST['input_prioridad'];
    $creacion = date("Y-m-d H:i:s");
    $actualizacion = date("Y-m-d H:i:s");

    $sql = "INSERT INTO tareas (
        nombre,
        descripcion,
        prioridad_id,
        estatus_id,
        created_at,
        updated_at
    ) VALUES (
        '$nombre',
        '$descripcion',
        $prioridadId,
        $estatusId,
        '$creacion',
        '$actualizacion'
    )";

    $query = $mysqli->query($sql);

    echo json_encode([
        'success' => true
    ]);