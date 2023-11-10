<?php
    require_once "../conexion.php";

    $tareaId = $_POST['input_tarea_id'];

    $sql = "SELECT * FROM tareas WHERE id = $tareaId LIMIT 0,1";
    $query = $mysqli->query($sql);
    $tareaOld = $query->fetch_object();

    $nombre = isset($_POST['input_nombre']) && $_POST['input_nombre'] != ''
        ? $_POST['input_nombre']
        : $tareaOld->nombre;

    $descripcion = isset($_POST['input_descripcion']) && $_POST['input_descripcion'] != ''
        ? $_POST['input_descripcion']
        : $tareaOld->descripcion;

    $estatusId = isset($_POST['input_status']) && $_POST['input_status'] != ''
        ? $_POST['input_status']
        : $tareaOld->estatus_id;

    $prioridadId = isset($_POST['input_prioridad']) && $_POST['input_prioridad'] != ''
        ? $_POST['input_prioridad']
        : $tareaOld->prioridad_id;

    $creacion = $tareaOld->created_at;
    $actualizacion = date("Y-m-d H:i:s");

    $sql = "UPDATE tareas
        SET
            nombre = '$nombre',
            descripcion = '$descripcion',
            prioridad_id = $prioridadId,
            estatus_id = $estatusId,
            created_at = '$creacion',
            updated_at = '$actualizacion'
        WHERE
            id = $tareaId
    ";

    $query = $mysqli->query($sql);

    echo json_encode([
        'success' => true
    ]);