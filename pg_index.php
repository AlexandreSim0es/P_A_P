<?php

include('php_login/login.php');
include('php_jogo/jogo.php');
session_start();

?>

<!DOCTYPE html>
<html lang="pt">

<head>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pg_index.php">INICIO</a>
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
                <a class="dropdown-item" href="pg_alterar_pass.php">Alterar Password</a>
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

  <div class="container-fluid" id="btn-comecar" style="display:none;">
    <div class="d-flex justify-content-center">
      <button class="space-btn2">Começar</button>
    </div>
  </div>

  <div class="container-fluid flex-container" id="jogo-container" style="display:block;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <img id="game_cover_img" class="img-fluid mx-auto" src=\PAP_Alex\assets\images/<?php echo $jg_certo['cover']; ?>>
        </div>
        <div class="modal-body mx-auto">
          <div class="question" data-toggle="buttons">
            <?php
            for ($i = 0; $i < count($jogos); $i++) {
              echo '<p><label class="options" id="opcao' . $i . '">' . $jogos[$i]['name'] .
                '<input type="radio" name="opcao">
                        <span class="checkmark"></span>
                        </label></p>';
            }
            ?>

            <div class="d-flex justify-content-center">
              <button class="space-btn" onclick="submit()">Submeter</button>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php

  $sql = "SELECT pontos_atuais, pontos_max FROM user WHERE username = ?";

  $stmt = $con->prepare($sql);
  $stmt->bind_param("s", $_SESSION['username']);
  $stmt->execute();
  $stmt->bind_result($pontos_atuais, $pontos_max);
  $stmt->fetch();
  $stmt->close();

  if (isset($_SESSION['username']) != true) { ?>

    <p class="pontos-label_atuais">Pontos Atuais</p>
    <p class="pontos-value_atuais" id="pontos-atuais"></p>

    <p class="pontos-label_max">Pontos Máximos</p>
    <p class="pontos-value_max" id="pontos-max"></p>

  <?php } else { ?>

    <p class="pontos-label_atuais">Pontos Atuais</p>
    <p class="pontos-value_atuais">
      <?php echo $pontos_atuais; ?>
    </p>

    <p class="pontos-label_max">Pontos Máximos</p>
    <p class="pontos-value_max">
      <?php echo $pontos_max; ?>
    </p>

  <?php } ?>

  <script>

    var op_errada = 0;
    var op_errada = localStorage.getItem('op_errada') || 0;

    function deleteCurrentGame() {
      var xhr = new XMLHttpRequest();
      xhr.open('DELETE', 'php_jogo/deleteCurrentGame.php', true);
      xhr.onreadystatechange = () => { };
      xhr.send();
    }

    function submit() {
      var choices = document.getElementsByName("opcao");
      var chosen = null;                  
      let image = document.getElementById('game_cover_img');
      for (var i = 0; i < choices.length; i++) {
        if (choices[i].checked) {
          chosen = choices[i].parentElement.innerText.trim();
          break;
        }                                       
      }

      if (!chosen) {
        alert("Escolha uma das opções!");
        exit();
      }

      if (chosen === "<?php echo $jg_certo['name']; ?>") {
        deleteCurrentGame();

        choices[i].parentElement.classList.add("opcao-certa");
        image.classList.remove('opcao-errada');
        image.classList.add('opcao-certa');

        pontos('php_jogo/pontos_atuais.php');

        pontos_atuais_localstorage();

        setTimeout(() => window.location.reload(), 1000);

      } else {
        op_errada++;

        choices[i].parentElement.classList.add("opcao-errada");
        image.classList.add('opcao-errada');
        image.classList.remove('opcao-certa');

        if (op_errada === 1) {
          localStorage.setItem('op_errada', 1);
        }

        if (op_errada === 2) {

          pontos('php_jogo/pontos_max.php');

          pontos_max_localstorage();

          setTimeout(function () {
            window.location.href = "pg_secundarias/pg_jg_perdido.php";
          }, 500);

          deleteCurrentGame();
        }
      }
    }

    bt_começar();

    var pontos_atuais = localStorage.getItem('pontos_atuais');
    var pontos_max = localStorage.getItem('pontos_max');

    document.getElementById('pontos-atuais').textContent = pontos_atuais;
    document.getElementById('pontos-max').textContent = pontos_max;

  </script>

  <script src="js/scripts.js"></script>

</body>

</html>
