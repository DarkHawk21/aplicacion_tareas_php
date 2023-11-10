<?php
	$mysqli = new mysqli(
        'localhost',
        'root',
        '',
        'tareas_app'
    );

	if ($mysqli->connect_errno) {
		echo "Error al conectarse con MySQL debido al error ".$mysqli->connect_error."<br>";
		die();
	}

	date_default_timezone_set("America/Mexico_City");