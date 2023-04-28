<?php 
    include(__DIR__.'\..\php_login/conexao_db.php');
    

    function getGame($connection, $id) {
        $jogo = $connection->prepare("SELECT name, cover FROM game where id = ?");
        $jogo->bind_param('i', $id);
        $jogo->execute();
        $result = $jogo ->get_result();

        $data = [];
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $data["name"] = $row["name"];
            $data["cover"] = $row["cover"];
        }
        $jogo ->close();
        return $data;
    }

    function countGames($connection) {
        $s = $connection->prepare("SELECT count(*) as counter FROM game;");
        $s->execute();
        $result = $s ->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $s ->close();
            return $row['counter'];
        }
    }

    function getCurrentGame($connection) {
        $jogos = $connection->prepare("SELECT game_id, choice FROM currentGame;");
        $jogos->execute();
        $result = $jogos->get_result();

        $indexes = [];
        $choice = 0;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $indexes[] = $row['game_id'];
                $choice = $row['choice'];
            }
        }

        $jogos->close();
        $data = [];
        $data['indexes'] = $indexes;
        $data['choice'] = $choice;
        return $data;
    }

    function loadCurrentGame($connection, $data, $choice) {
        for($i = 0; $i < count($data); $i++) {
            $jogo = $connection->prepare("INSERT INTO currentgame (id, game_id, choice) VALUES (?, ?, ?);");
            $jogo->bind_param('iii', $i, $data[$i], $choice);
            $jogo->execute();
            $jogo->close();
        }
    }

    
    
    $nJogos = 5;
    $data = getCurrentGame($con);
    $indexes = $data['indexes'];
    $escolha = $data['choice'];    
    
    if (count($indexes) === 0) {
        $indexes = range(1, countGames($con));
        shuffle($indexes);
        $escolha = rand(0 , $nJogos - 1);
        loadCurrentGame($con, array_slice($indexes, 0, $nJogos), $escolha);
    }

    $jogos = array();
    
    for($i = 0 ; $i < $nJogos; $i++) {
        $jogos[$i] = getGame($con, $indexes[$i]);
    }
    
    $jg_certo = $jogos[$escolha];

    $con->close();

?>












  


