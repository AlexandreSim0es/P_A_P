<?php

    session_start();
    session_destroy(); 
    header("location: \PAP_Alex\pg_index.php"); 
    exit();

?>