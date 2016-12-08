<?php
	//loadFile();!!!!!

	function loadFile() {

		$title = $_POST['title'];
		$description = htmlspecialchars($_POST['description']);
		$text = htmlspecialchars($_POST['text']);
		$meta_desc = $_POST['meta_desc'];
		$meta_key = $_POST['meta_key'];
		$date = time();

		$uploaddir = './files/';

		$arr = select("SELECT * FROM `list_article`");
		$number = count($arr);

		$uploadfile = $uploaddir.basename("article_$number.jpeg");

		$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
		foreach ($blacklist as $item)
		if(preg_match("/$item\$/i", $_FILES['uploadfile']['name'])) exit;

		$type = $_FILES['uploadfile']['type'];
		if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) exit;
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
		{
			insert($date,$title,$description,$text,$meta_desc,$meta_key,$uploadfile);
		}
		else { return "<h3>Помилка! Не вдалось загрузити файл на сервер! Стаття не добавленна</h3>";}
	}

	function insert($date,$title,$description,$text,$meta_desc,$meta_key,$src) {
		$mysqli = connect();
		$result = $mysqli->query("INSERT INTO `list_article`(`date`, `title`, `description`, `text_article`, `meta_desc`, `meta_key`, `src`) VALUES ('$date', '$title', '$description', '$text', '$meta_desc', '$meta_key', '$src')");
		$mysqli->close();
		if ($result) {
			echo "<h3>Стаття добавленна</h3>";
		}
	}	

	function select($strQuery) {
		$mysqli = connect();
		$res = $mysqli->query($strQuery);
		$array_db = array();
		do {
			$array_db[] = $row;
		} while ($row = $res->fetch_assoc());
		return $array_db;
	}

	function connect() {
		$mysqli = new mysqli ("localhost", "Nick", "qwerty", "articles");
		$mysqli->query("SET NAMES 'utf8'");
		return $mysqli;
	}
?>