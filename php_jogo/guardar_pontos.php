<?php
    include(__DIR__.'\..\php_login/conexao_db.php');

    $pontuacao = $_POST["pontuacao"];

    $sql = "INSERT INTO pontos (pontos_atuais) VALUES ('$pontuacao')";

    // substitua "nome_do_usuario" pelo nome do usuário atual
    // executa a consulta SQL
    if ($conn->query($sql) === TRUE) {
    exit("Pontuação inserida com sucesso!");
    } else {
    exit("Erro ao inserir pontuação: " . $conn->error);
    }

    // fecha a conexão com o banco de dados
    $conn->close();

?>