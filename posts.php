<?php
   //CHECK IF SESSION STARTED, ELSE START SESSION
   if(!isset($_SESSION)) 
   { 
       session_start(); 
   } 

    //INCLUDE DEPENDENCIES
    include 'functions.php';

    include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

    //IF LOGGED IN, RENDER POSTS PAGE
    if ($_SESSION["userLoggedIn"] == "true") {

    //OPEN HTML    
    htmlOpen();

    //RENDER ADMIN BAR
    adminBar();

    //RENDER POSTS VIEW UI
    $posts = $conn->query("SELECT * FROM posts");
    
    //OPEN SECTION
    sectionOpen("row justify-content-center p-5");

    //OPEN DIV
    divOpen("row w-50");
    h1('Posts');
    echo "<a class='btn my-auto h-20 ml-auto btn-primary' href='/user_functions/page-edit.php'>New Post</a>";

    //OPEN DIV
    divOpen("bg-light text-dark border rounded col-md-12 py-1 d-flex justify-content-between");
            divOpen("col-md-2");
            p("Page ID", "d-inline");
            divClose();
            divOpen("col-md-2");
            p("Page Type", "d-inline");
            divClose();
            divOpen("col-md-2");
            p("Page Title", "d-inline");
            divClose();
            divOpen("col-md-2");
            p("Link", "d-inline");
            divClose();
            divOpen("col-md-2");
            p("Edit", "d-inline ");
            divClose();
            
    //CLOSE DIV
    divClose();

    //LOOP THROUGH POSTS AND DISPLAY AS CHILD ELEMENT
    foreach($posts as $row)
        {   
            //OPEN DIV
            divOpen("bg-dark text-light border rounded border-light py-1 col-md-12 d-flex justify-content-between");
            divOpen("col-md-2");
            p("{$row['id']}", "d-inline");
            divClose();
            divOpen("col-md-2");
            p("{$row['type']}", "d-inline");
            divClose();
            divOpen("col-md-2");
            p("{$row['title']}",  "d-inline");
            divClose();
            divOpen("col-md-2");
            a("{$row['title']}", "{$row['url']}", "d-inline");
            divClose();
            divOpen("col-md-2");
            a("Edit", "http://localhost/user_functions/page-edit.php?page={$row['pagetitle']}", "d-inline");
            divClose();

            
            


            //CLOSE DIV
            divClose();
        }
        //CLOSE DIV
        divClose();

        //CLOSE SECTION
        sectionClose();

        //CLOSE HTML
        htmlClose();
    } 

    //IF NOT LOGGED IN, REDIRECT TO LOGIN
    else {
        header("Location: /user_functions/user-login.php");
    }
    
?>