<?php   
    include('conexao_db.php'); 

    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    if ($stmt = $con->prepare("select * from user where username = ? or email = ?")) {
        $stmt->bind_param('ss', $_POST['username'], $_POST['email']);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if(mysqli_num_rows($result) > 0){
            header("location: \PAP_Alex\pg_secundarias/pg_sec_signup_error.php");
            exit();
        }

        if($stmt = $con->prepare('INSERT INTO user (username, email, password) VALUES (?, ?, ?)')){
        $stmt->bind_param('sss', $_POST['username'], $_POST['email'], $password);
        $stmt->execute();
        $stmt->close();

        header("location: \PAP_Alex\pg_secundarias/pg_sec_signup.php"); 
        
    }
    }
    
    $con->close();
    
?>