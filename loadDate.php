<?php
	include 'db.php';
	$startFrom = $_POST['startFrom'];
	$res = select("SELECT * FROM `list_article` ORDER BY `date` DESC LIMIT  10,10");
	echo json_encode($res);
?>