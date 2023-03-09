<?php
  include('php_login/login.php');
  include('php_jogo/jogo.php');
  session_start();

?>

<!DOCTYPE html>
<html lang="pt">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet'>

    <title>INICIO</title>

    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="css/navbar.css" />

    <link rel="stylesheet" type="text/css" href="css/pagina_index.css" />
    
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />

  </head>

  <body>

    <!-- Responsive navbar-->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="pg_index.php" >INICIO</a></li>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pg_suporte.php">SUPORTE</a>
            </li>
            <?php  if(isset($_SESSION['username'])) {?>

                <li class="nav-item"> <a class="nav-link " href="php_login/logout.php">LOGOUT</a></li>

            <?php } else { ?>

                <li class="nav-item"> <a class="nav-link " href="pg_login.php">LOGIN/REGISTRO</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page content-->

    <div class="container1 mt-sm-5 my-1">
    <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><img src=\PAP_Alex\assets\images/<?php echo $jg_certo['cover']; ?> width="100" height="100"></div>
        <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="question">
    
        <?php 
            for($i = 0; $i < count($jogos); $i++) {
                echo '<label class="options">' . $jogos[$i]['name'] . 
                      '<input type="radio" name="radio">
                      <span class="checkmark"></span>
                      </label>';
            }
        ?>

        </div>
        <div class="ml-auto mr-sm-5">
            <input type="button" name="submit" value="ok"/>
        </div>
    </div>
    <div id="results"></div>  
</div>

<?php

  if(isset($_POST['submit'])) {
        exit("oi");
     }

?>

    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->

    <script src="js/script.js"></script>
    
  </body>
</html>
