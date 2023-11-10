<?php
    require_once "../conexion.php";

    $sql = "SELECT * FROM tareas_prioridad";
    $query = $mysqli->query($sql);

    $arregloPrioridades = [];

    while($prioridad = $query->fetch_assoc()) {
        $arregloPrioridades[] = $prioridad;
    }

    echo json_encode($arregloPrioridades);