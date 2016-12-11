<?php
	include 'db.php';
	$startFrom = $_POST['startFrom'];
	$query = sprintf("SELECT * FROM `list_article` ORDER BY `date` DESC LIMIT  %d,9;", $startFrom);
	$res = select($query);
	echo json_encode($res);
?>