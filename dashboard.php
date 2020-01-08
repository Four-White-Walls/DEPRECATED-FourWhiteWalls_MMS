<?php  
            //CHECK IF SESSION STARTED, ELSE START SESSION
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 

            //INCLUDE DEPENDENCIES
            include 'functions.php';
            include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

            
            //DEFAULT CLASSES TO TEST WITH
            $defaultClasses = "col-med-12 py-5 ";


            //SQL CONNECTION STRING FOR MENU ITEMS
            $menuItems = $conn->query("SELECT menu_text, menu_links FROM menu");

            //OPEN HTML
            htmlOpen( );

            //SEND USER TO LOGIN IF USER IS NOT LOGGED IN
            if ($_SESSION["userLoggedIn"] == "") {
                
                header("Location: /user_functions/user-login.php");

            } 

            //LOAD ADMIN BAR IF USER IS LOGGED IN
            else {
                //OPEN USER BAR DIV
                adminBar();
            }
            
            //OPEN BODY SECTION
            sectionOpen( "py-3", "header" );
            
                    h1("Dashboard");

            
                    //IF ACCESS PERMISSIONS ARE GLOBAL RENDER DASHBOARD
                    if ($_SESSION['access'] == 'global') {
                        divOpen("row justify-content-center p-5");
                        
                        //DATA ENTRY MODULE
                        dataEntry();
                        //DAILY RECAP MODULE
                        dailyRecap();
                        divClose();

                    }

                    
            //CLOSE SECTION        
            sectionClose( );

            //CLOSE HTML
            htmlClose( );
?> 