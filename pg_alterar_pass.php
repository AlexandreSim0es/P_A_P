<?php
include('php_login/login.php');
include("php_login/alterar_pass.php");

?>

<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>LOGIN</title>

  <!-- Favicon-->

  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

  <!-- CSS -->

  <link rel="stylesheet" type="text/css" href="css/navbar.css" />
  <link rel="stylesheet" type="text/css" href="css/pagina_alterar_pass.css" />
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />

</head>

<body>

  <!-- Navbar responsiva-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="pg_index.php">ADIVINHE O JOGO</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="pg_index.php">INICIO</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pg_suporte.php">SUPORTE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pg_pontos.php">PONTUAÇÃO</a>
          </li>
          <?php if (isset($_SESSION['username'])) { ?>
            <li class="nav-item dropdown">
              <a style="text-transform: uppercase" class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $_SESSION['username']; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="php_login/logout.php">Logout</a>
              </div>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link active" href="pg_login.php">LOGIN</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Conteudo da pagina -->

<form method="post">
    <label for="current-password">Password atual:</label>
    <input type="password" id="current-password" name="current-password" required>

    <label for="new-password">Nova password:</label>
    <input type="password" id="new-password" name="new-password" required>

    <label for="confirm-password">Confirmar nova password:</label>
    <input type="password" id="confirm-password" name="confirm-password" required>

    <button type="submit">Guardar</button>
</form>

  <!-- Bootstrap core JS-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Core theme JS-->

  <script src="js/scripts.js"></script>

</body>

</html>
