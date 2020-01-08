<?php
        //START/CONTINUE SERVER SESSION
        //CHECK IF SESSION STARTED, ELSE START SESSION
        if(!isset($_SESSION)) 
        { 
                session_start(); 
        } 
        
        include __DIR__ . '/../elementFunctions.php';
            
?>