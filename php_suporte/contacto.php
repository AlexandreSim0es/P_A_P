<?php
     include(__DIR__.'\..\php_login/conexao_db.php');    
        
        $nome=$_POST['nome'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone'];
        $mensagem=$_POST['mensagem'];
        
        if($stmt = $con->prepare('INSERT INTO suporte (nome, email, telefone, mensagem) VALUES (?, ?, ?, ?)')){
        $stmt->bind_param('ssis', $_POST['nome'], $_POST['email'], $_POST['telefone'], $_POST['mensagem']);
        $stmt->execute();

        $stmt->close();
        $con->close();

        $to_email = $email;
        $subject = "Mensagem do suporte!";
        $body = "Nome: $nome \nEmail: $email \nTelefone: $telefone \nMensagem: $mensagem \n\nObrigado por nos contactar! \nResponderemos o mais breve possivel!";
        $headers = "From: Suporte_Site_Alex email";
    
        if (mail($to_email, $subject, utf8_decode($body), $headers)) {
                header("location: \PAP_Alex\pg_secundarias/pg_sec_email.php");
            } 
        }

        $to_email = "alexandresimoespap@gmail.com";
        $subject = "Mensagem do suporte!";
        $body = "Nome: $nome \nEmail: $email \nTelefone: $telefone \nMensagem: $mensagem \n\nObrigado por nos contactar! \nResponderemos o mais breve possivel!";
        $headers = "From: Suporte_Site_Alex email";
    
        if (mail($to_email, $subject, utf8_decode($body), $headers)) {
                exit();
            } 
        
?>