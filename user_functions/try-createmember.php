<?php
    
    //CHECK IF SESSION STARTED, ELSE START SESSION
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    //PAGE INCLUDES
    include $_SERVER['DOCUMENT_ROOT'].'/data/database_handler.php';

    //GET POST VARIABLES
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $companyName = $_POST['companyName'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $county = $_POST['county'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $website = $_POST['website'];
    $email = $_POST['email'];

    try {
    
    //SQL STATEMENT
    $sql = "INSERT INTO members (first_name, last_name, company_name, address, city, county, state, zip, phone1, phone2, email, website) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([$firstName, $lastName, $companyName, $address, $city, $county, $state, $zip, $phone1, $phone2, $website, $email]);
    
    //REDIRECT PAGE AFTER SQL EXECUTED
    header("Location: ../members.php");
    
    } 
    
    //CATCH SQL ERRORS
    catch(PDOException $e){ 
    echo $e->getMessage();
}

?>