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
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="pg_index.php">INICIO</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pg_suporte.php">SUPORTE</a>
          </li>
          <?php if (isset($_SESSION['username'])) { ?>

            <li class="nav-item"> <a style="text-transform:uppercase" class="nav-link" class="dropbtn" href="">
                <?php echo $_SESSION['username']; ?>
              </a></li>
            <li class="nav-item"> <a class="nav-link " href="php_login/logout.php">LOGOUT</a></li>
          <?php } else { ?>

            <li class="nav-item"> <a class="nav-link " href="pg_login.php">LOGIN/REGISTRO</a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page content-->

  <!-- 
    <div id="center1">
      <div id="title1">
        PONTOS ATUAIS:
      </div>
      <div id="score1">
        0
      </div>
    </div>
      -->
      <div class="container-fluid" id="btn-comecar" style="display:none;">
      <div class="d-flex justify-content-center">
          <button class="space-btn2" >Começar</button>
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
  


<!--
  <div class="container1 mt-sm-5 my-1 d-flex align-items-center justify-content-center" id="game_container">
    <div id="jogo-container" style="display:block;">
      <div class="question ml-sm-5 pl-sm-5 pt-2">
        <div class="py-2 h5"><img id="game_cover_img" class="img-fluid" src=\PAP_Alex\assets\images/<?php echo $jg_certo['cover']; ?>>
        </div>
        <div class="text-center" id="question">

          <?php
          //for ($i = 0; $i < count($jogos); $i++) {
          //  echo '<p><label class="options" id="opcao' . $i . '">' . $jogos[$i]['name'] .
          //    '<input type="radio" name="opcao">
          //              <span class="checkmark"></span>
          //              </label></p>';
          //}
          ?>

          <button class="space-btn" onclick="submit()">Submeter</button>

        </div>
      </div>
    </div>
  </div>
        -->

  <!--
    <div id="center2">
      <div id="title2">
        PONTOS MAX:
      </div>
      <div id="score2">
        0
      </div>
    </div>
          -->

  <script>

    var op_errada = 0;

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
        

        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'php_jogo/pontos.php', true);
        xhr.onreadystatechange = () => { };
        xhr.send();


        setTimeout( ()=> window.location.reload(), 1000);

      } else {
        op_errada++;

        choices[i].parentElement.classList.add("opcao-errada");
        image.classList.add('opcao-errada');
        image.classList.remove('opcao-certa');

        if (op_errada === 2) {
          window.location.href = "pg_secundarias/pg_sec_jg_perdido.php";
          deleteCurrentGame();
          localStorage.clear();
        }
      }
    }



    if (localStorage.getItem('jg_comecou') !== 'true') {
      document.getElementById('btn-comecar').style.display = 'block';
      document.getElementById('jogo-container').style.display = 'none';
    }

    document.getElementById('btn-comecar').addEventListener('click', function () {
      localStorage.setItem('jg_comecou', 'true');

      document.getElementById('btn-comecar').style.display = 'none';
      document.getElementById('jogo-container').style.display = 'block';
    });

    /*
    function load_game_instance() {
      let saved_game_container  = localStorage.getItem('game_container');
      let game_container = document.getElementById('game_container');
      
      if (saved_game_container !== null) {
        game_container.innerHTML = saved_game_container;
        return;
      }
      localStorage.setItem('game_container', game_container.innerHTML);
    }


    window.onload = () => {
      load_game_instance();
    }
    */


  </script>

</body>

</html>