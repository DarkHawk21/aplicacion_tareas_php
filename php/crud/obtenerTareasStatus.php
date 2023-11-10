<?php
    require_once "../conexion.php";

    $sql = "SELECT * FROM tareas_status";
    $query = $mysqli->query($sql);

    $arregloStatus = [];

    while($status = $query->fetch_assoc()) {
        $arregloStatus[] = $status;
    }

    echo json_encode($arregloStatus);