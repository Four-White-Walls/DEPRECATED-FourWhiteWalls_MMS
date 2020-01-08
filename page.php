<?php

    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    include 'functions.php';
    include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

    htmlOpen();

    if ($_SESSION['userLoggedIn'] == "true") {
        adminBar();
    }

    //Parse URL to request page w/ 
    $url = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);

    //Requsest 
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

    

    htmlClose();



?>