<?php

        //CHECK IF SESSION STARTED, ELSE START SESSION
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
        //PAGE INCLUDES
        include '../functions.php';

        //OPEN HTML
        htmlOpen();
        
        divOpen("container flex-column text-center bg-light pt-5 mt-5 w-50 border border-dark rounded");
        h1("Login", "py-3");

        //DISPLAY FAILED LOGIN ATTEMPTS IF GREATER THAN 0
        if(!isset($_SESSION)) 
        { 
            if ($_SESSION['loginAttempts'] > 0) {
                divOpen();
                p("{$_SESSION['loginAttempts']} failed login attempts", "text-danger");
                divClose();
            } 
        } 
        
        if(isset($_SESSION)) 
        { 
            
        
            //GENERATE LOGIN FORM
        if ($_SESSION['userLoggedIn'] == "") {
            echo

                "<form action='try-login.php' method='post'>";

                divOpen("p5");

                    echo "<input type='text' name='username' class='my-1' placeholder='Username' required> </input>";

                divClose();

                    echo 

                divOpen("p5");

                    echo "<input type='password' name='password' class='my-1' placeholder='Password' required></input>";

                divClose();

                divOpen("p5");

                    echo "<button type='submit' class='btn-primary my-2'>Log In</button>";

                    divOpen("py-4");

                    a("Four White Walls", "https://www.fourwhitewalls.studio", "text-dark");

                    divClose();

                divClose();

            echo "</form>";

        divClose();

        htmlClose();

        } 
        
        //IF LOGGED IN, WOULD YOU LIKE TO SIGN IN TO DIFFERENT ACCOUNT
        else {

            divOpen("py-4");
                    p("You are already logged in. Would you like to ", "text-danger d-inline");
                    a("sign in to a different account?", "user-logout.php", "text d-inline");

                    divClose();

            divOpen("py-4");

                    a("Four White Walls", "https://www.fourwhitewalls.studio", "text-dark");

                    divClose();
        }
        }
?>