<?php
    require_once "../conexion.php";

    $tareaId = $_GET['tarea_id'];

    $sql = "DELETE FROM tareas WHERE id = $tareaId";
    $query = $mysqli->query($sql);

    echo json_encode([
        'success' => true
    ]);