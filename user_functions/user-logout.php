<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //REDIRECT TO INDEX.PHP IF LOGGED IN
    if ($_SESSION['userLoggedIn'] == 'true') {
        session_destroy();
        header("Location: ../index.php");
    } 
    
    //REDIRECT TO USER LOGIN IF NOT LOGGED IN
    else {
        header("Location: ../user-login.php");
    }

?>

