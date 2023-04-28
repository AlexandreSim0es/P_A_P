<?php
    include(__DIR__.'\..\php_login/conexao_db.php');

    function deleteCurrentGame($connection) {
        $jogo = $connection->prepare("DELETE FROM currentgame where 1=1;");
        $jogo->execute();
        $jogo->close();
    }

    
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') deleteCurrentGame($con);

    $con->close();

?>