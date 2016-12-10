<!DOCTYPE html>
<html lang="ua">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Добавити статтю</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/styles.css">
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
        <form action="insertToDb.php" method="post" name="Create article" enctype="multipart/form-data" class="col-lg-7 col-md-7 col-sm-9 col-xs-12">
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
            <textarea name="text" class="form-control" placeholder="Текст..." rows="6"></textarea>
          </div>
          <div class="form-group">
            <input type="file" name="uploadfile"/>
            <p class="help-block">Виберіть картинку для статті</p>
          </div>
          <div class="form-group">
            <button id="butt1" type="submit" class="btn btn-success">Добавити</button>
          </div>
        </form>
      </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
      $("#butt1").click(function() {
        var strRes = "Ви не заповнили усі поля";
        var check = new Array();

        $(":text, textarea, [type='file']").each(function(i) {
          if ($(this).val() == "") {
            $(this).parent("div").addClass("has-error");
            $("button").addClass("btn btn-danger");
            check[i] = false;
          }
          else {
            $(this).parent("div").removeClass("has-error");
            $(this).parent("div").addClass("has-success");
            check[i] = true;
          }
        });

        var checked = true;;
        for (var i = 0; i < check.length; i++) {
          if(!check[i]) {
            checked = false;
          }
        }

        if (checked) {
          $("button").removeClass("btn btn-danger"); 
          $("button").addClass("btn btn-success");
        }
        else {
          alert(strRes);
        }

        return checked;
      });
      
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>