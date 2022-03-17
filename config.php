<?php

	if(!isset($_SERVER['HTTP_REFERER'])){
		header('location: index.php');
	}

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";

    $db = new mysqli($servername, $username, $password, $dbname);

    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }


?>