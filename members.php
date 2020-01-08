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
    $members = $conn->query("SELECT * FROM members LIMIT 25");

    
    //OPEN SECTION
    sectionOpen("justify-content-center container-fluid");

    //OPEN DIV
    divOpen("p-5");
    divOpen("d-flex justify-space-between my-2");
        h1('Members', "text-left col-md-6");
        echo "<a class='btn my-auto h-50 ml-auto btn-primary' href='/user_functions/member-new.php'>Add New Member</a>";
        divClose(); 
    //OPEN DIV
    divOpen("bg-light text-dark border rounded col-md-12 py-1 d-flex justify-content-between");
            divOpen("col-md-1");
            p("First Name");
            divClose();
            divOpen("col-md-1");
            p("Last Name");
            divClose();
            divOpen("col-md-1");
            p("Company");
            divClose();
            divOpen("col-md-1");
            p("City");
            divClose();
            divOpen("col-md-1");
            p("County");
            divClose();
            divOpen("col-md-1");
            p("State");
            divClose();
            divOpen("col-md-1");
            p("Zip");
            divClose();
            divOpen("col-md-1");
            p("Phone1");
            divClose();
            divOpen("col-md-1");
            p("Phone2");
            divClose();
            divOpen("col-md-2");
            p("email");
            divClose();
            divOpen("col-md-1");
            if ($_SESSION['access'] == 'membership' || $_SESSION['access'] == 'global') {
                p("Edit");
            }
            
            divClose();
            
    //CLOSE DIV
    divClose();

    //LOOP THROUGH POSTS AND DISPLAY AS CHILD ELEMENT
    foreach($members as $row)
        {   
            //OPEN DIV
            divOpen("bg-dark text-light border rounded border-light d-flex h-50 justify-content-between");
            divOpen("col-md-1");
            p("{$row['first_name']}");
            divClose();
            divOpen("col-md-1");
            p("{$row['last_name']}", "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['company_name']}",  "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['city']}", "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['county']}", "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['state']}", "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['zip']}", "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['phone1']}",  "d-inline");
            divClose();
            divOpen("col-md-1");
            p("{$row['phone2']}", "d-inline");
            divClose();
            divOpen("col-md-2");
            a("{$row['email']}", "mailto:{$row['email']}", "d-inline");
            divClose();
            divOpen("col-md-1");
            if ($_SESSION['access'] == 'membership' || $_SESSION['access'] == 'global') {
            a("Edit", "/user_functions/member-edit.php?id={$row['id']}", "d-inline");
            }
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