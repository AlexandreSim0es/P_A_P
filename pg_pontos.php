<?php
include('php_login/conexao_db.php');
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

  <title>SUPORTE</title>

  <!-- Favicon-->

  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

  <!-- CSS -->

  <link rel="stylesheet" type="text/css" href="css/navbar.css" />
  <link rel="stylesheet" type="text/css" href="css/pagina_pontos.css" />
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />

</head>

<body>

  <!-- Responsive navbar-->

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
            <a class="nav-link active" href="pg_pontos.php">PONTUAÇÃO</a>
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
              <a class="nav-link" href="pg_login.php">LOGIN</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page content-->

     <div class="container1">
     <h1>TOP 10</h1>
     <table id="customers">
      <thead>
        <tr>
          <th>Utilizador</th>
          <th>Pontos</th>
        </tr>
      </thead>

      <?php

        $query = "SELECT username, pontos_max FROM user ORDER BY pontos_max DESC LIMIT 10";
        $result = mysqli_query($con, $query);

        $num_rows = mysqli_num_rows($result);
        $fill_count = 10 - $num_rows;

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['pontos_max'] . " </td>";
            echo "</tr>";
        }

        for ($i = 0; $i < $fill_count; $i++) {
            echo "<tr>";
            echo "<td>-</td>";
            echo "<td>-</td>";
            echo "</tr>";
        }

        mysqli_close($con);

    ?>


  <!-- Bootstrap core JS-->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Core theme JS-->

  <script src="js/scripts.js"></script>

</body>

</html>