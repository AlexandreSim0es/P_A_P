<?php
    include(__DIR__.'\..\php_login/conexao_db.php');

    $username = $_SESSION['username'];

    if ($stmt = $con->prepare("UPDATE user SET pontos_max = pontos_atuais WHERE username = ? AND pontos_atuais > pontos_max")) {
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $stmt->close();
    }

    if ($stmt = $con->prepare("UPDATE user SET pontos_atuais = null WHERE username = ?")) {
        $stmt->bind_param("s", $_SESSION['username']);
        $stmt->execute();
        $stmt->close(); 
    }

    $con->close();
    exit();
?>