<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    if ($_SESSION['userLoggedIn'] == 'true') {
        session_destroy();
        header("Location: ../index.php");
    } 
    
    else {
        header("Location: ../user-login.php");
    }

?>

