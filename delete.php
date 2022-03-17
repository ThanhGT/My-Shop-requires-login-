<?php

	include('config.php');
	include('session.php');

	$id = $_GET['id'];

	$sql = "DELETE FROM `orders` WHERE `orders`.`order_id` = $id";

	$db->query($sql);

	if($db->error){
		header('location: dashboard.php?deleted=0');
	}
	else{
		header('location: dashboard.php?deleted=1');
	}