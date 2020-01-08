<?php
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    include __DIR__ . '/../data/database_handler.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    //UPDATE SQL STATEMENT TO CHECK IF USE EXISTS, TRY/CATCH
    
    //TRY TO CONNECT TO DATABASE AND INSERT NEW USERNAME/PASSWORD/EMAIL COMBINATION
    try {
        $sql = "INSERT INTO userpeople (username, password, email, access) VALUES (:username, :password, :email, :access)";
        $stmt= $conn->prepare($sql);
        $stmt->execute([$username, $password, $email, 'entry']);
        $_SESSION['userLoggedIn'] = 'true';
        $_SESSION['userName'] = $username;
        header("location: ../index.php");

    
        die();
        } 
        
        //CATCH ERROR
        catch(PDOException $e){ 
        echo $e->getMessage();
}


?>
