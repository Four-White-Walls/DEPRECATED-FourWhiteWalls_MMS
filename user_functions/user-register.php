<?php

        //CHECK IF SESSION STARTED, ELSE START SESSION
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        //INCLUDE DEPENDENCIES
        include '../functions.php';

        //OPEN HTML
        htmlOpen();

        divOpen("container flex-column text-center bg-light pt-5 mt-5 w-50 border border-dark rounded");

        h1("Create New User", "py-3");

            echo

                "<form action='try-register.php' method='post'>";

                divOpen("p5");

                    echo "<input type='text' name='username' class='my-1' placeholder='Username' required> </input>";

                divClose();

                divOpen("p5");

                    echo "<input type='password' name='password' class='my-1' placeholder='Password' required></input>";

                divClose();

                divOpen("p5");

                    echo "<input type='email' name='email' class='my-1' placeholder='Email' required></input>";

                divClose();

                divOpen("p5");

                    echo "<button type='submit' class='btn-primary my-2'>Register</button>";

                    divOpen("py-4");

                    a("Four White Walls", "https://www.fourwhitewalls.studio", "text-dark");

                    divClose();

                divClose();

            echo "</form>";

        divClose();
        
        htmlClose();

?>