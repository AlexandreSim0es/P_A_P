<?php   
    include('conexao_db.php'); 

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    if ($stmt = $con->prepare('INSERT INTO registro (username, password, email) VALUES (?, ?, ?)')) {
        $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);

    if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        exit('A senha deve ter entre 5 e 20 caracteres!');
    }

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt->execute();
    
        $stmt->close();
        $con->close();
        
    }
   

?>