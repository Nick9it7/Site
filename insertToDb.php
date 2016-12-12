<!DOCTYPE html>
<html lang="ua">
  <head>
  	<?php require_once "db.php" ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Результат</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <h1 class="col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">Довідник PHP</h1>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="navbar navbar-inverse">
              <ul class="nav navbar-nav">
                  <li class="col-md-push-2 col-lg-push-3 col-sm-push-1 col-xs-push-1 menu"><a class="glyphicon glyphicon-home" href="index.php"> Головна</a></li>
                  <li class="col-md-push-2 col-lg-push-3 col-sm-push-1 col-xs-push-1 menu"><a class="glyphicon glyphicon-plus" href="articles_form.php"> Добавити статтю</a></li>
              </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row form-content">
		<?php
			loadFile();
			
			function loadFile() {

				$title = $_POST['title'];
				$description = $_POST['description'];
				$text = htmlspecialchars($_POST['text']);
				$date = time();

				$uploaddir = './files/';
				$type = $_FILES['uploadfile']['type'];
				$ERR = "<h3 class='h3-add'>Помилка! Не вдалось загрузити файл на сервер! Стаття не добавлена!</h3>";

				$arr = select("SELECT * FROM `list_article`");
				$number = count($arr)+1;

				$uploadfile = $uploaddir.basename("article_$number.jpeg");

				$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
				foreach ($blacklist as $item)
				if(preg_match("/$item\$/i", $_FILES['uploadfile']['name'])) { echo $ERR; exit;}

				
				if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png")) { echo $ERR; exit;}
				if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $uploadfile))
				{
					insert($date, $title, $description, $text, $uploadfile);
				}
				else { echo $ERR;}
			}

			function insert($date, $title, $description, $text, $src) {
				$mysqli = connect();
				$result = $mysqli->query("INSERT INTO `list_article`(`date`, `title`, `description`, `text_article`, `src`) VALUES ('$date', '$title', '$description', '$text', '$src')");
				$mysqli->close();
				if ($result) {
					echo "<h3 class='h3-add'>Стаття добавлена</h3>";
				}
			}	
		?>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>