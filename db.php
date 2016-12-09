<?php
	function select($strQuery) {
		$mysqli = connect();
		$res = $mysqli->query($strQuery);
		$array_db = array();
		while ($row = $res->fetch_assoc())
		{
    		$array_db[] = $row;
		}
			
		return $array_db;
	}

	function connect() {
		$mysqli = new mysqli ("localhost", "Nick", "qwerty", "articles");
		$mysqli->query("SET NAMES 'utf8'");
		return $mysqli;
	}
?>