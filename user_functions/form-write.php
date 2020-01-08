<?php
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 

        //PAGE INCLUDES
        include __DIR__ . '/../data/database_handler.php';
        include __DIR__ .  '/../functions.php';

        $items = array();


        foreach ($_POST as $x) {
        
            array_push($items, $x);
        }

        //GET TABLE NAME FROM URL
        $dburl = substr($_SERVER['REQUEST_URI'], strpos($_SERVER['REQUEST_URI'], "=") + 1);
        //INSERT VALUES INTO SQL TABLE
        $sql = "INSERT INTO {$dburl} (visit) VALUES (?)";
    
        
        $stmt= $conn->prepare($sql);
        $stmt->execute($items[0]);


?>
