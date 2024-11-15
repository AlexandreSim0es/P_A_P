
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

    <!-- Page content-->

    <style>

    body{
      overflow: hidden;
    }

    h1 {
      display: block;
      margin-top: 5em;
      margin-bottom: 0.67em;
      margin-left: 0;
      margin-right: 0;
      color: #ffffff;
    }

    .space-btn2 {
      position: relative;
      font-family: 'Electrolize', sans-serif;
      font-size: 1.3em;
      text-transform: uppercase;
      letter-spacing: 0.125em;
      line-height: 1;
      color: #ffffff;
      margin: 0;
      padding: 1em;
      background: none;
      border: none;
      cursor: pointer;
    }

    .space-btn2:hover {
      color: #ffffff;
    }

    .space-btn2:focus {
      color: #ffffff;
      outline: none;
    }

    .space-btn2:active {
      color: #ffffff;
    }

    .space-btn2:before, .space-btn2:after {
      content: "";
      display: block;
      position: absolute;
      width: 100%;
      height: 1px;
    }

    .space-btn2:before {
      top: 0;
      left: 0;
      box-shadow: inset 1px 1px 0 0 #ffffff;
    }

    .space-btn2:after {
      right: 0;
      bottom: 0;
      box-shadow: inset -1px -1px 0 0 #ffffff;
    }

    .space-btn2:hover:before {
      animation: hoverShadowBefore 1s forwards;
    }

    .space-btn2:hover:after {
      animation: hoverShadowAfter 1s forwards;
    }


    @keyframes hoverShadowBefore {
      0% {
        width: 100%;
        height: 1px;
        top: 0;
        left: 0;
      }
      33% {
        width: 1px;
        height: 100%;
        top: 0;
        left: 0;
      }
      66% {
        width: 1px;
        height: 1px;
        top: calc(100% - 1px);
        left: 0;
      }
      100% {
        width: 100%;
        height: 1px;
        top: calc(100% - 1px);
        left: 0;
      }
    }

    @keyframes hoverShadowAfter {
      0% {
        width: 100%;
        height: 1px;
      }
      33% {
        width: 1px;
        height: 100%;
        bottom: 0;
        right: 0;
      }
      66% {
        width: 1px;
        height: 1px;
        bottom: calc(100% - 1px);
        right: 0;
      }
      100% {
        width: 100%;
        height: 1px;
        bottom: calc(100% - 1px);
        right: 0;
      }
    }

    </style>
    <div class="container-fluid flex-container" style="margin-top: 40vh">
          <h1 class="text-center mx-auto">Fim do Jogo</h1>

          <div class="d-flex justify-content-center">
            <button id="btn-comecar" class="space-btn2">Tentar Novamente</button>
          </div>
      </div>
    

    <script>

        document.getElementById('btn-comecar').addEventListener('click', function() {
            window.location.href = "../pg_index.php";
        });

    </script>

    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->

    <script src="js/scripts.js"></script>
    
  </body>
</html>
