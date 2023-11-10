<?php
	$mysqli = new mysqli(
        'l0ebsc9jituxzmts.cbetxkdyhwsb.us-east-1.rds.amazonaws.com',
        'l0s712u1fq67vgif',
        'kbfmvy2l5uqm7tlb',
        'zjlihp5zmsiyd8w9'
    );

	if ($mysqli->connect_errno) {
		echo "Error al conectarse con MySQL debido al error ".$mysqli->connect_error."<br>";
		die();
	}

	date_default_timezone_set("America/Mexico_City");