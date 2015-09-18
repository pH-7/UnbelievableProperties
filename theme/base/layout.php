<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <title><?php echo Config::NAME ?></title>


<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="./theme/base/static/common.css" rel="stylesheet">
  </head>
   
   <header>
       <h1 class="center"><a href="<?php echo Config::URL ?>"><?php echo Config::NAME ?></a></h1>
   </header>
   
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">
		<?php require __DIR__ . '/' . (!empty($_REQUEST['p']) && is_file(__DIR__ . '/' . $_REQUEST['p'] . '.inc.php') ? $_REQUEST['p'] . '.inc.php' : 'home.inc.php')  ?>
    </div><!-- /.container -->

            <footer>
                <p class="italic"><strong><a href="<?php echo Config::URL ?>" title="Homeage">Unbelievable Ptoperties</a></strong>
                <?php if (!empty($_SESSION['name'])): ?>
                     &nbsp; | &nbsp; You are connected as <?php echo $_SESSION['name'] ?> - <a href="<?php echo Config::URL ?>?p=hello&amp;logout=1">Logout</a> 
                    <?php if(!empty($_SESSION['property']['adid'])): ?>
                        &nbsp; | &nbsp; <a href="<?php echo Config::URL ?>?p=myproperty&amp;id=<?php echo $_SESSION['property']['adid'] ?>">Your Property Ad <small>page</small></a>
                    <?php endif ?>
                <?php endif ?>
                </p>
            </footer>
            
  </body>
</html>
