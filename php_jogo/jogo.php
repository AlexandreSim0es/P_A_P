<?php 
    include(__DIR__.'\..\php_login/conexao_db.php');
    
    $jogo1= $con->prepare("SELECT name, cover FROM game ORDER BY RAND() LIMIT 1 ");
    $jogo1 ->execute();
    $result = $jogo1 ->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jg1 = $row["name"];
            $jg1_c = $row["cover"];
    } 
    }

    $jogo1 ->close();

    $jogo2 = $con->prepare("SELECT name, cover FROM game ORDER BY RAND() LIMIT 1 ");
    $jogo2 ->execute();
    $result = $jogo2 ->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jg2 = $row["name"];
            $jg2_c = $row["cover"];
    }
    }

    $jogo2 ->close();

    $jogo3 = $con->prepare("SELECT name, cover FROM game ORDER BY RAND() LIMIT 1 ");
    $jogo3 ->execute();
    $result = $jogo3 ->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jg3 = $row["name"];
            $jg3_c = $row["cover"];
    }
    }

    $jogo3->close();

    $jogo4 = $con->prepare("SELECT name, cover FROM game ORDER BY RAND() LIMIT 1 ");
    $jogo4 ->execute();
    $result = $jogo4 ->get_result();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $jg4 = $row["name"];
            $jg4_c = $row["cover"];
    } 
    }

    $jogo4 ->close();
    $con->close();

    $jogos = [$jg1_c, $jg2_c, $jg3_c, $jg4_c];

    $escolha = rand(0 ,3);

    $jg_certo = $jogos[$escolha];

?>








  


