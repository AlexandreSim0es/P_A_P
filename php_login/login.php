<?php      
    include('conexao_db.php'); 

    if(isset($_POST['username'])){
        
        $username=$_POST['username'];
        $password=$_POST['password'];

       if($stmt = $con->prepare('select * from user where username= ?')) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if (mysqli_num_rows($result)==1 && password_verify($password, $result->fetch_assoc()['password']) === true){
            
            header("location: \PAP_Alex\pg_secundarias/pg_sec_login.php");

            session_start();
            $_SESSION['username'] = $username;

            $stmt->close();
            $con->close();
            exit();

        }else {
            header("location: \PAP_Alex\pg_secundarias/pg_sec_login_error.php");
            exit();

        }
    }
}

?>