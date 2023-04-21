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
        <a class="navbar-brand" href="pg_index.php">ADIVINHE O JOGO</a>
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

                <li class="nav-item"> <a style="text-transform:uppercase" class="nav-link" class="dropbtn" href=""><?php echo $_SESSION['username']; ?></a></li>
                <li class="nav-item"> <a class="nav-link " href="php_login/logout.php">LOGOUT</a></li>
            <?php } else { ?>

                <li class="nav-item"> <a class="nav-link " href="pg_login.php">LOGIN/REGISTRO</a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page content-->

    <button id="btn-comecar" class="space-btn2" style="display:none;">Começar</button>

      <div id="jogo-container" style="display:block;"> 
      <div class="container1 mt-sm-5 my-1">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
          <div class="py-2 h5"><img id="game_cover_img" src=\PAP_Alex\assets\images/<?php echo $jg_certo['cover']; ?> width="350" height="450"></div>
          <div class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="question" style="width: 550px;">
      
          <?php 
              for($i = 0; $i < count($jogos); $i++) {
                  echo '<p><label class="options" id="opcao'.$i.'">' . $jogos[$i]['name'] . 
                        '<input type="radio" name="opcao">
                        <span class="checkmark"></span>
                        </label></p>';
            }
          ?>
          <button class="space-btn" onclick="submit()">Submeter</button>
          </div>
      </div>
  </div>
</div>
    
    <script>

      if (localStorage.getItem('jg_comecou') !== 'true') {
          document.getElementById('btn-comecar').style.display = 'block';
          document.getElementById('jogo-container').style.display = 'none';
      }
      
      document.getElementById('btn-comecar').addEventListener('click', function() {
        localStorage.setItem('jg_comecou', 'true');

        document.getElementById('btn-comecar').style.display = 'none';
        document.getElementById('jogo-container').style.display = 'block';
      });

    </script>

  </body>
</html>
