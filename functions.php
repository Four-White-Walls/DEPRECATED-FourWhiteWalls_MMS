<?php  
            //CHECK IF SESSION STARTED, ELSE START SESSION
            if(!isset($_SESSION)) 
            { 
                session_start(); 
            } 

            include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

            //Declare Element Creation Functions

            //RENDER H1 ELEMENT WITH ARGS
            function h1 ( $string, $classes = "", $id = "" ){   
                echo "<h1 class='{$classes}' id='{$id}'>{$string}</h1>";
            }

            //RENDER H2 ELEMENT WITH ARGS
            function h2 ($string, $classes = "", $id = ""){   
                echo "<h2 class='{$classes}' id='{$id}'>{$string}</h2>";
            }

            //RENDER H3 ELEMENT WITH ARGS
            function h3 ( $string, $classes = "", $id = "" ){   
                echo "<h3 class='{$classes}' id='{$id}'>{$string}</h3>";
            }

            //RENDER H4 ELEMENT WITH ARGS
            function h4 ( $string, $classes = "", $id = "" ){   
                echo "<h4 class='{$classes}' id='{$id}'>{$string}</h4>";
            }

            //RENDER H5 ELEMENT WITH ARGS
            function h5 ( $string, $classes = "", $id = "" ){   
                echo "<h5 class='{$classes}' id='{$id}'>{$string}</h5>";
            }

            //RENDER H6 ELEMENT WITH ARGS
            function h6 ( $string, $classes = "", $id = "" ){   
                echo "<h6 class='{$classes}' id='{$id}'>{$string}</h6>";
            }

            //RENDER P ELEMENT WITH ARGS
            function p ( $string, $classes = "", $id = "" ) {
                echo "<p class='{$classes}' id='{$id}'>{$string}</p>";
            }
            
            //RENDER IMG ELEMENT WITH ARGS
            function img ( $src, $classes = "", $id = "" ){   
                echo "<a href='index.php'><img class='{$classes}' id='{$id}'src='{$src}'></a>";
            }

            //RENDER A ELEMENT WITH ARGS
            function a(  $text= "", $href = "", $classes = "", $id = "" ) {
                echo "<a href='{$href}' class='{$classes}'>{$text}</a>";
            }

            //RENDER DIV OPEN WITH ARGS
            function divOpen ( $classes = "", $id = "")  {
                echo "<div class='{$classes}' id='{$id}'>";
            } 

            //RENDER DIV CLOSE
            function divClose ( ) {
                echo "</div>";
            }

            //RENDER HTML OPEN
            function htmlOpen ( ) {
                echo '<!DOCTYPE html>
                <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
                <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
                <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
                <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
                    <head>
                        <meta charset="utf-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <title>4WW CMS</title>
                        <meta name="description" content="">
                        <meta name="viewport" content="width=device-width, initial-scale=1">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
                        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
                        <link rel="stylesheet" href="/styles/style.css">

                        
                    </head>
                    <body>';
            }


            //RENDER HTML CLOSE
            function htmlClose ( $scriptSrc = "" ) {
                echo "<script src='{$scriptSrc}' async defer></script> </body> </html>";
            }

            //RENDER SECTION OPEN (HTML5)
            function sectionOpen ( $classes = "", $id = "") {
                echo "<section class='{$classes}' id='{$id}'>";
            }

            //RENDER SECTION CLOSE (HTML5)
            function sectionClose ( ) {
                echo "</section>";
            }

            //RENDER MENU
            function menu ( $menuItems ) {
            
            //$MenuItems should be a PDO query to menu table in database. 

            if ($menuItems !== false) {
                $menu = "<ul id='menu'>";

                //RENDER EACH MENU ENTRY AS MENU ITEM
                foreach($menuItems as $row)
                    {
                        $menu .= "<li><a href='{$row['menu_links']}'>{$row['menu_text']}</a></li>" ;
                    }
                }
                //ERROR HANDLING FOR NO MENU FOUND
             else {
                echo 'No menu found.'.$db->errorCode;
             }
                $menu .= "</ul>";
                echo $menu;
            }

            //USER LOG IN BUTTON
            function userLogIn ( ) {
                echo "<a class='px-2' href='user_functions/user-login.php'>Log In</a>";
                
            }

            //USER REGISTRATION BUTTON
            function userRegister ( ) {
                echo "<a class='px-2' href='user_functions/user-register.php'>Register</a>";
                
            }

            //ADMIN BAR
            function adminBar( ) {
                sectionOpen("w-100 col-md-12");
                divOpen( "adminBar bg-dark row px-2 container-fluid py-1");
                p("Hello, {$_SESSION['userName']}!", "adminBar col-md-2 text-light");
                divOpen("col-md-3");
                
                a("Dashboard", "../dashboard.php", "adminBar text-light px-2");

                a("Posts", "../posts.php", "adminBar text-light px-2");

                a("Members", "../members.php", "adminBar text-light px-2");

                divClose();

                p("<a class='text-light' href='user_functions/user-logout.php'>Log Out</a>", "text-right adminBar col-md-7");
                divClose();
                sectionClose();
            }

            //RENDER DATA ENTRY MODULE
            function dataEntry( ){
                divOpen("module col-lg-5 mw-50 text-light m-1 px-3 pt-3 rounded");
                echo '<a href="visitor-survey.php" class="text-light">';
                h1("Data Entry", "text-center");
                echo '</a>';
            divClose();
        } 


            //RENDER DAILY RECAP MODULE
            function dailyRecap( ){
                divOpen("module col-lg-5 mw-50 text-light m-1 px-3 pt-3 rounded");
                h1("Daily Recap", "text-center");
                p("This is going to be the module for Daily Recap. Finish the data entry content here. ");
            divClose();
        }
        
?> 