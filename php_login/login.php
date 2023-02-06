<?php      
    include('conexao_db.php'); 

    if(isset($_POST['username'])){
        
        $username=$_POST['username'];
        $password=$_POST['password'];

       if($stmt = $con->prepare('select * from registro where username= ? and password= ?')) {
        $stmt->bind_param('ss', $_POST['username'], $_POST['password']);

        $stmt->execute();
        $result = $stmt->get_result();

        if(mysqli_num_rows($result)==1){
            header("location: \PAP_Alex\pg_secundarias/pg_sec_login.php"); 
                
            session_start();
            $_SESSION['username'] = $username;

            exit();
        }
        else{
            echo " Username ou password errados!";
            exit();
        }
    }
}
?>