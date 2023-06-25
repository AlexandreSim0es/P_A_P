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

      @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400600&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400600&display=swap');

      body {
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'Open Sans', sans-serif;
      }

      main {
        padding: 40px;
      }

      section {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      }

      .alert {
        width: 600px;
        padding: 50px;
        margin: auto;
        border-radius: 10px;
        box-shadow: 5px 20px 50px #000;
      }

      .alert-2-secondary {
        border-left: 4px solid #f2f2f2;
        background-color: rgba(0, 0, 0, 0.2);
        color:  #f2f2f2;
      }

      .alert-title {
        font-family: 'Poppins', sans-serif;
        font-weight: bold;
      }

      .alert-content {
        font-family: 'Open Sans', sans-serif;
        font-weight: bold;
        color: #f2f2f2;
      }

      /* Media Queries para tornar o CSS responsivo */
      @media (max-width: 768px) {
        .alert {
          width: 90%;
        }
      }

    </style>

    <main>
      <section>
        <div class="alert alert-2-secondary">
          <h3 class="alert-title">Menos de 5 carateres!</h3>
          <p class="alert-content">A password tem de ter mais de 5 carateres!</p>
          <p class="alert-content"><a href="\PAP_Alex/pg_alterar_pass.php">Voltar</a></p>
        </div>
      </section>
    </main>

    <!-- Bootstrap core JS-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core theme JS-->

    <script src="js/scripts.js"></script>
    
  </body>
</html>