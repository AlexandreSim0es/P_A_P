<?php
include('conexao_db.php'); 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['current-password'], $_POST['new-password'], $_POST['confirm-password'])) {

        $currentPassword = $_POST['current-password'];
        $newPassword = $_POST['new-password'];
        $confirmPassword = $_POST['confirm-password'];

        if ($newPassword !== $confirmPassword) {
            header("location: \PAP_Alex\pg_secundarias/pg_pass_diferentes.php"); 
            exit;
        }

        if (strlen($newPassword) > 100 || strlen($newPassword) < 5) {
            header("location: \PAP_Alex\pg_secundarias/pg_signup_password.php"); 
            exit();
        }

        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            
            $checkUserSql = "SELECT * FROM user WHERE username = '$username'";
            $checkUserResult = $con->query($checkUserSql);

            if ($checkUserResult->num_rows === 1) {
                $storedUserData = $checkUserResult->fetch_assoc();
                $storedPasswordHash = $storedUserData['password'];

                if (password_verify($currentPassword, $storedPasswordHash)) {
                    $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
    
                    if (password_verify($newPassword, $storedPasswordHash)) {
                        header("location: \PAP_Alex\pg_secundarias/pg_pass_igual.php"); 
                        exit;
                    }

                    $updateSql = "UPDATE user SET password = '$newPasswordHash' WHERE username = '$username'";

                    if ($con->query($updateSql) === TRUE) {
                        header("location: \PAP_Alex\pg_secundarias/pg_pass_confirmada.php"); 
                        exit();
                    } 
                }
            }
        }
    }
}    

$con->close();

?>






