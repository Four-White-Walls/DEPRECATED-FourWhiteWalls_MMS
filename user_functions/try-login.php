<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    ob_start();

    //PAGE INCLUDES
    include __DIR__ . '/../data/database_handler.php';
    include __DIR__ .  '/../functions.php';

    //GET VARIABLES FROM POST
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //GET ALL USERS AND FILTER THROUGH TO SEE IF USERNAME/PASSWORD MATCHES ENTRIES
    $sql = $conn->query("SELECT * from userpeople WHERE username='{$username}'")->fetchall(PDO::FETCH_ASSOC);
        foreach($sql as $row)
        {
            //ON LOGIN SUCCESS, UPDATES SESSION VARIABLE AND REDIRECTS TO HOME
            if ($row['username'] == $username && $row['password'] == $password){
                $_SESSION['userLoggedIn'] = 'true';
                $_SESSION['userName'] = $username;
                $_SESSION['access'] = $row['access'];
                header("Location: /../index.php");
                die();
            break;
            }
            //ON LOGIN FAILURE, UPDATES LOGIN ATTEMPTS SESSION VARIABLE.
            else {
                $_SESSION['loginAttempts']++;
                header("Location: user-login.php");
            }
        }

        


?>