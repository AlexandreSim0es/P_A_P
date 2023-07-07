<?php

    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "jogo";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  

    if(mysqli_connect_errno()) {  
        die("Falha ao conectar com o MySQL:". mysqli_connect_error());  
    }  

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

?>