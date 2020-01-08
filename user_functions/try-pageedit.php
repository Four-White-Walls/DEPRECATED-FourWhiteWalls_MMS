<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    //PAGE INCLUDES
    include __DIR__ . '/../data/database_handler.php';

    //GET POST BODY TO EDIT
    $body = $_POST['body'];

    //GET URL STRING
    $url = substr($_SERVER[REQUEST_URI], strpos($_SERVER[REQUEST_URI], "=") + 1);

    //SQL UPDATE STATEMENT
    $sql = "UPDATE posts SET body=? WHERE pagetitle=?";
    $conn->prepare($sql)->execute([$body, $url]);

    //REDIRECT TO POSTS PAGE
    header("Location: /../posts.php");

?>