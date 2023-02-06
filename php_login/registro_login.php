<?php   
    include('conexao_db.php'); 

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    if ($stmt = $con->prepare('INSERT INTO registro (username, password, email) VALUES (?, ?, ?)')) {
        $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);

        header("location: \PAP_Alex\pg_secundarias/pg_sec_signup.php"); 

    $stmt->execute();
    
    $stmt->close();
    $con->close();
        
    }
   

?>