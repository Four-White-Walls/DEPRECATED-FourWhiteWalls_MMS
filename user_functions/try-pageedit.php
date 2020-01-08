<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    include __DIR__ . '/../data/database_handler.php';


    $body = $_POST['body'];

    $url = substr($_SERVER[REQUEST_URI], strpos($_SERVER[REQUEST_URI], "=") + 1);

    $sql = "UPDATE posts SET body=? WHERE pagetitle=?";
    $conn->prepare($sql)->execute([$body, $url]);

    header("Location: /../posts.php");


?>