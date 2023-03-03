<?php

  include(__DIR__.'\..\php_login\login.php');
  session_start();

?>

<!DOCTYPE html>
<html lang="pt">
  <head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title></title>

    <!-- Favicon-->

    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <!-- CSS -->

    <link rel="stylesheet" type="text/css" href="\PAP_Alex\css\navbar.css" />
    
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
              <a class="nav-link" aria-current="page" href="\PAP_Alex/pg_index.php" >INICIO</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page content-->

    <style>
 
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400600&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400600&display=swap');
    
    main {
      padding: 40px;
    }

    section {
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    .alert {
      width: 600px;
      padding: 50px;
      margin: 8px;
      margin-top: 18rem;
      margin-bottom: 30rem; 
      border-radius: 10px;
      box-shadow: 5px 20px 50px #000;
    }

    .alert-2-secondary {
      border-left: 4px solid  #f2f2f2;
      background-color:  rgba(0, 0, 0, 0.2);
    }

    .alert-2-secondary .alert-title {
      color:  #f2f2f2;
    }

    .alert-title {
      font-family: 'Poppins', sans-serif;
      font-weight: bold;
    }

    .alert-content {
      font-family: 'Open Sans', sans-serif;
      font-weight: bold;
      color:  #f2f2f2;
    }

    </style>

    <main>
      <section>
        <div class="alert alert-2-secondary">
          <h3 class="alert-title">Bem-Vindo <?php echo $_SESSION['username']; ?></h3>
          <p class="alert-content">Foi enviado para o seu email mais informações!</p>
          <p class="alert-content"><a href="\PAP_Alex/pg_suporte.php">Voltar</a></p>
        </div>
      </section>
    </main>


    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->

    <script src="js/scripts.js"></script>
    
  </body>
</html>
