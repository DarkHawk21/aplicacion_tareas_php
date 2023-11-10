<?php
    require_once "../conexion.php";

    $sql = "SELECT * FROM tareas";
    $query = $mysqli->query($sql);

    $arregloTareas = [];

    while($tarea = $query->fetch_assoc()) {
        $arregloTareas[] = $tarea;
    }

    echo json_encode($arregloTareas);