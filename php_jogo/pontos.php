<?php

    include(__DIR__.'\..\php_login/conexao_db.php');
    include(__DIR__.'\..\php_login/login.php');

    session_start();

    if(isset($_SESSION['username'])) {
        if ($stmt = $con->prepare("SELECT id FROM user WHERE username = ?")) {
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->fetch();
            $stmt->close();

            if ($id) {
                if ($stmt = $con->prepare('UPDATE user SET pontos_atuais = pontos_atuais + 10 WHERE id = ?')) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->close();
                }
            }

            if ($pontos_atuais > $pontos_max) {
                if ($stmt = $con->prepare("UPDATE pontos SET pontos_max = pontos_atuais")) {
                    $stmt->execute();
                    $stmt->close();
                }
            }

        }
    }

    
?>