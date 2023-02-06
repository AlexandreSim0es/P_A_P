<?php

  include('php_login/login.php');
  session_start();

?>

<!DOCTYPE html>
<html lang="pt">
  <head>

    <title>SUPORTE</title>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title></title>

    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    <link rel="stylesheet" type="text/css" href="css/pagina_suporte.css" />
    
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
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="pg_index.php" >INICIO</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="pg_suporte.php">SUPORTE</a>
            </li>
            <?php  if(isset($_SESSION['username'])) {?>
                  
                  <li class="nav-item"> <a class="nav-link " href="php_login/logout.php">LOGOUT</a> </li>
            <?php } else { ?>
  
                  <li class="nav-item"> <a class="nav-link " href="pg_login.php">LOGIN/REGISTRO</a> </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page content-->

          <div class="container">
        <div class="row">
            <h4 style="text-align:center">Fale conosco!</h4>
        </div>
        <div class="row input-container">
            <div class="col-xs-12">
              <div class="styled-input wide">
                <input type="text" required />
                <label>Nome</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input">
                <input type="text" required />
                <label>Email</label> 
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="styled-input" style="float:right;">
                <input type="text" required />
                <label>Numero</label> 
              </div>
            </div>
            <div class="col-xs-12">
              <div class="styled-input wide">
                <textarea required></textarea>
                <label>Mensagem</label>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="btn-lrg submit-btn">Enviar</div>
            </div>
        </div>
      </div>

    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->

    <script src="js/scripts.js"></script>
  </body>
</html>