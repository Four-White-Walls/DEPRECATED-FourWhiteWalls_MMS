<?php

    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


    //DATABASE DIRECTORY
    $host = $_SERVER['DOCUMENT_ROOT'].'/data/';



    //DATABASE FILE
    $database = "database.db";

    //TRY DATABASE CONNECTION, ECHO FAILURE IF FAILED.
    try {
        $conn = new PDO("sqlite:".$host.$database);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }


?>