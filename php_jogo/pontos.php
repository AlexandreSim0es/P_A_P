<?php

    include(__DIR__.'\..\php_login/conexao_db.php');
    include(__DIR__.'\..\php_login/login.php');

    session_start();

    if (isset($_SESSION['username'])) {
        // Obtém o ID do usuário
        if ($stmt = $con->prepare("SELECT id FROM user WHERE username = ?")) {
            $stmt->bind_param("s", $_SESSION['username']);
            $stmt->execute();
            $stmt->bind_result($id);
            $stmt->fetch();
            $stmt->close();

            // Se o ID foi encontrado, atualiza os pontos do usuário
            if ($id) {
                // Obtém os pontos atuais do usuário
                if ($stmt = $con->prepare("SELECT pontos_atuais, pontos_max FROM user WHERE id = ?")) {
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $stmt->bind_result($pontos_atuais, $pontos_max);
                    $stmt->fetch();
                    $stmt->close();

                    // Calcula os novos pontos máximos
                    if ($pontos_atuais > $pontos_max) {
                        $pontos_max = $pontos_atuais;
                    }

                    // Atualiza os pontos do usuário
                    if ($stmt = $con->prepare("UPDATE user SET pontos_atuais = ?, pontos_max = ? WHERE id = ?")) {
                        $stmt->bind_param("iii", $pontos_atuais, $pontos_max, $id);
                        $stmt->execute();
                        $stmt->close();
                        $con->close();
                    }
                }
            }
        }
    }



    
    

?>