<?php
    require_once "../conexion.php";

    $tareaId = $_GET['tarea_id'];

    $sql = "SELECT * FROM tareas WHERE id = $tareaId LIMIT 0,1";
    $query = $mysqli->query($sql);

    echo json_encode($query->fetch_object());