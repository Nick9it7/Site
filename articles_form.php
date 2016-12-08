<!DOCTYPE html>
<html lang="ua">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Статті</title>

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
        <h3 class="h3-add">Додавання статті</h3>
        <form action="db.php" method="post" name="Create article">
          <div class="form-group">
            <label>Назва статті</label>
            <input name="title" type="text" class="form-control" placeholder="Введіть назву статті">
          </div>
          <div class="form-group">
            <label>Короткий опис</label>
            <textarea name="description" class="form-control" placeholder="Опис..."></textarea>
          </div>
          <div class="form-group">
            <label>Текст статті</label>
            <textarea name="text" class="form-control" placeholder="Текст..."></textarea>
          </div>
          <div class="form-group">
            <label>Ключовий опис</label>
            <input type="text" name="meta_desc" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <label>Ключові слові</label>
            <input type="text" name="meta_key" class="form-control" placeholder="">
          </div>
          <div class="form-group">
            <input type="file" min="1" max="9999" name="file[]" multiple="true"/>
            <p class="help-block">Можна вибирати декілька файлів</p>
          </div>
          <div class="form-group">
            <button id="butt1" type="submit" class="btn btn-success">Отправить</button>
          </div>
        </form>
      </div>
    </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>