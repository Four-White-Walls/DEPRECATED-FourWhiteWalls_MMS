<?php  
            //CHECK IF SESSION STARTED, ELSE START SESSION
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 

            //IF USER NOT LOGGED IN, REDIRECT TO LOGIN PAGE
            if ($_SESSION['userLoggedIn'] == "") {
                header("Location: /user_functions/user-login.php");
            } else {
                header("Location: dashboard.php");
            }
      
?> 