<?php

    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    //PAGE INCLUDES
    include 'functions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

    //OPEN HTML
    htmlOpen();

    //RENDER ADMIN BAR IF USER LOGGED IN    
    if ($_SESSION['userLoggedIn'] == "true") {
        adminBar();
    }

    //Parse URL for SQL request
    $url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);

    //Request 
    $stmt = $conn->query("SELECT * FROM posts WHERE pagetitle='{$url}' LIMIT 1");
    $post = $stmt->fetch();


    //Redirect to 404 if the page is page.php
    if ($_SERVER['REQUEST_URI'] == "/page.php") {
        header("Location: 404.php");
    } 
    
    //Redirect to 404 if the page does not exist
    else if ($post == false) {
        header("Location: 404.php");
    } 

    //If pages exists and is a valid request, request post body
    else {
        echo $post['body'];
    }

    
    //CLOSE HTML
    htmlClose();



?>