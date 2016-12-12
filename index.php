<!DOCTYPE html>
<html lang="ua">
  <head>
    <?php require_once "db.php" ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Головна</title>

    <!-- Bootstrap -->

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
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
        <div class="row form-content" id="articles">
            <?php
                $articles = select("SELECT * FROM `list_article` ORDER BY `date` DESC LIMIT 9");
                foreach ($articles as $article):
                $image = $article['src'];
            ?>
            <div class="col-md-3 col-md-offset-1 col-sm-5 col-lg-3 bloc">
                <a class="block_a" href="shablon.php?id=<?php echo $article['id'] ?>">
                        <h4><?php echo $article['title']; ?></h4>
                        <div style="background-image: url(<?php echo $image ?>);"></div>
                        <p>
                            <?php echo $article['description']; ?></p>
                        </p>
                </a>
            </div>
            
            <?php endforeach; ?>        
        </div>
    </div>
    <div id = "toTop" class="navbar navbar-inverse" > 
        <ul class="nav navbar-nav">
            <li><a href="" >Вгору</a></li>
        </ul>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript">
        $(function() {
            $(window).scroll(function() { 
                if($(this).scrollTop() > 300) {
                   $('#toTop').fadeIn();
                } else {
                   $('#toTop').fadeOut();
                }
            });
         
            $('#toTop').click(function() {
                $('body,html').animate({scrollTop:0},800);
            });
        });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.js"></script>
  </body>
</html>