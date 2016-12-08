<?php
	print_r($_FILES);

	function insert() {
		$mysqli = new mysqli ("localhost", "Nick", "qwerty", "articles");
		$mysqli->query("SET NAMES 'utf8'");
		$mysqli->query("INSERT INTO `list_article1`(`desc`, `textD`) VALUES ('hurrg','4567')");
		$mysqli->close();
	}
?>