<?php

    include(__DIR__.'\..\php_login/conexao_db.php');

        if ($stmt = $con->prepare('INSERT INTO pontos (id, pontos_atuais) VALUES (10) ')) {
        $stmt->execute();
        $stmt->close();
    
        
        $con->close();
    }




    
    

?>